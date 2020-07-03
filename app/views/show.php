<?php require APPROOT . '/views/inc/header.php'; ?>
    <a class="btn btn-light mb-3" href="<?php echo URLROOT;?>Posts/"> <i class="fa fa-backward"></i> Back</a>
    <br>
<h4 class=""><?php  echo $data['posts']->title; ?></h4>
<div class="bg-secondary p-3 mb-3">
  Written by <?php echo $data['user']->name; ?>
</div>

<p class="border border-top-0 p-4"> <?php echo $data['posts']->body; ?></p>
<?php if($data['posts']->user_id==$_SESSION['user_id']): ?>

<a class="btn btn-dark" href="<?php echo URLROOT;?>posts/edit">edit</a>

<a class="btn btn-danger float-right" href="<?php echo URLROOT;?>posts/delete">Delete</a>

<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
