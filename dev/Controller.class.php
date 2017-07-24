<?php

class Controller
{

  private static $style = array();
  private static $javascript = array();

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

  public function call_menu()
  {
    $this->call_style("menu");
    $tab = array("Portfolio" => "index", "Me contacter" => "contact", "Qui suis-je ?" => "presentation");
    $ret = '<div id="menu">';
    foreach ($tab as $key => $val)
      $ret .= '<a href="' . $val . '">'. $key . "</a>";
    $ret .= "</div>";
    $this->set("logo", $this->get_picture("logo", "logo"));
    $this->set("menu", $ret);
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
    foreach (self::$style as $value)
      echo '<link rel="stylesheet" href="' . $value . '">';
    $head_content = ob_get_clean();
    ob_start();
    extract($this->var);
    require_once(VIEW . $view . ".php");
    $view_content = ob_get_clean();
    ob_start();
    foreach (self::$javascript as $value)
      echo '<script src="' . $value . '" charset="utf-8"></script>';
    $footer_content = ob_get_clean();
    require_once(VIEW . "default.php");
  }

  public function call_style(String $name) : int
  {
    $path = STYLE.$name.".css";
    if (file_exists($path))
    {
      self::$style[] = $path;
      return (1);
    }
    return (0);
  }

  public function call_javascript(String $name) : int
  {
    $path = JS.$name.".js";
    if (file_exists($path))
    {
      self::$javascript[] = $path;
      return (1);
    }
    return (0);
  }

  public function call_module(String $name, $require = 0, $class = undefined)
  {
    if (file_exists(MOD.$name.".php"))
    {
      require_once(MOD.$name.".php");
      if ($require && $class)
        return (new $class());
      else
        return (1);
    }
    return (null);
  }

  public function formulaire()
  {
    require_once(DEV."Formulaire.class.php");
    return (new Formulaire());
  }

  public function call_model($model_name)
  {
    $name = ucfirst($model_name);
    require_once(ROOT. "models/" . $name . ".class.php");
    return (new $name(DB_NAME));
  }

  public function get_picture(String $name, String $class) : String
  {
    $path = IMG.$name;
    if (file_exists($path.".png"))
      return ('<img src="' . $path .".png" . '" class="' . $class . '">');
    else if (file_exists($path.".jpg"))
      return ('<img src="' . $path .".jpg" . '" class="' . $class . '">');
    else if (file_exists($path.".gif"))
      return ('<img src="' . $path .".gif" . '" class="' . $class . '">');
    return ('<img src="' . IMG."404.gif" . '" class="img_not_found">');
  }
}

?>
