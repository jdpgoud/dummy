<?php
include ('vdo_embed.php');

class ControllerCommonStudentassignment extends Controller {
	public function index() {
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));
		$data['header'] = $this->load->controller('common/header');
		$data['footer'] = $this->load->controller('common/footer');
		if (isset($this->request->get['route'])) {
			$this->document->addLink($this->config->get('config_url'), 'canonical');
		}
		$this->load->model('catalog/studentassignment');
		
		$data['topics'] = $this->model_catalog_studentassignment->getLeftTopicMenu($this->request->get['product_id']);
		
		$data['first_topic_session_videos'] = $this->model_catalog_studentassignment->getFirstTopicSessionVideos($this->request->get['product_id'], reset($data['topics'])['sessions'][0]['session_id']);
		$this->response->setOutput($this->load->view('common/studentassignment',$data));
		
	}
	
	public function getTopicsbyproduct(){
		$topic_id=$_POST['topic_id'];
		$this->load->model('catalog/studentassignment');
		$data['SessionVideo']=$this->model_catalog_studentassignment->getListOfTopicSessions($topic_id);
		//$json=array('a'=>'a');
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
	
	
	public function getVideosbysessions(){
		 $session_id=$_POST['session_id'];
		$this->load->model('catalog/studentassignment');
		$data['SessionVideo']=$this->model_catalog_studentassignment->getListOfSessionVideos($session_id);
		//$json=array('a'=>'a');
		$arr = [];
		foreach($data['SessionVideo'] as $video){
			$video['video_id'] = 'e46cadca7efa4f809c7d2d59a96d20bb';
			$arr['SessionVideo'][] = array(
				"video_id" => $video['video_id'],
				"topic_session_id" => $video['topic_session_id'],
				"player" => vdo_embed($video['video_id'], '9ae8bbe8dd964ddc9bdb932cca1cb59a'),
			);
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($arr));
	}
	
	public function getListOfSessionTestQuestions(){
		  $test_id=$_POST['test_id'];
		$this->load->model('catalog/studentassignment');
		$data['sessiontestquestions']=$this->model_catalog_studentassignment->getListOfSessionTestQuestions($test_id);
		//$json=array('a'=>'a');
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
	
}
