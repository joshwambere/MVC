<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-6">
      <h2 class="mx-auto">Create an Account</h2>
      <p class="mx-auto">Fill in the form to register</p>
      <form class="" action="<?php echo URLROOT; ?>/users/register" method="POST">
        <div class="form-group">
          <label for="name">name <sup>*</sup> </label>
          <input class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" type="text" name="name" value="<?php echo $data['name']; ?>">
          <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="email">email <sup>*</sup> </label>
          <input class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" type="email" name="email" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="password">password <sup>*</sup> </label>
          <input class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" type="password" name="password" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="conf_password">confirm password <sup>*</sup> </label>
          <input class="form-control form-control-lg <?php echo (!empty($data['conf_password_err'])) ? 'is-invalid' : ''; ?>" type="password" name="conf_password" value="<?php echo $data['conf_password']; ?>">
          <span class="invalid-feedback"><?php echo $data['conf_password_err']; ?></span>
        </div>
        <div class="row">
          <div class="col">
            <input type="submit" class="btn btn-success btn-block" name="register" value="register">
          </div>
          <div class="col">
            <a class="btn btn-light btn-block" href="<?php echo URLROOT;?>users/login">Have an accout? Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
