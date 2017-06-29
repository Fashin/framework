<?php

  class IndexController extends Controller
  {
      public function view()
      {
        $this->set("title", "Hello World");
        $this->set("link", "Vers la page de connexion");
        $this->rend("index");
      }
  }

?>
