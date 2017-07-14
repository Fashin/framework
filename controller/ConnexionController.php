<?php

  class ConnexionController extends Controller
  {
    public function view()
    {
      $this->set("title", "you need connexion");
      $this->set("link", "Vers la page d'accueil");
      $this->set("formulaire", $this->formulaire()->get_form("connexion"));
      $this->rend("connexion");
    }

    public function signIn()
    {
      if (CB::_assert($_POST, array("login", "password", "log_in")))
      {
        $model = $this->call_db();
      }
    }
  }

?>
