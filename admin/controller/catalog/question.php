<?php
class ControllerCatalogQuestion extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/question');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/question');

		$this->getList();
	}

	public function add() {
		$this->load->language('catalog/question');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/question');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_question->addQuestion($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_question'])) {
				$url .= '&filter_question=' . urlencode(html_entity_decode($this->request->get['filter_question'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . urlencode(html_entity_decode($this->request->get['filter_category'], ENT_QUOTES, 'UTF-8'));
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

			$this->response->redirect($this->url->link('catalog/question', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('catalog/question');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/question');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_question->editQuestion($this->request->get['question_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_question'])) {
				$url .= '&filter_question=' . urlencode(html_entity_decode($this->request->get['filter_question'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . urlencode(html_entity_decode($this->request->get['filter_category'], ENT_QUOTES, 'UTF-8'));
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

			$this->response->redirect($this->url->link('catalog/question', 'user_token=' . $this->session->data['user_token'] . $url, true));
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
		if (isset($this->request->get['filter_question'])) {
			$filter_question = $this->request->get['filter_question'];
		} else {
			$filter_question = '';
		}

		if (isset($this->request->get['filter_category'])) {
			$filter_category = $this->request->get['filter_category'];
		} else {
			$filter_category = '';
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

		if (isset($this->request->get['filter_question'])) {
			$url .= '&filter_question=' . urlencode(html_entity_decode($this->request->get['filter_question'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . urlencode(html_entity_decode($this->request->get['filter_category'], ENT_QUOTES, 'UTF-8'));
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
			'href' => $this->url->link('catalog/question', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['add'] = $this->url->link('catalog/question/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('catalog/question/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['questions'] = array();

		$filter_data = array(
			'filter_question'    => $filter_question,
			'filter_category'     => $filter_category,
			'filter_status'     => $filter_status,
			'filter_date_added' => $filter_date_added,
			'sort'              => $sort,
			'order'             => $order,
			'start'             => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'             => $this->config->get('config_limit_admin')
		);

		$question_total = $this->model_catalog_question->getTotalQuestions($filter_data);

		$results = $this->model_catalog_question->getQuestions($filter_data);

		foreach ($results as $result) {
			$data['questions'][] = array(
				'question_id'  => $result['question_id'],
				'question'     => $result['question'],
				'category_id'  => $result['category_id'],
				'explanation'  => $result['explanation'],
				'status'     => ($result['status']) ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
				'edit'       => $this->url->link('catalog/question/edit', 'user_token=' . $this->session->data['user_token'] . '&question_id=' . $result['question_id'] . $url, true)
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

		if (isset($this->request->get['filter_question'])) {
			$url .= '&filter_question=' . urlencode(html_entity_decode($this->request->get['filter_question'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . urlencode(html_entity_decode($this->request->get['filter_category'], ENT_QUOTES, 'UTF-8'));
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

		$data['sort_question'] = $this->url->link('catalog/question', 'user_token=' . $this->session->data['user_token'] . '&sort=q.question' . $url, true);
		$data['sort_category'] = $this->url->link('catalog/question', 'user_token=' . $this->session->data['user_token'] . '&sort=q.category_id' . $url, true);
		$data['sort_status'] = $this->url->link('catalog/question', 'user_token=' . $this->session->data['user_token'] . '&sort=q.status' . $url, true);
		$data['sort_date_added'] = $this->url->link('catalog/question', 'user_token=' . $this->session->data['user_token'] . '&sort=q.date_added' . $url, true);

		$url = '';

		if (isset($this->request->get['filter_question'])) {
			$url .= '&filter_question=' . urlencode(html_entity_decode($this->request->get['filter_question'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . urlencode(html_entity_decode($this->request->get['filter_category'], ENT_QUOTES, 'UTF-8'));
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
		$pagination->url = $this->url->link('catalog/question', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($question_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($question_total - $this->config->get('config_limit_admin'))) ? $question_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $question_total, ceil($question_total / $this->config->get('config_limit_admin')));

		$data['filter_question'] = $filter_question;
		$data['filter_category'] = $filter_category;
		$data['filter_status'] = $filter_status;
		$data['filter_date_added'] = $filter_date_added;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/question_list', $data));
	}

	protected function getForm() {
		$data['text_form'] = !isset($this->request->get['question_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['question'])) {
			$data['error_question'] = $this->error['question'];
		} else {
			$data['error_question'] = '';
		}

		if (isset($this->error['category'])) {
			$data['error_category'] = $this->error['category'];
		} else {
			$data['error_category'] = '';
		}

		if (isset($this->error['explanation'])) {
			$data['error_explanation'] = $this->error['explanation'];
		} else {
			$data['error_explanation'] = '';
		}

		$url = '';

		if (isset($this->request->get['filter_question'])) {
			$url .= '&filter_question=' . urlencode(html_entity_decode($this->request->get['filter_question'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . urlencode(html_entity_decode($this->request->get['filter_category'], ENT_QUOTES, 'UTF-8'));
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
			'href' => $this->url->link('catalog/question', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		if (!isset($this->request->get['question_id'])) {
			$data['action'] = $this->url->link('catalog/question/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('catalog/question/edit', 'user_token=' . $this->session->data['user_token'] . '&question_id=' . $this->request->get['question_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('catalog/question', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['question_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$question_info = $this->model_catalog_question->getQuestion($this->request->get['question_id']);
			$question_option_info = $this->model_catalog_question->getOptionValues($this->request->get['question_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];
		
		$this->load->model('catalog/question');

		if (isset($this->request->post['question_id'])) {
			$data['question_id'] = $this->request->post['question_id'];
		} elseif (!empty($question_info)) {
			$data['question_id'] = $question_info['question_id'];
		} else {
			$data['question_id'] = '';
		}

		if (isset($this->request->post['question'])) {
			$data['question'] = $this->request->post['question'];
		} elseif (!empty($question_info)) {
			$data['question'] = $question_info['question'];
		} else {
			$data['question'] = '';
		}

		if (isset($this->request->post['category_id'])) {
			$data['category_id'] = $this->request->post['category_id'];
		} elseif (!empty($question_info)) {
			$data['category_id'] = $question_info['category_id'];
		} else {
			$data['category_id'] = '';
		}

		if (isset($this->request->post['explanation'])) {
			$data['explanation'] = $this->request->post['explanation'];
		} elseif (!empty($question_info)) {
			$data['explanation'] = $question_info['explanation'];
		} else {
			$data['explanation'] = '';
		}

		if (isset($this->request->post['date_added'])) {
			$data['date_added'] = $this->request->post['date_added'];
		} elseif (!empty($question_info)) {
			$data['date_added'] = ($question_info['date_added'] != '0000-00-00 00:00' ? $question_info['date_added'] : '');
		} else {
			$data['date_added'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($question_info)) {
			$data['status'] = $question_info['status'];
		} else {
			$data['status'] = '';
		}

		if (!empty($question_option_info)) {
			$data['question_option_info'] = $question_option_info;
		} else {
			$data['question_option_info'] = [];
		}
		

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/question_form', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/question')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['question']) {
			$this->error['question'] = $this->language->get('error_question');
		}

		if (!$this->request->post['category_id']) {
			$this->error['category_id'] = $this->language->get('error_category');
		}

		if (utf8_strlen($this->request->post['explanation']) < 1) {
			$this->error['explanation'] = $this->language->get('error_explanation');
		}

		return !$this->error;
	}

	// protected function validateDelete() {
	// 	if (!$this->user->hasPermission('modify', 'catalog/question')) {
	// 		$this->error['warning'] = $this->language->get('error_permission');
	// 	}

	// 	return !$this->error;
	// }
}