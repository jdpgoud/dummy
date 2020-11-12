<?php
class ControllerCatalogTestquestion extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/testquestion');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/testquestion');

		$this->getList();
	}

	public function removefile() {
		$data = [];
		if (($this->request->server['REQUEST_METHOD'] == 'POST')){
			if (file_exists(DIR_UPLOAD.$this->request->post['source'])) {
				unlink(DIR_UPLOAD.$this->request->post['source']);
			}
			$this->load->model('catalog/testquestion');
			$this->model_catalog_testquestion->removeTestKeyFile($this->request->post['test_id']);
			
			$data['error'] = false;
			$data['msg'] = 'Deleted successfully!';
		}else{
			$data['error'] = true;
			$data['msg'] = 'Something went wrong!';
		}
		$this->response->setOutput(json_encode($data));
	}

	public function add() {
		$this->load->language('catalog/testquestion');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/testquestion');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$res = $this->uploadFile();
			$this->request->post['test_key'] =  $res['filename'];
			$this->model_catalog_testquestion->addTestQuestion($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_testtitle'])) {
				$url .= '&filter_testtitle=' . urlencode(html_entity_decode($this->request->get['filter_testtitle'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_testkey'])) {
				$url .= '&filter_testkey=' . urlencode(html_entity_decode($this->request->get['filter_testkey'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/testquestion', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('catalog/testquestion');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/testquestion');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$res = $this->uploadFile();
			$this->request->post['test_key'] =  $res['filename'];
			$this->model_catalog_testquestion->editTestQuestion($this->request->get['test_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_testtitle'])) {
				$url .= '&filter_testtitle=' . urlencode(html_entity_decode($this->request->get['filter_testtitle'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_testkey'])) {
				$url .= '&filter_testkey=' . urlencode(html_entity_decode($this->request->get['filter_testkey'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/testquestion', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	// public function delete() {
	// 	$this->load->language('catalog/question');

	// 	$this->document->setTitle($this->language->get('heading_title'));

	// 	$this->load->model('catalog/question');

	// 	if (isset($this->request->post['selected']) && $this->validateDelete()) {
	// 		foreach ($this->request->post['selected'] as $question_id) {
	// 			$this->model_catalog_question->deleteQuestion($question_id);
	// 		}

	// 		$this->session->data['success'] = $this->language->get('text_success');

	// 		$url = '';

	// 		if (isset($this->request->get['filter_question'])) {
	// 			$url .= '&filter_question=' . urlencode(html_entity_decode($this->request->get['filter_question'], ENT_QUOTES, 'UTF-8'));
	// 		}

	// 		if (isset($this->request->get['filter_category'])) {
	// 			$url .= '&filter_category=' . urlencode(html_entity_decode($this->request->get['filter_category'], ENT_QUOTES, 'UTF-8'));
	// 		}

	// 		if (isset($this->request->get['filter_status'])) {
	// 			$url .= '&filter_status=' . $this->request->get['filter_status'];
	// 		}

	// 		if (isset($this->request->get['filter_date_added'])) {
	// 			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
	// 		}

	// 		if (isset($this->request->get['sort'])) {
	// 			$url .= '&sort=' . $this->request->get['sort'];
	// 		}

	// 		if (isset($this->request->get['order'])) {
	// 			$url .= '&order=' . $this->request->get['order'];
	// 		}

	// 		if (isset($this->request->get['page'])) {
	// 			$url .= '&page=' . $this->request->get['page'];
	// 		}

	// 		$this->response->redirect($this->url->link('catalog/question', 'user_token=' . $this->session->data['user_token'] . $url, true));
	// 	}

	// 	$this->getList();
	// }

	protected function getList() {
		if (isset($this->request->get['filter_testtitle'])) {
			$filter_testtitle = $this->request->get['filter_testtitle'];
		} else {
			$filter_testtitle = '';
		}

		if (isset($this->request->get['filter_testkey'])) {
			$filter_testkey = $this->request->get['filter_testkey'];
		} else {
			$filter_testkey = '';
		}

		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = '';
		}

		if (isset($this->request->get['filter_date_added'])) {
			$filter_date_added = $this->request->get['filter_date_added'];
		} else {
			$filter_date_added = '';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'DESC';
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'r.date_added';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['filter_testtitle'])) {
			$url .= '&filter_testtitle=' . urlencode(html_entity_decode($this->request->get['filter_testtitle'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_testkey'])) {
			$url .= '&filter_testkey=' . urlencode(html_entity_decode($this->request->get['filter_testkey'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/testquestion', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['add'] = $this->url->link('catalog/testquestion/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('catalog/testquestion/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		
		$data['testquestions'] = array();

		$filter_data = array(
			'filter_testtitle'  => $filter_testtitle,
			'filter_testkey'    => $filter_testkey,
			'filter_status'     => $filter_status,
			'filter_date_added' => $filter_date_added,
			'sort'              => $sort,
			'order'             => $order,
			'start'             => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'             => $this->config->get('config_limit_admin')
		);

		$question_total = $this->model_catalog_testquestion->getTotalTests($filter_data);

		$results = $this->model_catalog_testquestion->getTests($filter_data);

		foreach ($results as $result) {
			$data['testquestions'][] = array(
				'test_id'      => $result['test_id'],
				'title'        => $result['title'],
				'test_key'     => $result['test_key'],
				'questions'    => $result['questions'],
				'status'       => ($result['status']) ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
				'edit'         => $this->url->link('catalog/testquestion/edit', 'user_token=' . $this->session->data['user_token'] . '&test_id=' . $result['test_id'] . $url, true)
			);
		}		

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if (isset($this->request->get['filter_testtitle'])) {
			$url .= '&filter_testtitle=' . urlencode(html_entity_decode($this->request->get['filter_testtitle'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_testkey'])) {
			$url .= '&filter_testkey=' . urlencode(html_entity_decode($this->request->get['filter_testkey'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_title'] = $this->url->link('catalog/testquestion', 'user_token=' . $this->session->data['user_token'] . '&sort=t.title' . $url, true);
		$data['sort_test_key'] = $this->url->link('catalog/testquestion', 'user_token=' . $this->session->data['user_token'] . '&sort=t.test_key' . $url, true);
		$data['sort_status'] = $this->url->link('catalog/testquestion', 'user_token=' . $this->session->data['user_token'] . '&sort=t.status' . $url, true);
		$data['sort_date_added'] = $this->url->link('catalog/testquestion', 'user_token=' . $this->session->data['user_token'] . '&sort=t.date_added' . $url, true);

		$url = '';

		if (isset($this->request->get['filter_testtitle'])) {
			$url .= '&filter_testtitle=' . urlencode(html_entity_decode($this->request->get['filter_testtitle'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_testkey'])) {
			$url .= '&filter_testkey=' . urlencode(html_entity_decode($this->request->get['filter_testkey'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $question_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/testquestion', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($question_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($question_total - $this->config->get('config_limit_admin'))) ? $question_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $question_total, ceil($question_total / $this->config->get('config_limit_admin')));

		$data['filter_testtitle'] = $filter_testtitle;
		$data['filter_testkey'] = $filter_testkey;
		$data['filter_status'] = $filter_status;
		$data['filter_date_added'] = $filter_date_added;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/test_list', $data));
	}

	protected function getForm() {
		$data['text_form'] = !isset($this->request->get['test_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['test_title'])) {
			$data['error_warning'] = $this->error['test_title'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['test_key'])) {
			$data['error_warning'] = $this->error['test_key'];
		} else {
			$data['error_warning'] = '';
		}

		$url = '';

		if (isset($this->request->get['filter_testtitle'])) {
			$url .= '&filter_testtitle=' . urlencode(html_entity_decode($this->request->get['filter_testtitle'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_testkey'])) {
			$url .= '&filter_testkey=' . urlencode(html_entity_decode($this->request->get['filter_testkey'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/testquestion', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		if (!isset($this->request->get['test_id'])) {
			$data['action'] = $this->url->link('catalog/testquestion/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('catalog/testquestion/edit', 'user_token=' . $this->session->data['user_token'] . '&test_id=' . $this->request->get['test_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('catalog/testquestion', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$this->load->model('catalog/question');
		$data['questions'] = array();
		$results = $this->model_catalog_question->getQuestions(array());
		foreach ($results as $result) {
			$data['questions'][] = array(
				'question_id' => $result['question_id'],
				'question'        => $result['question']
			);
		}
		
		if (isset($this->request->get['test_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$testquestion_info = $this->model_catalog_testquestion->getTest($this->request->get['test_id']);
			
		}
		$data['user_token'] = $this->session->data['user_token'];
		
		$this->load->model('catalog/testquestion');

		if (isset($this->request->post['test_id'])) {
			$data['test_id'] = $this->request->post['test_id'];
		} elseif (!empty($testquestion_info)) {
			$data['test_id'] = $testquestion_info['test_id'];
		} else {
			$data['test_id'] = '';
		}

		if (isset($this->request->post['title'])) {
			$data['title'] = $this->request->post['title'];
		} elseif (!empty($testquestion_info)) {
			$data['title'] = $testquestion_info['title'];
		} else {
			$data['title'] = '';
		}

		if (isset($this->request->post['test_key'])) {
			$data['test_key'] = $this->request->post['test_key'];
		} elseif (!empty($testquestion_info)) {
			$data['test_key'] = $testquestion_info['test_key'];
		} else {
			$data['test_key'] = '';
		}

		if (isset($this->request->post['questions']['collection'])) {
			$data['collection'] = $this->request->post['questions']['collection'];
		} elseif (isset(json_decode($testquestion_info['questions'])->collection)) {
			$data['collection'] = json_decode($testquestion_info['questions'])->collection;
		} else {
			$data['collection'] = array();
		}

		if (isset($this->request->post['date_added'])) {
			$data['date_added'] = $this->request->post['date_added'];
		} elseif (!empty($testquestion_info)) {
			$data['date_added'] = ($testquestion_info['date_added'] != '0000-00-00 00:00' ? $testquestion_info['date_added'] : '');
		} else {
			$data['date_added'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($testquestion_info)) {
			$data['status'] = $testquestion_info['status'];
		} else {
			$data['status'] = '';
		}
		
		$data['HTTP_CATALOG'] = HTTP_CATALOG;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('catalog/test_form', $data));
	}

	protected function validateForm() {

		if (!$this->user->hasPermission('modify', 'catalog/testquestion')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['title']) {
			$this->error['test_title'] = $this->language->get('error_test_tile');
		}

		if (empty($this->request->files['test_key']['name'])) {
			$this->error['test_key'] = $this->language->get('error_test_key');
		}

		return !$this->error;
	}

	protected function uploadFile() {
		$json = array();
		if (!empty($this->request->files['test_key']['name']) && is_file($this->request->files['test_key']['tmp_name'])) {
			// Sanitize the filename
			$filename = basename(preg_replace('/[^a-zA-Z0-9\.\-\s+]/', '', html_entity_decode($this->request->files['test_key']['name'], ENT_QUOTES, 'UTF-8')));

			// Validate the filename length
			if ((utf8_strlen($filename) < 3) || (utf8_strlen($filename) > 64)) {
				$json['error'] = $this->language->get('error_filename');
			}
			print_r($filename);
			// Allowed file extension types
			$allowed = array();

			$extension_allowed = preg_replace('~\r?\n~', "\n", $this->config->get('config_file_ext_allowed'));

			$filetypes = explode("\n", $extension_allowed);

			foreach ($filetypes as $filetype) {
				$allowed[] = trim($filetype);
			}

			if (!in_array(strtolower(substr(strrchr($filename, '.'), 1)), $allowed)) {
				$json['error'] = $this->language->get('error_filetype');
			}
			// Allowed file mime types
			$allowed = array();

			$mime_allowed = preg_replace('~\r?\n~', "\n", $this->config->get('config_file_mime_allowed'));

			$filetypes = explode("\n", $mime_allowed);

			foreach ($filetypes as $filetype) {
				$allowed[] = trim($filetype);
			}

			if (!in_array($this->request->files['test_key']['type'], $allowed)) {
				$json['error'] = $this->language->get('error_filetype');
			}

			// Check to see if any PHP files are trying to be uploaded
			$content = file_get_contents($this->request->files['test_key']['tmp_name']);

			if (preg_match('/\<\?php/i', $content)) {
				$json['error'] = $this->language->get('error_filetype');
			}

			// Return any upload error
			if ($this->request->files['test_key']['error'] != UPLOAD_ERR_OK) {
				$json['error'] = $this->language->get('error_upload_' . $this->request->files['test_key']['error']);
			}
		} else {
			$json['error'] = true;
		}

		if (!$json) {
			// $file = $filename . '.' . token(32);

			// move_uploaded_file($this->request->files['test_key']['tmp_name'], DIR_UPLOAD . $file);
			move_uploaded_file($this->request->files['test_key']['tmp_name'], DIR_UPLOAD . $filename);

			// Hide the uploaded file name so people can not link to it directly.
			// $this->load->model('tool/upload');

			// $json['code'] = $this->model_tool_upload->addUpload($filename, $file);
			$json['error'] = false;
			$json['success'] = 'Uploaded successfully';
			$json['filename'] = $filename;
		}
		return $json;
	}

	// protected function validateDelete() {
	// 	if (!$this->user->hasPermission('modify', 'catalog/question')) {
	// 		$this->error['warning'] = $this->language->get('error_permission');
	// 	}

	// 	return !$this->error;
	// }
}