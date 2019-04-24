<?php include 'header.php'; ?>

<h1>Admin form</h1>

<?= form_open("article/updatearticle/$data->id"); ?>

<label for="email">Article_title:</label>
  <div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <?= form_input(['class'=>'form-control','placeholder'=>'article_title..','name'=>'article_title','value'=>set_value('article_title',$data->article_title)]); ?>
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
            <?= form_textarea(['class'=>'form-control','placeholder'=>'your_article..','name'=>'article_body','value'=>set_value('article_body',$data->article_body)]); ?>
          </div>
        </div>
        <div class="col-lg-6">
           <?= form_error('article_body'); ?>
        </div>
      </div>
      
      <?= form_submit(['value'=>'submit','class'=>'btn btn-primary']); ?>
      <?= form_reset(['value'=>'reset','class'=>'btn btn-danger']); ?>
     
  <?= form_close(); ?>



<?php include 'footer.php'; ?>