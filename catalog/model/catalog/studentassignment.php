<?php
class ModelCatalogStudentassignment extends Model {

	public function getFirstTopicSessionVideos($product_id, $session_id) {
		 ob_start();
		$data = [];
		$query = $this->db->query("SELECT DISTINCT *, pd.name AS name, p.image, m.name AS manufacturer, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT points FROM " . DB_PREFIX . "product_reward pr WHERE pr.product_id = p.product_id AND pr.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "') AS reward, (SELECT ss.name FROM " . DB_PREFIX . "stock_status ss WHERE ss.stock_status_id = p.stock_status_id AND ss.language_id = '" . (int)$this->config->get('config_language_id') . "') AS stock_status, (SELECT wcd.unit FROM " . DB_PREFIX . "weight_class_description wcd WHERE p.weight_class_id = wcd.weight_class_id AND wcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS weight_class, (SELECT lcd.unit FROM " . DB_PREFIX . "length_class_description lcd WHERE p.length_class_id = lcd.length_class_id AND lcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS length_class, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT COUNT(*) AS total FROM " . DB_PREFIX . "review r2 WHERE r2.product_id = p.product_id AND r2.status = '1' GROUP BY r2.product_id) AS reviews, p.sort_order FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'");
		 if ($query->num_rows) {
			 $data['product'][] = array(
				'product_id'       => $query->row['product_id'],
				'name'             => $query->row['name']	
			);
		}
		 
		$SessionVideosresults = $this->getListOfSessionVideos($session_id);

		 foreach($SessionVideosresults as $SessionVideosresult){
				$data['sessionvideosresult'][] = array(
				'video_id'  => $SessionVideosresult['video_id'],
				'topic_session_id' => $SessionVideosresult['topic_session_id'],
				'video'       => $SessionVideosresult['video']
                );
		 }
		 
		return $data;
	}

	public function getLeftTopicMenu($product_id) {
		$data = [];
		$topics = $this->getListOfProductTopics($product_id);		
		foreach ($topics as $topic) {
			$data[$topic['topic_id']] = array(
				'topic_id' => $topic['topic_id'],
				'title' => $topic['title']
			);
			$topic_sessions = $this->getListOfTopicSessions($topic['topic_id']);
			foreach($topic_sessions as $topic_session) {
				$data[$topic['topic_id']]['sessions'][] = array(
					'session_id' => $topic_session['session_id'],
					'title' => $topic_session['title'],
					'test_id' => $topic_session['test_id'],
					'assignment_file' => $topic_session['assignment_file']
				);
			}
		}
		return $data;
	}
	
	public function getListOfProductTopics($product_id) {

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_topic pt INNER JOIN " . DB_PREFIX . "topic t on t.topic_id=pt.topic_id WHERE pt.product_id = '" . (int)$product_id . "'");
			
		return $query->rows;
		
		
	}
	
	public function getListOfTopicSessions($topic_id) {
		
		//$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "topic_session ts INNER JOIN " . DB_PREFIX . "topic t on t.topic_id=ts.topic_id WHERE ts.topic_id = '" . (int)$topic_id . "'");
		//return $query->rows;
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "topic_session WHERE topic_id = '" . (int)$topic_id . "'");
		return $query->rows;
	}
	
	public function getListOfSessionVideos($session_id){
		
		 $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "session_video WHERE topic_session_id = '" . (int)$session_id . "'");
		 return $query->rows;
	}
	
	public function getListOfSessionTestQuestions($test_id){
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "testquestion WHERE test_id = '" . (int)$test_id . "'");
		//print_r($query->row);
		if(isset($query->row['questions'])){
			$questionIds = implode(',',(json_decode($query->row['questions']))->collection);
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "question WHERE question_id in(" . $questionIds . ") and status = 1");
			$dataArr = [];
			foreach($query->rows as $question){
				$query = $this->db->query("SELECT question_id, question_option_id, option_value FROM " . DB_PREFIX . "question_option WHERE question_id ='".$question['question_id']."' and status =1");
				$dataArr[] = array(
					'question_id' => $question['question_id'],
					'question' => $question['question'],
					'category_id' => $question['category_id'],
					'explanation' => $question['explanation'],
					'options' => $query->rows				);			
			}
			return $dataArr;
		}
	}
	
	
}



