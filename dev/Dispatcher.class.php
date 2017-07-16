<?php

  class Dispatcher
  {
    /**
     * Dispatcheur construct call the Routeur and call the Controller
     * The Routeur parse the url with $_SERVER["REQUEST_URI"] field
     * The Controller check if isset a Routeur->controller and Routeur->function on the files
     * @return void
     * @author cbeauvoi
     */
    public function __construct()
    {
      $routeur = new Routeur();
      $controller = new Controller();
      $cont = $controller->call_controller($routeur->get_controller());
      $controller->call_function($routeur->get_controller(), $cont, $routeur->get_function());
    }
  }

?>
