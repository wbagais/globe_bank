<?php require_once("../../../private/initialize.php"); ?>

<?php $id = $_GET['id'] ?? '1'; ?>

<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<div id="content">

  <a class="back-linkh" href="<?php echo url_for('/staff/pages/index.php')?>">&laquo; Back to list</a>

  <div class= "page show">

    page ID: <?php echo h($id); ?>

  </div>

</div>

<?php include(SHARED_PATH . "/staff_footer.php"); ?>
