<?php 

class login extends MY_controller{



	/* public function __construct(){
		parent::__construct();
		if(!$this->session->set_userdata('id')){
			return redirect('login');
		}
	} */

	public function index(){

		$this->form_validation->set_rules('email','your_email','required|valid_email|min_length[1]');
		$this->form_validation->set_rules('pass','your_password','required|min_length[2]');
		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

		if($this->form_validation->run()){
			
			 $email = $this->input->post('email');
			 $pass  = $this->input->post('pass');

			 $id = $this->loginmodel->isvalidate($email, $pass);
			 if($id){
			 
			 	$this->session->set_userdata('id', $id);
			 	$this->session->set_flashdata('flashdata','welcome your page');
			 	redirect('admin/welcome');
			 }else{
			 	$this->session->set_flashdata('flashdata','invalid email/password');
			 	redirect('login');
			 }


		}else{
			
			$this->load->view('admin/login');
		}
	}


	public function sendemail(){

		$this->form_validation->set_rules('first_name','your_first_name..','required|min_length[1]');
		$this->form_validation->set_rules('last_name','your_last_name..','required|min_length[1]');
		$this->form_validation->set_rules('email','your_email..','required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','your_password..','required|min_length[1]');
		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

		if($this->form_validation->run()){

			$this->email->from(set_value('email'),set_value('first_name'));
			$this->email->to("khalilnstu@gmail.com");
			$this->email->subject("user form");
			$this->email->message("thank you for ragistation.");
			$this->email->set_newline("\r\n");
			$this->email->send();

			if(!$this->email->send()){
				show_error($this->email->print_debugger());
			}else{
				echo "email send success..";
			}
			
		}else{
			$this->load->view('admin/signup');
		}
	}
}