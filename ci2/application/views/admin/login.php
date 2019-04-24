<?php include "header.php"; ?>
  
<?php if($error=$this->session->flashdata('flashdata')): ?>
<div class="alert alert-dismissible alert-warning">
  <?php echo $error; ?>
</div>
<?php endif ?>

<!--admin form-->

<h1>Admin form</h1>

<?php echo form_open('login/index'); ?>

<label for="email">Email:</label>
  <div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <?php echo form_input(['class'=>'form-control','placeholder'=>'your_email..','name'=>'email','value'=>set_value('email')]); ?>
  </div>
  </div>
  <div class="col-lg-6">
    <?= form_error('email'); ?>
      </div>
      </div>

      <label for="pass">Password:</label>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <?= form_password(['class'=>'form-control','placeholder'=>'your_password..','name'=>'pass','value'=>set_value('pass')]); ?>
          </div>
        </div>
        <div class="col-lg-6">
           <?= form_error('pass'); ?>
        </div>
      </div>
      
      <?= form_submit(['value'=>'submit','class'=>'btn btn-primary','name'=>'submit']); ?>
      <?= form_reset(['value'=>'reset','class'=>'btn btn-danger','name'=>'reset']); ?>
      <?= anchor('users/signup','signup now',['class'=>'btn btn-primary']); ?>
     
  <?= form_close(); ?>

<?php include "footer.php"; ?>