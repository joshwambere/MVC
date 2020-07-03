<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-6">
      <?php flash('register_success') ?>
      <h2 class="mx-auto">Login</h2>
      <p class="mx-auto">Fill in the form to login</p>
      <form class="" action="<?php echo URLROOT; ?>/users/login" method="POST">
        <div class="form-group">
          <label for="email">email <sup>*</sup> </label>
          <input class="form-control form-control-md <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" type="email" name="email" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="password">password <sup>*</sup> </label>
          <input class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" type="password" name="password" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="row">
          <div class="col">
            <input type="submit" class="btn btn-primary btn-block" name="register" value="login">
          </div>
          <div class="col">
            <a class="btn btn-dark btn-block" href="<?php echo URLROOT;?>users/register">no account? register</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
