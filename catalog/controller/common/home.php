<?php
class ControllerCommonHome extends Controller {
	public function index() {
		
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink($this->config->get('config_url'), 'canonical');
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
		if($this->customer->isLogged() && $this->customer->getGroupId() == 2){ //isset($this->session->data['customer_group_id']) && $this->session->data['customer_group_id'] == 2
			
			$this->load->model('catalog/product');
			$results = $this->model_catalog_product->getCustomerId($this->customer->getId(), $this->session->data['customer_group_id']);
			 
			 foreach($results as $result){
				$data['products'][] = array(
                    'product_id'  => $result['product_id'],
                    'thumb'       => $result['image'],
                    'name'        => $result['name'],
                    'href'        => $this->url->link('common/studentassignment', 'product_id=' . $result['product_id'])
                );
			}
			$this->response->setOutput($this->load->view('common/homestudent', $data));
		}else{
			$this->response->setOutput($this->load->view('common/home', $data));
		}
	}
}
