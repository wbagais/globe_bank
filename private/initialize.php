<?php
ob_start();  //output buffering is turned on
  // Assign file paths to PHP constants
  // __FILE__ returns the current path to this file
  // dirname() returns the path to the parent directory
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . "/public");
  define("SHARED_PATH", PRIVATE_PATH . "/shared");

// Assign the root URL to a PHP constant
// * Do not need to include the Domain
// * Use same document root as webserver
// * Can set a hardcided value:
// define("WWW_ROOT", '/~wbagais/globle_bank/public');
//define("WWW_ROOT", ''); //if you are in a domain name
// * OR Can dynamically find everything in URL up to "/public"

// ** $public_end is  using strpos which returen int that represent the position
// of c in the path up to /public
// ** + 7 to go to the end of the /public
// ** $_SERVER['SCRIPT_NAME'] is: /~wbagais/globe_bank/public/staff/index.php
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
// ** $doc_root is /~wbagais/globe_bank/public
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

  require_once("functions.php");

 ?>
