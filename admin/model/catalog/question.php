<?php
class ModelCatalogQuestion extends Model {
	public function addQuestion($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "question SET question = '" . $this->db->escape($data['question']) . "', category_id = '" . (int)$data['category_id'] . "', explanation = '" . $this->db->escape(strip_tags($data['explanation'])) . "', status = '" . (int)$data['status'] . "', date_added = NOW()");

		$question_id = $this->db->getLastId();

		foreach ($data['option'] as $option) {
			if(isset($option['value'])){
				$is_correct = 0;
				if(isset($option['is_correct'])){
					$is_correct = $option['is_correct'];
				}
				$this->db->query("INSERT INTO " . DB_PREFIX . "question_option SET question_id = '" . (int)$question_id . "', option_value = '" . $this->db->escape(strip_tags($option['value'])) . "', is_correct = '" . (int)$is_correct . "', status = '" . (int)$data['status'] . "', date_added = NOW()");
			}
		}
		$this->cache->delete('question');

		return $question_id;
	}

	public function editQuestion($question_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "question SET question = '" . $this->db->escape($data['question']) . "', category_id = '" . (int)$data['category_id'] . "', explanation = '" . $this->db->escape(strip_tags($data['explanation'])) . "', status = '" . (int)$data['status'] . "', date_added = '" . $this->db->escape($data['date_added']) . "', date_modified = NOW() WHERE question_id = '" . (int)$question_id . "'");

		foreach ($data['option'] as $option) {
			if(isset($option['value'])){
				$is_correct = 0;
				if(isset($option['is_correct'])){
					$is_correct = $option['is_correct'];
				}
				$this->db->query("UPDATE " . DB_PREFIX . "question_option SET question_id = '" . (int)$question_id . "', option_value = '" . $this->db->escape(strip_tags($option['value'])) . "', is_correct = '" . (int)$is_correct . "', status = '" . (int)$data['status'] . "', date_modified = NOW() WHERE question_option_id = '" . (int)$option['question_option_id'] . "'");
			}
		}
		$this->cache->delete('question');
	}

	public function deleteReview($question_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "question WHERE question_id = '" . (int)$question_id . "'");

		$this->cache->delete('question');
	}

	public function getQuestion($question_id) {
		$query = $this->db->query("SELECT question_id, question, category_id, explanation, status, date_added FROM " . DB_PREFIX . "question WHERE question_id = '" . (int)$question_id . "'");

		return $query->row;
	}

	public function getQuestions($data = array()) {
		$sql = "SELECT q.question_id, q.question, q.category_id, q.explanation, q.status, q.date_added FROM " . DB_PREFIX . "question q";

		if (!empty($data['filter_question'])) {
			$sql .= " WHERE q.question LIKE '" . $this->db->escape($data['filter_question']) . "%'";
		}

		if (!empty($data['filter_category'])) {
			$sql .= " AND q.category_id LIKE '" . $this->db->escape($data['filter_category']) . "%'";
		}

		if (isset($data['filter_status']) && $data['filter_status'] !== '') {
			$sql .= " AND q.status = '" . (int)$data['filter_status'] . "'";
		}

		if (!empty($data['filter_date_added'])) {
			$sql .= " AND DATE(q.date_added) = DATE('" . $this->db->escape($data['filter_date_added']) . "')";
		}

		$sort_data = array(
			'q.question',
			'q.category_id',
			'q.explation',
			'q.status',
			'q.date_added'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY q.date_added";
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

	public function getOptionValues($question_id) {
		$option_value_data = array();

		$option_value_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "question_option WHERE question_id = '" . (int)$question_id . "'");

		foreach ($option_value_query->rows as $option_value) {
			$option_value_data[] = array(
				'question_option_id' => $option_value['question_option_id'],
				'option_value'       => $option_value['option_value'],
				'is_correct'         => $option_value['is_correct'],
				'status'             => $option_value['status']
			);
		}

		return $option_value_data;
	}

	public function getTotalQuestions($data = array()) {
		$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "question q";

		if (!empty($data['filter_question'])) {
			$sql .= " WHERE q.question LIKE '" . $this->db->escape($data['filter_question']) . "%'";
		}

		if (!empty($data['filter_category'])) {
			$sql .= " AND q.category_id LIKE '" . $this->db->escape($data['filter_category']) . "%'";
		}

		if (isset($data['filter_status']) && $data['filter_status'] !== '') {
			$sql .= " AND q.status = '" . (int)$data['filter_status'] . "'";
		}

		if (!empty($data['filter_date_added'])) {
			$sql .= " AND DATE(q.date_added) = DATE('" . $this->db->escape($data['filter_date_added']) . "')";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	public function getTotalQuestionsAwaitingApproval() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "questions WHERE status = '0'");

		return $query->row['total'];
	}
}