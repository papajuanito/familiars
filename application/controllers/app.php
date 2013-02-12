<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('main');
		$this->load->view('templates/footer');
	}

	public function search(){

		$search_term = trim(strip_tags($_GET['term']));

		$this->load->model('app_model');
		$term_results = $this->app_model->search_with_terms($search_term);

		$this->return_json($term_results);

	}

	public function familiar(){

		$familiar_id = $this->uri->segment(3);

		if($familiar_id){
			$this->load->model('app_model');
			$familiar = $this->app_model->get_familiar($familiar_id);

			var_dump($familiar);

			$this->load->view('templates/header');
			$this->load->view('familiar');
			$this->load->view('templates/footer');

		}

		
	}

	public function items(){
		$sub_type = $this->uri->segment(3);

		if($sub_type){
			$this->load->model('app_model');
			$items_by_sub_type = $this->app_model->get_item_with_sub_type($sub_type);

			$this->load->view('templates/header', array('body_class' => 'items'));
			$this->load->view('items');
			$this->load->view('templates/footer');

		}
	}

	public function morph(){
		$this->load->model('app_model');
		$this->app_model->morph();
	}

	private function return_json($data){
		header('Content-type: application/json');
		echo json_encode($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
