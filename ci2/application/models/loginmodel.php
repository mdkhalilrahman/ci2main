<?php 

class loginmodel extends CI_Model{

	public function isvalidate($email, $pass){
		$q = $this->db->where(['email'=>$email,'password'=>$pass])
					   ->get('user');

		if($q->num_rows()){
			return $q->row()->id;
		}else{
			return false;
		}
	}

	public function articlelist($limit, $offset){

		$id = $this->session->userdata('id');
		$q = $this->db->select()
				 ->from('articles')
				 ->where(['user_id'=> $id])
				 ->limit($limit, $offset)
				 ->get();
				 return $q;
	}

	public function num_rows(){
		$id = $this->session->userdata('id');
		$q = $this->db->select()
				 ->from('articles')
				 ->where(['user_id'=> $id])
				 ->get();
				 return $q->num_rows();
	}

	public function insertsign($data){
		return $this->db->insert('user', $data);
	}

	public function articleInsert($data){
		return $this->db->insert('articles', $data);
	}

	public function deletedata($id){
		return $this->db->delete('articles',['id'=>$id]);
	}
	public function editfatch($id){
		$q = $this->db->select()
						->from('articles')
						->where(['id'=>$id])
						->get();
						return $q->row();
	}

	public function updatedata($article_id,$data){
		return $this->db->where('id', $article_id)
				 ->update('articles', $data);
	}
}