<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row mb-3">
  <div class="col-md-6">
    <h1>Posts</h1>
  </div>
  <div class="col-md-6">
    <a class="btn btn-primary float-right" href="<?php echo URLROOT ?>posts/add">
      <i class="fa fa-pencil"></i> Add Posts
    </a>
  </div>
</div>


  <?php foreach ($data['posts'] as $posts) : ?>
    <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $posts->title;  ?></h4>

      <div class="bg-light p-2 mb-3">
        Written by: <?php echo $posts->name;?> ON <?php echo $posts->postCreated; ?>
      </div>
      <p class="card-text"><?php echo $posts->body; ?></p>
      <a href="<?php echo URLROOT ?>posts/show/<?php echo $posts->postId ?>" class="btn btn-dark ">More</a>
    </div>
  <?php endforeach; ?>




<?php require APPROOT . '/views/inc/footer.php'; ?>
