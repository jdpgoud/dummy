<?php
class ModelCatalogTestquestion extends Model {
	public function addTestQuestion($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "testquestion SET title = '" . $this->db->escape($data['title']) . "', test_key = '" . $this->db->escape($data['test_key']) . "', questions = '" . (isset($data['questions']) ? $this->db->escape(json_encode($data['questions'])) : '') . "', status = '" . (int)$data['status'] . "', date_added = NOW()");

		$test_id = $this->db->getLastId();
		$this->cache->delete('testquestion');

		return $test_id;
	}

	public function editTestQuestion($test_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "testquestion SET title = '" . $this->db->escape($data['title']) . "', test_key = '" . $this->db->escape($data['test_key']) . "', questions = '" . (isset($data['questions']) ? $this->db->escape(json_encode($data['questions'])) : '') . "', status = '" . (int)$data['status'] . "', date_modified = NOW() WHERE test_id = '" . (int)$test_id . "'");

		$this->cache->delete('testquestion');
	}

	public function deleteTest($test_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "testquestion WHERE test_id = '" . (int)$test_id . "'");

		$this->cache->delete('testquestion');
	}

	public function getTest($test_id) {
		$query = $this->db->query("SELECT test_id, title, questions, test_key, status, date_added FROM " . DB_PREFIX . "testquestion WHERE test_id = '" . (int)$test_id . "'");

		return $query->row;
	}

	public function getTests($data = array()) {
		$sql = "SELECT t.test_id, t.title, t.test_key, t.questions, t.status, t.date_added FROM " . DB_PREFIX . "testquestion t";

		if (!empty($data['filter_testtitle'])) {
			$sql .= " WHERE t.title LIKE '" . $this->db->escape($data['filter_testtitle']) . "%'";
		}

		if (!empty($data['filter_testkey'])) {
			$sql .= " AND t.test_key LIKE '" . $this->db->escape($data['filter_testkey']) . "%'";
		}

		if (isset($data['filter_status']) && $data['filter_status'] !== '') {
			$sql .= " AND t.status = '" . (int)$data['filter_status'] . "'";
		}

		if (!empty($data['filter_date_added'])) {
			$sql .= " AND DATE(t.date_added) = DATE('" . $this->db->escape($data['filter_date_added']) . "')";
		}

		$sort_data = array(
			't.title',
			't.test_key',
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

	public function getTotalTests($data = array()) {
		$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "testquestion t";

		if (!empty($data['filter_testtitle'])) {
			$sql .= " WHERE t.title LIKE '" . $this->db->escape($data['filter_testtitle']) . "%'";
		}

		if (!empty($data['filter_testkey'])) {
			$sql .= " AND t.test_key LIKE '" . $this->db->escape($data['filter_testkey']) . "%'";
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

	public function getTotalTestsAwaitingApproval() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "testquestions WHERE status = '0'");

		return $query->row['total'];
	}
}