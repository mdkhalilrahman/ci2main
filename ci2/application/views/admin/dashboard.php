<?php include "header.php"; ?>
<?php if($welcome=$this->session->flashdata('flashdata')): ?>
	<div class="alert alert-dismissible alert-primary">
	  <?php echo $welcome; ?>
	</div>
<?php endif ?>
<?php if($succ=$this->session->flashdata('success')){ ?>
	<div class="alert alert-dismissible alert-success">
	  <?php echo $succ; ?>
	</div>
<?php }elseif($failed=$this->session->flashdata('failed')){ ?>
	<div class="alert alert-dismissible alert-danger">
	  <?php echo $failed; ?>
	</div>
<?php } ?>
<div class="container mt-5">
	<?= anchor('admin/article','Add_article',['class'=>'btn btn-primary']); ?>
	<?= $this->db->last_query(); ?>
	<table class="table mt-5">
		<thead>
			<tr>
				<th>ID</th>
				<th>Article title</th>
				<th>Article body</th>
				<<th>Image</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Created_at</th>
			</tr>
		</thead>
		<tbody>
			<?php  if($articlelist->num_rows() > 0){  ?>
			<?php

				foreach ($articlelist->result() as $value) {
			?>

			<tr>
				<td> <?=  $value->user_id; ?> </td>
				<td> <?=  anchor("article/{$value->id}",$value->article_title); ?> </td>
				<td> <?=  $value->article_body; ?> </td>
				<td> 
					<img src="<?=  $value->image_path; ?>" alt="1" width="280" height="200">
				</td>
				<td>
					<?=
						form_open('admin/edit'),
						form_hidden('id',$value->id),
						form_submit(['name'=>'submit','value'=>'Edit','class'=>'btn btn-primary']),
						form_close()
					?>
				</td>
				<td>	
					<?=
						form_open('admin/delete'),
						form_hidden('id',$value->id),
						form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
						form_close()
					?>
				</td>
				<td> <?= date('d M y H:i:s',strtotime($value->created_at));  ?> </td>
			</tr>

			<?php }}else{ ?>
				<tr><td>no data</td></tr>
				<?php } ?>

		</tbody>
		
	</table>
<?= $this->pagination->create_links(); ?>
</div>

	


<?php include "footer.php"; ?>