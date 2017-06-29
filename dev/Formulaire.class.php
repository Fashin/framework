<?php

  class Formulaire extends Controller
  {

      public function __construct($action)
      {
          $this->form = '<form method="POST" action="' . $action . '">';
          $this->end_form = '</form>';
      }

      public function login(array $params, array $type, string $submit) : String
      {
        $ret = (String)"";
        $i = -1;
        foreach ($params as $key => $value)
          $ret .= $key . '<input type="' . $type[++$i] . '" name="' . $value . '">';
        $ret .= '<input type="submit" value="' . $submit . '">';
        return (implode("", array($this->form, $ret, $this->end_form)));
      }

  }


?>
