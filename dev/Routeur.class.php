<?php

  class Routeur
  {
    function __construct()
    {
      $uri = explode('/', $_SERVER["REQUEST_URI"]);
      $this->controller = (string)(isset($uri[2]) && !(empty($uri[2]))) ? $uri[2] : "index";
      $this->function = (string)(isset($uri[3]) && !(empty($uri[3]))) ? $uri[3] : "view";
      for ($i = 4; $i < count($uri); $i++)
      {
        if (count($ret = explode('=', $uri[$i])) == 2)
          $this->params[$ret[0]] = $ret[1];
        else
          $this->params[] = $uri[$i];
      }
    }

    public function get_controller() : string
    {
      return ($this->controller);
    }

    public function get_function() : string
    {
      return ($this->function);
    }

    public static function redirect($path) : string
    {
      return ("/framework/" . $path);
    }
  }

?>
