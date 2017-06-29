<?php

  class ConnexionController extends Controller
  {
    public function view()
    {
      $this->set("title", "you need connexion");
      $this->set("link", "Vers la page d'accueil");
      $this->set("formulaire", $this->formulaire(Routeur::redirect("connexion/signIn"))->login(array("Pseudo : " => "login", "Password : " => "password"), array("text", "password"), "Log In"));
      $this->rend("connexion");
    }

    public function signIn()
    {
      print_r($_POST);
      if (CB::_assert($_POST, array("login" => "[a-zA-Z]", "password")))
      {
        print_r("post success");
      }
      else
        print_r("<br>error from post");
    }
  }

?>
