<?php

class Controller
{

  public function call_controller($name)
  {
    $name = ucfirst($name) . "Controller";
    $path = ROOT . "controller/" . $name . ".php";
    if (file_exists($path))
    {
      require_once($path);
      return ($cont = new $name());
    }
    else
      return (NULL);
  }

  public function call_function($class_name, $cont, $func_name)
  {
    if ($cont)
    {
      if (class_exists(ucfirst($class_name) . "Controller") && method_exists($cont, $func_name))
        $cont->$func_name();
    }
    else
      return (NULL);
  }

  public function set($key, $value)
  {
    $this->var[$key] = $value;
  }

  public function rend($view)
  {
    ob_start();
    extract($this->var);
    require_once(VIEW . $view . ".php");
    $view_content = ob_get_clean();
    require_once(VIEW . "default.php");
  }

  public function formulaire($action)
  {
    require_once(DEV."Formulaire.class.php");
    return (new Formulaire($action));
  }

}

?>
