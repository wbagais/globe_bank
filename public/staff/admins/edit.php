<?php require_once("../../../private/initialize.php"); ?>
<?php require_login(); ?>
<?php
if(!isset($_GET['id'])){
  redirect_to(url_for('/staff/pages/index.php'));
}

$id = $_GET['id']
?>

<?php
if(is_post_request()){
  $admin = [];
  $admin['id'] = $id;
  $admin['first_name']= $_POST['first_name'] ?? '';
  $admin['last_name']= $_POST['last_name'] ?? '';
  $admin['email']= $_POST['email'] ?? '';
  $admin['username']= $_POST['username'] ?? '';
  $admin['password']= $_POST['password'] ?? '';
  $admin['confirm_password']= $_POST['confirm_password'] ?? '';

  $result = update_admin($admin);
  if($result === true){
    $_SESSION['message'] = "The admin was updated successfully.";
    redirect_to(url_for('/staff/admins/show.php?id=' . $id));
  } else{
    $error = $result;
  }
} else {
  $admin = find_admin_by_id($id);
}
?>

<?php $page_title = "Edit Admin"; ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<div id="content">
  <a class="back-linkh" href="<?php echo url_for('/staff/admins/index.php')?>">&laquo; Back to list</a>
  <div class="edit admin">
    <h1>Edit Admin</h1>
    </dr>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($id))); ?>" method="post" >

      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name"  value="<?php echo h($admin['first_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name"  value="<?php echo h($admin['last_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email"  value="<?php echo h($admin['email']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Username</dt>
        <dd><input type="text" name="username"  value="<?php echo h($admin['username']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Password</dt>
        <dd><input type="password" name="password"  value="" /></dd>
      </dl>

      <dl>
        <dt>Confirm Password</dt>
        <dd><input type="password" name="confirm_password"  value="" /></dd>
      </dl>
      <p>
        Password should be at least 12 characters andinclude at least one
        uppercase letter, lowercase letter, number, and sympol.
      </p>
      <br />

      <div id='operation'>
        <input type='submit' value = 'Edit Admin' />
      </div>
    </form>
  </div>
</div>
<?php include(SHARED_PATH . "/staff_footer.php"); ?>
