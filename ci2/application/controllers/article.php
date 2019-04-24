<?php 

class article extends MY_controller{

/*	public function articleList(){
		$this->load->view('admin/articleList');
	}*/

	public function index(){

		/*$this->form_validation->set_rules('article_title','your article_title','required|min_length[1]');
		$this->form_validation->set_rules('article_body','your article_body','required|min_length[2]');
		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");*/

		$config = [
			'upload_path'=>'./upload/',
			'allowed_types'=>'gif|jpg|png'
		];

		$this->load->library('upload',$config);

		if($this->form_validation->run('add_article_rule') && $this->upload->do_upload()){

			$post = $this->input->post();
			$data = $this->upload->data();

			$image_path = base_url("upload".$data['raw_name'].$data['file_ext']);
			$post['image_path'] = $image_path;

			$da = $this->loginmodel->articleInsert($post);
			if($da){
			$this->session->set_flashdata('success','Add article success...');

				redirect('admin/welcome');
			}else{
				$this->session->set_flashdata('failed','Add artice failed...');	
				redirect('admin/welcome');
			}

		}else{
			$upload_error = $this->upload->display_errors();
			$this->load->view('admin/articleList',compact($upload_error));
		}
	}

	public function updatearticle($article_id){

		/*$this->form_validation->set_rules('article_title','your article_title','required|min_length[1]');
		$this->form_validation->set_rules('article_body','your article_body','required|min_length[2]');
		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>"); */

		

		if($this->form_validation->run('edit_article_rule')){

			$data = $this->input->post();

			$da = $this->loginmodel->updatedata($article_id,$data);
			if($da){
				$this->session->set_flashdata('success','Edit article success...');
			}else{
				$this->session->set_flashdata('failed','Edite artice failed...');	
			}
			redirect('admin/welcome');

		}else{
			
			$this->load->view('admin/edit_article');
		}
	}
}