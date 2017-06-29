<?php

  class ConnexionController extends Controller
  {
    public function view()
    {
      $this->set("title", "you need connexion");
      $this->set("link", "Vers la page d'accueil");
      $this->rend("connexion");
    }
  }

?>
