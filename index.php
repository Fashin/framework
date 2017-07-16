<?php

  define("ROOT", dirname(__FILE__) . "/");
  define("DEV", ROOT."dev/");
  define("VIEW", ROOT."public/view/");
  define("FORM", ROOT."modules/formulaires/");
  define("DB", ROOT."modules/database/");
  define("LOG", ROOT."log/");
  define("DB_NAME", "localhost");
  define("STYLE", '/public/style/');
  require_once('config/init.php');

  $dispatcher = new Dispatcher();
?>
