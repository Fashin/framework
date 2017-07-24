<?php

  define("ROOT", dirname(__FILE__) . "/");
  define("DEV", ROOT."dev/");
  define("VIEW", ROOT."public/view/");
  define("FORM", ROOT."modules/formulaires/");
  define("DB", ROOT."modules/database/");
  define("LOG", ROOT."log/");
  define("DB_NAME", "localhost");
  define("STYLE", 'public/style/');
  define("IMG", "/public/img/");
  define("MOD", ROOT."modules/");
  define("JS", "public/script/");
  require_once('config/init.php');

  $dispatcher = new Dispatcher();
?>
