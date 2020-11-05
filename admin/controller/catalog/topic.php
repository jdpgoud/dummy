<?php
class ControllerCatalogTopic extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/topic');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/topic');

		$this->load->model('catalog/category');
		$categories = array();
		$results = $this->model_catalog_category->getCategories(array());
		foreach ($results as $result) {
			$categories[] = array(
				'category_id' => $result['category_id'],
				'name'        => $result['name']
			);
		}
		
		$this->getList();
	}

	public function add() {
		$this->load->language('catalog/topic');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/topic');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_topic->addTopic($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_title'])) {
				$url .= '&filter_title=' . urlencode(html_entity_decode($this->request->get['filter_title'], ENT_QUOTES, 'UTF-8'));
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

			$this->response->redirect($this->url->link('catalog/topic', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('catalog/topic');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/topic');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_topic->editTopic($this->request->get['topic'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_title'])) {
				$url .= '&filter_title=' . urlencode(html_entity_decode($this->request->get['filter_title'], ENT_QUOTES, 'UTF-8'));
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

			$this->response->redirect($this->url->link('catalog/topic', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	// public function delete() {
	// 	$this->load->language('catalog/topic');

	// 	$this->document->setTitle($this->language->get('heading_title'));

	// 	$this->load->model('catalog/topic');

	// 	if (isset($this->request->post['selected']) && $this->validateDelete()) {
	// 		foreach ($this->request->post['selected'] as $topic_id) {
	// 			$this->model_catalog_topic->deleteTopic($topic_id);
	// 		}

	// 		$this->session->data['success'] = $this->language->get('text_success');

	// 		$url = '';

	// 		if (isset($this->request->get['filter_title'])) {
	// 			$url .= '&filter_title=' . urlencode(html_entity_decode($this->request->get['filter_title'], ENT_QUOTES, 'UTF-8'));
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

	// 		$this->response->redirect($this->url->link('catalog/topic', 'user_token=' . $this->session->data['user_token'] . $url, true));
	// 	}

	// 	$this->getList();
	// }

	protected function getList() {
		if (isset($this->request->get['filter_title'])) {
			$filter_title = $this->request->get['filter_title'];
		} else {
			$filter_title = '';
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

		if (isset($this->request->get['filter_title'])) {
			$url .= '&filter_title=' . urlencode(html_entity_decode($this->request->get['filter_title'], ENT_QUOTES, 'UTF-8'));
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
			'href' => $this->url->link('catalog/topic', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['add'] = $this->url->link('catalog/topic/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('catalog/topic/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$this->load->model('catalog/category');
		$categories = array();
		$results = $this->model_catalog_category->getCategories(array());
		foreach ($results as $result) {
			$categories[$result['category_id']] = array(
				'category_id' => $result['category_id'],
				'name'        => $result['name']
			);
		}

		$data['topics'] = array();

		$filter_data = array(
			'filter_title'      => $filter_title,
			'filter_category'   => $filter_category,
			'filter_status'     => $filter_status,
			'filter_date_added' => $filter_date_added,
			'sort'              => $sort,
			'order'             => $order,
			'start'             => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'             => $this->config->get('config_limit_admin')
		);

		$topic_total = $this->model_catalog_topic->getTotalTopics($filter_data);

		$results = $this->model_catalog_topic->getTopics($filter_data);
		foreach ($results as $result) {
			$data['topics'][] = array(
				'topic_id'     => $result['topic_id'],
				'title'         => $result['title'],
				'category_id'  => $categories[$result['category_id']]['name'],
				'status'     => ($result['status']) ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
				'edit'       => $this->url->link('catalog/topic/edit', 'user_token=' . $this->session->data['user_token'] . '&topic_id=' . $result['topic_id'] . $url, true)
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

		if (isset($this->request->get['filter_title'])) {
			$url .= '&filter_title=' . urlencode(html_entity_decode($this->request->get['filter_title'], ENT_QUOTES, 'UTF-8'));
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

		$data['sort_title'] = $this->url->link('catalog/topic', 'user_token=' . $this->session->data['user_token'] . '&sort=t.title' . $url, true);
		$data['sort_category'] = $this->url->link('catalog/topic', 'user_token=' . $this->session->data['user_token'] . '&sort=t.category_id' . $url, true);
		$data['sort_status'] = $this->url->link('catalog/topic', 'user_token=' . $this->session->data['user_token'] . '&sort=t.status' . $url, true);
		$data['sort_date_added'] = $this->url->link('catalog/topic', 'user_token=' . $this->session->data['user_token'] . '&sort=t.date_added' . $url, true);

		$url = '';

		if (isset($this->request->get['filter_title'])) {
			$url .= '&filter_title=' . urlencode(html_entity_decode($this->request->get['filter_title'], ENT_QUOTES, 'UTF-8'));
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
		$pagination->total = $topic_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/topic', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($topic_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($topic_total - $this->config->get('config_limit_admin'))) ? $topic_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $topic_total, ceil($topic_total / $this->config->get('config_limit_admin')));

		$data['filter_title'] = $filter_title;
		$data['filter_category'] = $filter_category;
		$data['filter_status'] = $filter_status;
		$data['filter_date_added'] = $filter_date_added;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/topic_list', $data));
	}

	protected function getForm() {
		$data['text_form'] = !isset($this->request->get['topic_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['title'])) {
			$data['error_title'] = $this->error['title'];
		} else {
			$data['error_title'] = '';
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

		if (isset($this->request->get['filter_title'])) {
			$url .= '&filter_title=' . urlencode(html_entity_decode($this->request->get['filter_title'], ENT_QUOTES, 'UTF-8'));
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
			'href' => $this->url->link('catalog/topic', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		if (!isset($this->request->get['topic_id'])) {
			$data['action'] = $this->url->link('catalog/topic/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('catalog/topic/edit', 'user_token=' . $this->session->data['user_token'] . '&topic=' . $this->request->get['topic_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('catalog/topic', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['topic_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$topic_info = $this->model_catalog_topic->getTopic($this->request->get['topic_id']);
			
		}

		$this->load->model('catalog/category');
		$categories = array();
		$results = $this->model_catalog_category->getCategories(array());
		foreach ($results as $result) {
			$categories[] = array(
				'category_id' => $result['category_id'],
				'name'        => $result['name']
			);
		}
		$data['categories'] = $categories;

		$data['user_token'] = $this->session->data['user_token'];
		
		$this->load->model('catalog/topic');

		if (isset($this->request->post['topic_id'])) {
			$data['topic_id'] = $this->request->post['topic_id'];
		} elseif (!empty($topic_info)) {
			$data['topic_id'] = $topic_info['topic_id'];
		} else {
			$data['topic_id'] = '';
		}

		if (isset($this->request->post['title'])) {
			$data['title'] = $this->request->post['title'];
		} elseif (!empty($topic_info)) {
			$data['title'] = $topic_info['title'];
		} else {
			$data['title'] = '';
		}

		if (isset($this->request->post['category_id'])) {
			$data['category_id'] = $this->request->post['category_id'];
		} elseif (!empty($topic_info)) {
			$data['category_id'] = $topic_info['category_id'];
		} else {
			$data['category_id'] = '';
		}

		if (isset($this->request->post['date_added'])) {
			$data['date_added'] = $this->request->post['date_added'];
		} elseif (!empty($topic_info)) {
			$data['date_added'] = ($topic_info['date_added'] != '0000-00-00 00:00' ? $topic_info['date_added'] : '');
		} else {
			$data['date_added'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($topic_info)) {
			$data['status'] = $topic_info['status'];
		} else {
			$data['status'] = '';
		}
		

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/topic_form', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/topic')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['title']) {
			$this->error['title'] = $this->language->get('error_title');
		}

		if (!$this->request->post['category_id']) {
			$this->error['category_id'] = $this->language->get('error_category');
		}

		return !$this->error;
	}

	// protected function validateDelete() {
	// 	if (!$this->user->hasPermission('modify', 'catalog/topic')) {
	// 		$this->error['warning'] = $this->language->get('error_permission');
	// 	}

	// 	return !$this->error;
	// }
}