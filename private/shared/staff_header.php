<?php
   if(!isset($page_title)) { $page_title = "Staff Area"; }
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" media="all" href= "<?php echo
  url_for('stylesheets/staff.css'); ?>" />
  <title>GBI - <?php echo h($page_title); ?> </title>
</head>

<body>
  <header>
    <h1>GBI Staff Area: <?php echo h($page_title); ?></h1>
  </header>

  <navigation>
    <ul>
      <li><a href = "<?php echo url_for('/staff/index.php'); ?>">Menue</a></li>
    </ul>
  </navigation>
