<nav class="navbar navbar-expand-lg navbar-dark bg-dark f mb-3">
  <div class="container">
      <a class="navbar-brand" href="#">SharedPost</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo URLROOT ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT?>about">About Us</a>
          </li>

        </ul>
        <ul class="navbar-nav mL-auto">
          <?php if(isset($_SESSION['user_id'])) : ?>
            <li class="nav-item">
              <a class="nav-link " href="<?php echo URLROOT; ?>users/logout">logout</a>
            </li>
          <?php else : ?>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo URLROOT; ?>users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo URLROOT; ?>users/login">login</a>
          </li>
        <?php endif; ?>
        </ul>

      </div>
    </div>
</nav>
