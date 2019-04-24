<?php

class users extends MY_controller{
	
	public function index(){

		
		$this->load->view('users/article_list');
	}
	public function signup(){
		$this->load->view('admin/signup');
	}
}