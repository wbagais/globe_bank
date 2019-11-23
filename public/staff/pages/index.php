<?php require_once("../../../private/initialize.php") ?>

<?php
  $pages = [
    ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'Globle Bank'],
    ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'History'],
    ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Leadership'],
    ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Contact Us'],
  ];
?>

<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>


<div id="content">
  <div class = "pages listing">
    <h1>Pages</h1>

    <div class="actions">
      <a class= "action" href ="">Create New Page</a>
    </div>

    <table class = "list">
      <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Name</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <tr>
        <?php
          foreach ($pages as $page) {
            echo "<tr>";
            echo "<td>" . h($page['id']) . "</td>";
            echo "<td>" . h($page['position']) . "</td>";

            echo "<td>";
            echo $page['visible'] == 1 ? 'True' : 'False';
            echo "</td>";

            echo "<td>" . h($page['menu_name']) . "</td>";
            echo "<td><a href =" .
            url_for('/staff/pages/show.php?id='). h(u($page['id'])) .
            ">View</a></td>";
            echo "<td><a href =''>Edit</a></td>";
            echo "<td><a href =''>Delete</a></td>";
            echo "</tr>";
          }
        ?>
      </tr>
    </table>
  </div>
</div>

<?php include(SHARED_PATH . "/staff_footer.php"); ?>
