<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php
if(!isset($_GET['id'])){
  redirect_to(url_for('/staff/admins/index.php'));
}

$id = $_GET['id'];
 ?>

 <?php
if(is_post_request()){
  $result = delete_admin($id);
  $_SESSION['message'] = "The user was deleted successfully.";
  redirect_to(url_for('/staff/admins/index.php'));
} else {
  $admin = find_admin_by_id($id);
}
 ?>

 <?php $page_title = "Delete Admin"; ?>

 <?php include(SHARED_PATH . '/staff_header.php'); ?>

 <div id="content">
   <a class="back_link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

   <div class="admin delete">
     <h1>Delete Admin</h1>
     <p>Are you sure you want to delete this admin?</p>
     <p class="item"> <?php echo $admin['username']; ?></p>

     <form action = "<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin['id']))); ?>" method="post">
       <div id="operations">
         <input type="submit" name="commit" value="Delete admin"/>
       </div>
     </form>

   </div>

 </div>
