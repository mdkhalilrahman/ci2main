<?php include "header.php"; ?>
<?php if($error = $this->session->flashdata('response')){ ?>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h2><?=  $error;  ?></h2>
</div>
<?php } ?>
<!--signup form-->
<div>
	<h1 class="text-center mt-5 mb-1 text-primary">Signup Form</h1>
	<?= form_open('admin/signup'); ?>

	<label for="">First_name:</label>
	<div class="row">
		<div class="col-lg-6 form-group">
			<?= form_input(['name'=>'first_name','placeholder'=>'your first name...','class'=>'form-control','value'=>set_value('first_name')]); ?>
		</div>
		<div class="col-lg-6">
			<?= form_error('first_name'); ?>
		</div>
	</div>
	

	<label for="">Last_name:</label>
	<div class="row">
		<div class="col-lg-6 form-group">
			<?= form_input(['name'=>'last_name','placeholder'=>'your last name...','class'=>'form-control','value'=>set_value('last_name')]); ?>
		</div>
		<div class="col-lg-6">
			<?= form_error('last_name'); ?>
		</div>
	</div>

	<label for="">Email:</label>
	<div class="row">
		<div class="col-lg-6 form-group">
			<?= form_input(['name'=>'email','placeholder'=>'your email...','class'=>'form-control','value'=>set_value('email')]); ?>
		</div>
		<div class="col-lg-6">
			<?= form_error('email'); ?>
		</div>
	</div>

	<label for="">Password:</label>
	<div class="row">
		<div class="col-lg-6 form-group">
			<?= form_input(['name'=>'password','placeholder'=>'your password...','class'=>'form-control','value'=>set_value('password')]); ?>
		</div>
		<div class="col-lg-6">
			<?= form_error('password'); ?>
		</div>
	</div>

		<?= form_submit(['class'=>'btn btn-primary','value'=>'Submit']); ?>
		<?= form_reset(['class'=>'btn btn-danger','value'=>'Reset']); ?>
		


	<?= form_close(); ?>

</div>




<?php include "footer.php"; ?>