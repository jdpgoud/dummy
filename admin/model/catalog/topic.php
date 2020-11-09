<?php
class ModelCatalogTopic extends Model {
	public function addTopic($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "topic SET title = '" . $this->db->escape($data['title']) . "', category_id = '" . (int)$data['category_id'] . "', status = '" . (int)$data['status'] . "', date_added = NOW()");

		$topic_id = $this->db->getLastId();

		$this->cache->delete('topic');

		return $topic_id;
	}

	public function editTopic($topic_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "topic SET title = '" . $this->db->escape($data['title']) . "', category_id = '" . (int)$data['category_id'] . "', status = '" . (int)$data['status'] . "', date_added = '" . $this->db->escape($data['date_added']) . "', date_modified = NOW() WHERE topic_id = '" . (int)$topic_id . "'");

		
		$this->cache->delete('topic');
	}

	public function deleteReview($question_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "question WHERE question_id = '" . (int)$question_id . "'");

		$this->cache->delete('question');
	}

	public function getTopic($topic_id) {
		$query = $this->db->query("SELECT topic_id, title, category_id, status, date_added FROM " . DB_PREFIX . "topic WHERE topic_id = '" . (int)$topic_id . "'");

		return $query->row;
	}

	public function getTopics($data = array()) {
		$sql = "SELECT t.topic_id, t.title, t.category_id, t.status, t.date_added FROM " . DB_PREFIX . "topic t";

		if (!empty($data['filter_title'])) {
			$sql .= " WHERE t.title LIKE '" . $this->db->escape($data['filter_title']) . "%'";
		}

		if (!empty($data['filter_category'])) {
			$sql .= " AND t.category_id LIKE '" . $this->db->escape($data['filter_category']) . "%'";
		}

		if (isset($data['filter_status']) && $data['filter_status'] !== '') {
			$sql .= " AND t.status = '" . (int)$data['filter_status'] . "'";
		}

		if (!empty($data['filter_date_added'])) {
			$sql .= " AND DATE(t.date_added) = DATE('" . $this->db->escape($data['filter_date_added']) . "')";
		}

		$sort_data = array(
			't.title',
			't.category_id',
			't.status',
			't.date_added'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY t.date_added";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getTotalTopics($data = array()) {
		$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "topic t";

		if (!empty($data['filter_title'])) {
			$sql .= " WHERE t.title LIKE '" . $this->db->escape($data['filter_title']) . "%'";
		}

		if (!empty($data['filter_category'])) {
			$sql .= " AND t.category_id LIKE '" . $this->db->escape($data['filter_category']) . "%'";
		}

		if (isset($data['filter_status']) && $data['filter_status'] !== '') {
			$sql .= " AND t.status = '" . (int)$data['filter_status'] . "'";
		}

		if (!empty($data['filter_date_added'])) {
			$sql .= " AND DATE(t.date_added) = DATE('" . $this->db->escape($data['filter_date_added']) . "')";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	public function getTotalTopicsAwaitingApproval() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "topic WHERE status = '0'");

		return $query->row['total'];
	}

	public function addTopicWithSession($data) {
		if(isset($data['session'])){
			foreach ($data['session'] as $topic_session) {
				if(isset($topic_session['session_id'])){ //if its exist one then we should update record
					$this->db->query("UPDATE " . DB_PREFIX . "topic_session SET title = '" . $this->db->escape($topic_session['title']) . "', test_id = '" . $this->db->escape($topic_session['test_id']) . "', topic_id = '" . $this->db->escape($data['topic_id']) . "', assignment_file = '" . $this->db->escape($topic_session['assignment_file']) . "', date_modified = NOW() WHERE session_id = '" . (int)$topic_session['session_id'] . "'");
					
					if(isset($topic_session['video'])){
						foreach ($topic_session['video'] as $session_video) {
							if(isset($session_video['video_id'])){ //if its exist one then we should update record
								$this->db->query("UPDATE " . DB_PREFIX . "session_video SET video = '" . $this->db->escape($session_video['video']) . "', topic_session_id = '" . $this->db->escape($topic_session['session_id']) . "', date_modified = NOW() WHERE video_id = '" . (int)$session_video['video_id'] . "'");
							}else{
								$this->db->query("INSERT INTO " . DB_PREFIX . "session_video SET video = '" . $this->db->escape($session_video['video']) . "', topic_session_id = '" . $this->db->escape($topic_session['session_id']) . "', date_added = NOW(), date_modified = NOW()");
							}
						}
					}

				}else{
					$this->db->query("INSERT INTO " . DB_PREFIX . "topic_session SET title = '" . $this->db->escape($topic_session['title']) . "', test_id = '" . $this->db->escape($topic_session['test_id']) . "', topic_id = '" . $this->db->escape($data['topic_id']) . "', assignment_file = '" . $this->db->escape($topic_session['assignment_file']) . "', date_added = NOW(), date_modified = NOW()");

					$topic_session_id = $this->db->getLastId();

					if(isset($topic_session['video'])){
						
						foreach ($topic_session['video'] as $session_video) {							
							$this->db->query("INSERT INTO " . DB_PREFIX . "session_video SET video = '" . $this->db->escape($session_video['video']) . "', topic_session_id = '" . $this->db->escape($topic_session_id) . "', date_added = NOW(), date_modified = NOW()");
							
						}
					}
				}			
				
			}

			if(isset($data['topic_product_id'])){
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_topic SET product_id = '" . $this->db->escape($data['topic_product_id']) . "', topic_id = '" . $this->db->escape($data['topic_id']) . "', date_added = NOW(), date_modified = NOW()");
			}

		}

		if(isset($data['delete'])){
			foreach ($data['delete'] as $delete) {
				if(isset($delete['session'])){
					foreach($delete['session']  as $session){
						$this->db->query("DELETE FROM " . DB_PREFIX . "topic_session WHERE session_id = '" . (int)$session['session_id'] . "'");
	
						$this->cache->delete('topic_session');
					}
				}
				if(isset($delete['video'])){
					foreach($delete['video']  as $video){
						$this->db->query("DELETE FROM " . DB_PREFIX . "session_video WHERE video_id = '" . (int)$video['video_id'] . "'");

						$this->cache->delete('session_video');
					}
				}
			}
		}
		return $data['topic_id'];

	}

	public function getTopicWithSession($topic_id, $product_id) {
		
		$topic_session_data = array();
		$q = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_topic WHERE topic_id = '" . (int)$topic_id . "' AND product_id = '".$product_id."'");
		if(count($q->row)){
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "topic_session WHERE topic_id = '" . (int)$topic_id . "'");
			foreach($query->rows as $topic_session){
				$query2 = $this->db->query("SELECT * FROM " . DB_PREFIX . "session_video WHERE topic_session_id = '" . (int)$topic_session['session_id'] . "'");
				
				$topic_session_data[] = array(
					'session_id' => $topic_session['session_id'],
					'title' => $topic_session['title'],
					'test_id' => $topic_session['test_id'],
					'assignment_file' => $topic_session['assignment_file'],
					'video' => $query2->rows
				);
			}
		}

		return array('session_data' => $topic_session_data, 'product_topic'=>$q->row);
	}

	public function removeTopicDetails($data) {
		try {
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_topic WHERE topic_id = '" . (int)$data['topic_id'] . "'");
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "topic_session WHERE topic_id = '" . (int)$data['topic_id'] . "'");
			foreach($query->rows as $topic_session) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "session_video WHERE topic_session_id = '" . (int)$topic_session['session_id'] . "'");
			}
			$this->db->query("DELETE FROM " . DB_PREFIX . "topic_session WHERE topic_id = '" . (int)$data['topic_id'] . "'");

			return true;
		} catch (Exception $e) {
			$this->renderJson(self::ERROR, $e->getMessage());
			return false;
		}
	}
}