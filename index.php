<?php

  define("ROOT", dirname(__FILE__) . "/");
  define("DEV", ROOT."dev/");
  define("VIEW", ROOT."public/view/");
  require_once('config/init.php');

  $dispatcher = new Dispatcher();
?>