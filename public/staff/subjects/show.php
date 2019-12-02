<?php require_once("../../../private/initialize.php") ?>
<?php
$id = $_GET['id'] ?? '1'; // php >= 7.0
// in PHP < 7.0 (the old way)
//$id = isset($_GET['id']) ? $_GET['id'] : '1';

$subject = find_subject_by_id($id);

?>

<?php $page_title = 'Show Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id = "content">
  <a class="back-link" href = "<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to list</a>

  <div class = "Subject show">

    <h1>Subject: <?php echo h($subject['menu_name']); ?> </h1>

    <div class="attributes">

      <dl>
        <dt>Menu Name</dt>
        <dd><?php echo h($subject['menu_name']); ?></dd>
      </dl>

      <dl>
        <dt>Position</dt>
        <dd><?php echo h($subject['position']); ?></dd>
      </dl>

      <dl>
        <dt>Visible</dt>
        <dd><?php echo $subject['visible'] == '1' ? 'true' : 'false'; ?></dd>
      </dl>

    </div>

  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
