<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Article List</title>
  
  <?= link_tag("assets/css/bootstrap.min.css") ?>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Article List</a>
  <?php
          if($this->session->userdata('id')){
            ?>
            <?= anchor('admin/logout','logout',['class'=>'btn btn-danger']); ?>
         <?php   
          }
         ?>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a>
      </li>
    </ul>
 
  </div>
</nav>
<div class="container">