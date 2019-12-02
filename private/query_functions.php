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

  function find_subject_by_id($id){
    global $db;

    $sql = "SELECT * FROM subjects ";
    // it is a good practice to have a single quotes '' between the id for a security reson
    // the ; can be ignored it would be atuo added
    $sql .= "WHERE id='" . $id . "'";

    $result = mysqli_query($db, $sql);

    confirm_result_set($result);

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $subject; // retuent an assoc. array
  }

  function insert_subject($subject){
    global $db;

    $sql =  "INSERT INTO subjects ";
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . $subject['menu_name'] . "',";
    $sql .= "'" . $subject['position'] . "',";
    $sql .= "'" . $subject['visible'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statment, $result is true/false
    if($result){
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_subject($subject){
    global $db;

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name='" . $subject['menu_name'] . "', ";
    $sql .= "position='" . $subject['position'] . "', ";
    $sql .= "visible='" . $subject['visible'] . "' ";
    $sql .= "WHERE id='" . $subject['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    // For UPDATE statment, $result is true/false
    if($result){
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_subject($id){
    global $db;

    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE id ='" . $id . "'";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    // For DELETE statment, $result is true/false
    if($result) {
      return true;

    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
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

  function find_page_by_id($id){
    global $db;

    //$sql = "SELECT pages.*, subjects.menu_name AS subject FROM pages ";
    //$sql .= "LEFT JOIN subjects ";
    //$sql .= "ON pages.subject_id = subjects.id ";
    //$sql .= "WHERE pages.id ='" . $id . "'; ";

    $sql =  "SELECT * FROM pages ";
    $sql .= "WHERE id='" . $id . "'";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $page= mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page; // return an assoc. array
  }

  function insert_page($page){
    global $db;

    $sql = "INSERT INTO pages ";
    $sql .= "(subject_id, menu_name, position, visible, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . $page['subject_id'] . "', ";
    $sql .= "'" . $page['menu_name'] . "', ";
    $sql .= "'" . $page['position'] . "', ";
    $sql .= "'" . $page['visible'] . "', ";
    $sql .= "'" . $page['content'] . "' ";
    $sql .= ")";

    //echo $sql;
    $result = mysqli_query($db, $sql);

    if($result){
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_page($page){
    global $db;

    $sql = "UPDATE pages SET ";
    $sql .= "subject_id='" . $page['subject_id'] . "', ";
    $sql .= "menu_name ='" . $page['menu_name'] . "', ";
    $sql .= "position ='" . $page['position'] . "', ";
    $sql .= "visible ='" . $page['visible'] . "', ";
    $sql .= "content ='" . $page['content'] . "' ";
    $sql .= "WHERE id ='" . $page['id'] . "'" ;
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statment, $result is true/false
    if($result){
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_page($id){
    global $db;

    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id = '" . $id . "'";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statment, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }
 ?>
