<?php
class ControllerCatalogTopicsession extends Controller {
	private $error = array();

	public function index() {
		$this->document->setTitle('Topic Sessions');		
		$this->getForm();
	}

	public function saveandcontinue() {
		$this->session->data['topic_id'] = $this->request->post['topic_id'];
		$this->session->data['topic_product_id'] = $this->request->post['product_id'];
		$data = [];
		$data['error'] = false;
		$data['msg'] = 'saved!';
		$data['redirect'] = $this->url->link('catalog/topicsession').'&user_token=' . $this->session->data['user_token'];
		
		$this->response->setOutput(json_encode($data));
	}

	public function add() {

		$this->document->setTitle('Topic Sessions');

		$this->load->model('catalog/topic');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->request->post['topic_id'] = $this->session->data['topic_id'];
			$this->request->post['topic_product_id'] = $this->session->data['topic_product_id'];
			$result = $this->model_catalog_topic->addTopicWithSession($this->request->post);
			if($result){
				$url = '&product_id='.$this->session->data['topic_product_id'];
				unset($this->request->post['topic_id']);
				unset($this->request->post['topic_product_id']);
				$this->response->redirect($this->url->link('catalog/product/edit', 'user_token=' . $this->session->data['user_token'] . $url, true));
			}
			// $this->session->data['success'] = $this->language->get('text_success');

			// $url = '';

			// if (isset($this->request->get['filter_title'])) {
			// 	$url .= '&filter_title=' . urlencode(html_entity_decode($this->request->get['filter_title'], ENT_QUOTES, 'UTF-8'));
			// }

			// if (isset($this->request->get['filter_category'])) {
			// 	$url .= '&filter_category=' . urlencode(html_entity_decode($this->request->get['filter_category'], ENT_QUOTES, 'UTF-8'));
			// }

			// if (isset($this->request->get['filter_status'])) {
			// 	$url .= '&filter_status=' . $this->request->get['filter_status'];
			// }

			// if (isset($this->request->get['filter_date_added'])) {
			// 	$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			// }

			// if (isset($this->request->get['sort'])) {
			// 	$url .= '&sort=' . $this->request->get['sort'];
			// }

			// if (isset($this->request->get['order'])) {
			// 	$url .= '&order=' . $this->request->get['order'];
			// }

			// if (isset($this->request->get['page'])) {
			// 	$url .= '&page=' . $this->request->get['page'];
			// }

			// $this->response->redirect($this->url->link('catalog/topic', 'user_token=' . $this->session->data['user_token'] . $url, true));
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

		// if (isset($this->request->get['filter_title'])) {
		// 	$url .= '&filter_title=' . urlencode(html_entity_decode($this->request->get['filter_title'], ENT_QUOTES, 'UTF-8'));
		// }

		// if (isset($this->request->get['filter_category'])) {
		// 	$url .= '&filter_category=' . urlencode(html_entity_decode($this->request->get['filter_category'], ENT_QUOTES, 'UTF-8'));
		// }

		// if (isset($this->request->get['filter_status'])) {
		// 	$url .= '&filter_status=' . $this->request->get['filter_status'];
		// }

		// if (isset($this->request->get['filter_date_added'])) {
		// 	$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		// }

		// if (isset($this->request->get['sort'])) {
		// 	$url .= '&sort=' . $this->request->get['sort'];
		// }

		// if (isset($this->request->get['order'])) {
		// 	$url .= '&order=' . $this->request->get['order'];
		// }

		// if (isset($this->request->get['page'])) {
		// 	$url .= '&page=' . $this->request->get['page'];
		// }

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
			$data['action'] = $this->url->link('catalog/topicsession/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('catalog/topicsession/edit', 'user_token=' . $this->session->data['user_token'] . '&topic=' . $this->request->get['topic_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('catalog/product', 'user_token=' . $this->session->data['user_token'] . $url, true);

		// if (isset($this->request->get['topic_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
		// 	$topic_info = $this->model_catalog_topic->getTopic($this->request->get['topic_id']);
			
		// }

		if(isset($this->session->data['topic_id']) && isset($this->session->data['topic_product_id'])){
			$this->load->model('catalog/topic');
			$result = $this->model_catalog_topic->getTopicWithSession($this->session->data['topic_id']);
			
			$data['topic_sessions'] = $result;
		}
		
		// $data['user_token'] = $this->session->data['user_token'];
		
		// $this->load->model('catalog/topic');

		// if (isset($this->request->post['topic_id'])) {
		// 	$data['topic_id'] = $this->request->post['topic_id'];
		// } elseif (!empty($topic_info)) {
		// 	$data['topic_id'] = $topic_info['topic_id'];
		// } else {
		// 	$data['topic_id'] = '';
		// }

		// if (isset($this->request->post['title'])) {
		// 	$data['title'] = $this->request->post['title'];
		// } elseif (!empty($topic_info)) {
		// 	$data['title'] = $topic_info['title'];
		// } else {
		// 	$data['title'] = '';
		// }

		// if (isset($this->request->post['category_id'])) {
		// 	$data['category_id'] = $this->request->post['category_id'];
		// } elseif (!empty($topic_info)) {
		// 	$data['category_id'] = $topic_info['category_id'];
		// } else {
		// 	$data['category_id'] = '';
		// }

		// if (isset($this->request->post['date_added'])) {
		// 	$data['date_added'] = $this->request->post['date_added'];
		// } elseif (!empty($topic_info)) {
		// 	$data['date_added'] = ($topic_info['date_added'] != '0000-00-00 00:00' ? $topic_info['date_added'] : '');
		// } else {
		// 	$data['date_added'] = '';
		// }

		// if (isset($this->request->post['status'])) {
		// 	$data['status'] = $this->request->post['status'];
		// } elseif (!empty($topic_info)) {
		// 	$data['status'] = $topic_info['status'];
		// } else {
		// 	$data['status'] = '';
		// }
		

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/topic_session_form', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/topicsession')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		// if (!$this->request->post['title']) {
		// 	$this->error['title'] = $this->language->get('error_title');
		// }

		// if (!$this->request->post['category_id']) {
		// 	$this->error['category_id'] = $this->language->get('error_category');
		// }

		return !$this->error;
	}
}