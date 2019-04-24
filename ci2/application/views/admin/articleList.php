<?php include 'header.php'; ?>

<h1>Admin form</h1>

<?= form_open_multipart('article/index'); ?>
<?= form_hidden('user_id',$this->session->userdata('id')); ?>
<?= form_hidden('created_at',date('Y-m-d H-i-s')); ?>

<label for="email">Article_title:</label>
  <div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <?= form_input(['class'=>'form-control','placeholder'=>'article_title..','name'=>'article_title','value'=>set_value('article_title')]); ?>
  </div>
  </div>
  <div class="col-lg-6">
    <?= form_error('article_title'); ?>
      </div>
      </div>

      <label for="pass">Article_body:</label>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <?= form_textarea(['class'=>'form-control','placeholder'=>'your_article..','name'=>'article_body','value'=>set_value('article_body')]); ?>
          </div>
        </div>
        <div class="col-lg-6">
           <?= form_error('article_body'); ?>
        </div>
      </div>

      <label for="pass">Select image:</label>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
           <?= form_upload(['name'=>'userfile']); ?>
          </div>
        </div>
        <div class="col-lg-6">
           <?php if(isset($upload_error)){ echo $upload_error;} ?>
        </div>
      </div>
      
      <?= form_submit(['value'=>'submit','class'=>'btn btn-primary']); ?>
      <?= form_reset(['value'=>'reset','class'=>'btn btn-danger']); ?>
     
  <?= form_close(); ?>



<?php include 'footer.php'; ?>