<?php

class admin extends MY_controller{

	/*public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('id'))
		redirect('admin');
	}*/
	
	public function index(){
		$this->load->view('admin/login');
	}

	public function welcome(){
		/*if(!$this->session->userdata('id'))
		redirect('admin/index');*/

		$this->load->model('loginmodel');
		$this->load->library('pagination');

		$config = [
			'base_url' => base_url('admin/welcome'),
			'per_page' => 2, 
			'total_row' => $this->loginmodel->num_rows(), 
			'full_tag_open'=>"<ul class='pagination'>",
			'full_tag_close'=>"</ul>",
			'next_tag_open'=>"<li>",
			'next_tag_close'=>"</li>",
			'prev_tag_open'=>"<li>",
			'prev_tag_close'=>"</li>",
			'num_tag_open'=>"<li>",
			'num_tag_close'=>"</li>",
			'cur_tag_open'=>"<li class='active'><a>",
			'cur_tag_close'=>"</a></li>",
		];

		$this->pagination->initialize($config);

		//$arlist["articlelist"] = $this->loginmodel->articlelist();
		$arlist["articlelist"] = $this->loginmodel->articlelist($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/dashboard',$arlist);
	}

	public function article(){
		$this->load->view('admin/articleList');
	}

	public function signup(){

		$this->form_validation->set_rules('first_name','your_first_name..','required|min_length[1]');
		$this->form_validation->set_rules('last_name','your_last_name..','required|min_length[1]');
		$this->form_validation->set_rules('email','your_email..','required|min_length[1]');
		$this->form_validation->set_rules('password','your_password..','required|min_length[1]');
		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

		if($this->form_validation->run()){

			$data = $this->input->post();
			if($this->loginmodel->insertsign($data)){
				$this->session->set_flashdata('response','insert successfully');
						$this->load->view('admin/signup');

			}else{
				echo "data not inserting...";
			}
			echo "success";

		}else{
			$this->load->view('admin/signup');

		}
	}

	public function logout(){
		$this->session->unset_userdata('id');
		$this->load->view('admin/login');
	}

	public function delete(){
		$id = $this->input->post('id');
		$del = $this->loginmodel->deletedata($id);

		if($del){
			$this->session->set_flashdata('success','delete successfully...');
		}else{
			$this->session->set_flashdata('failed','delete failed...');
		}
		redirect('admin/welcome');
	}

	public function edit(){
		$id = $this->input->post('id');
		$data = $this->loginmodel->editfatch($id);
		$this->load->view('admin/edit_article',['data'=>$data]);
	}


}