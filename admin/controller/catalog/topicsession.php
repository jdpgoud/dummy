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
		$this->session->data['product_topic_id'] = $this->request->post['product_topic_id'];
		$data = [];
		$data['error'] = false;
		$data['msg'] = 'saved!';
		$data['redirect'] = $this->url->link('catalog/topicsession').'&user_token=' . $this->session->data['user_token'];
		
		$this->response->setOutput(json_encode($data));
	}

	public function removetopic() {
		if (($this->request->server['REQUEST_METHOD'] == 'POST')){
			$this->load->model('catalog/topic');
			$result = $this->model_catalog_topic->removeTopicDetails($this->request->post);
			$data = [];
			if($result){
				$data['error'] = false;
				$data['msg'] = 'Deleted successfully!';
			}else{
				$data['error'] = true;
				$data['msg'] = 'Something went wrong!';
			}
			$this->response->setOutput(json_encode($data));
			
		}
	}

	public function removefile() {
		$data = [];
		if (($this->request->server['REQUEST_METHOD'] == 'POST')){
			unlink(DIR_UPLOAD.$this->request->post['source']);
			$this->load->model('catalog/topic');
			$this->model_catalog_topic->removeAssignmentFile($this->request->post['session_id']);
			
			$data['error'] = false;
			$data['msg'] = 'Deleted successfully!';
		}else{
			$data['error'] = true;
			$data['msg'] = 'Something went wrong!';
		}
		$this->response->setOutput(json_encode($data));
	}

	public function add() {

		$this->document->setTitle('Topic Sessions');

		$this->load->model('catalog/topic');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$res = $this->uploadFile();
			foreach ($res as $value) {
				if($value['error'] && isset($value['msg'])){
					$this->error['warning'] = $value['msg'];
				}
			}
			if(!isset($this->error['warning'])){
				$this->request->post['topic_id'] = $this->session->data['topic_id'];
				$this->request->post['topic_product_id'] = $this->session->data['topic_product_id'];
				$this->request->post['product_topic_id'] = $this->session->data['product_topic_id'];
				$result = $this->model_catalog_topic->addTopicWithSession($this->request->post);
				if($result){
					$url = '&product_id='.$this->session->data['topic_product_id'];
					unset($this->request->post['topic_id']);
					unset($this->request->post['topic_product_id']);
					unset($this->request->post['product_topic_id']);
					$this->response->redirect($this->url->link('catalog/product/edit', 'user_token=' . $this->session->data['user_token'] . $url, true));
				}
			}
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
		$data['text_form'] = 'Add Sessions';

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
			'text' => 'Topic Session',
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
			$result = $this->model_catalog_topic->getTopicWithSession($this->session->data['topic_id'], $this->session->data['topic_product_id']);
			$data['topic_sessions'] = $result['session_data'];
			$data['product_topic'] = $result['product_topic'];
		}

		$this->load->model('catalog/testquestion');
		$results = $this->model_catalog_testquestion->getTests(array());

		foreach ($results as $result) {
			$data['testquestions'][] = array(
				'test_id'      => $result['test_id'],
				'title'        => $result['title']
			);
		}
		
		$data['user_token'] = $this->session->data['user_token'];
		
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
		
		$data['HTTP_CATALOG'] = HTTP_CATALOG;

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

	protected function uploadFile() {
		$json = array();

		if(isset($this->request->files['session'])){
				if(isset($this->request->files['session']['name'])){
					foreach ($this->request->files['session']['name'] as $index => $value) {
						$json[$index] = array();
						if (!empty($this->request->files['session']['name'][$index]['assignment_file']) && is_file($this->request->files['session']['tmp_name'][$index]['assignment_file'])) {
							// Sanitize the filename
							$filename = basename(preg_replace('/[^a-zA-Z0-9\.\-\s+]/', '', html_entity_decode($this->request->files['session']['name'][$index]['assignment_file'], ENT_QUOTES, 'UTF-8')));
				
							// Validate the filename length
							if ((utf8_strlen($filename) < 3) || (utf8_strlen($filename) > 64)) {
								$json[$index]['error'] = true;
								$json[$index]['msg'] = $this->language->get('error_filename');
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
								$json[$index]['error'] = true;
								$json[$index]['msg'] = $this->language->get('error_filetype');
							}
							// Allowed file mime types
							$allowed = array();
							
							$mime_allowed = preg_replace('~\r?\n~', "\n", $this->config->get('config_file_mime_allowed'));
							
				
							$filetypes = explode("\n", $mime_allowed);
				
							foreach ($filetypes as $filetype) {
								$allowed[] = trim($filetype);
							}
				
							if (!in_array($this->request->files['session']['type'][$index]['assignment_file'], $allowed)) {
								$json[$index]['error'] = true;
								$json[$index]['msg'] = 'Invalid file type!';
							}
				
							// Check to see if any PHP files are trying to be uploaded
							$content = file_get_contents($this->request->files['session']['tmp_name'][$index]['assignment_file']);
				
							if (preg_match('/\<\?php/i', $content)) {
								$json[$index]['error'] = true;
								$json[$index]['msg'] = 'Invalid file type!';
							}
				
							// Return any upload error
							if ($this->request->files['session']['error'][$index]['assignment_file'] != UPLOAD_ERR_OK) {
								$json[$index]['error'] = true;
								$json[$index]['msg'] = $this->language->get('error_upload_' . $this->request->files['session']['error'][$index]['assignment_file']);
							}
						} else {
							$json[$index]['error'] = true;
						}
				
						if (!$json[$index]) {
							// $file = $filename . '.' . token(32);
				
							// move_uploaded_file($this->request->files['test_key']['tmp_name'], DIR_UPLOAD . $file);
							move_uploaded_file($this->request->files['session']['tmp_name'][$index]['assignment_file'], DIR_UPLOAD . $filename);
							$this->request->post['session'][$index]['assignment_file'] = $filename;
							// Hide the uploaded file name so people can not link to it directly.
							// $this->load->model('tool/upload');
				
							// $json['code'] = $this->model_tool_upload->addUpload($filename, $file);
							$json[$index]['error'] = false;
							$json[$index]['msg'] = 'Uploaded successfully';
							$json[$index]['filename'] = $filename;
						}
					}
				}
		}		
		return $json;
	}
}