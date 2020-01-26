<?php require_once("../../../private/initialize.php")?>
<?php
  require_login();
  //we keep this page because it is a good practise to have an index.php page in each folder
  redirect_to(url_for('/staff/index.php'));
?>
