<?php require APPROOT . '/views/inc/header.php'; ?>

    <a class="btn btn-light mb-3" href="<?php echo URLROOT;?>Posts/"> <i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-6">
      <h2 class="mx-auto">Add Post</h2>
      <p class="mx-auto">Fill in the form to add a post</p>
      <form class="" action="<?php echo URLROOT; ?>posts/add" method="POST">
        <div class="form-group">
          <label for="title">title <sup>*</sup> </label>
          <input class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" type="text" name="title" value="<?php echo $data['title'];  ?>">
          <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="body">Body <sup>*</sup> </label>
          <textarea class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"  name="body" value="<?php echo $data['body']; ?>"></textarea>
          <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
        </div>


        <input type="submit" class="btn btn-success " name="register" value="add">
      </form>
    </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
