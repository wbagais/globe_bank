<?php

  function find_all_subjects(){
    global $db;

    // We need a space after subjects befor we concatenate it with other string
    // if we did not it will look like: "subjectsORDER BY"
    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY position ASC";
    // echo $sql; // Check the sql query
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_all_pages(){
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY subject_id ASC, position ASC";
    //to check the query
    //echo $sql;

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
 ?>
