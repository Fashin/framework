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
        $str = CB::_var_dump(array("bonjour" =>"Hello World", 0 => 1, array("bonjour"=>"test", 1 => 1)));
        $this->set("debug", $str);
        $this->rend('connexion');
        //$this->call_model('insert')->db_insert('forum', array('title'), array('my title'));
      }
    }
  }

?>
