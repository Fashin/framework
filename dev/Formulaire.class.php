<?php

  class Formulaire extends Controller
  {

      private function insert_facultatif($json, $i) : String
      {
        $ret = (isset($json[$i]["class"])) ?  ' class="' . $json[$i]["class"] . '"' : null;
        $ret .= (isset($json[$i]["value"])) ? ' value="' . $json[$i]["value"] . '"' : null;
        return ($ret);
      }

      private function transform_to_html($json)
      {
        $ret = "<form method=" . $json['init']['method'] . " action=/framework/" . $json['init']['action'] . ">";
        for ($i = 0; $i < count($json) - 1; $i++)
          $ret .= "<input type=" . $json[$i]["type"] . " name=" . $json[$i]["name"] . $this->insert_facultatif($json, $i) . "/>";
        $ret .= "</form>";
        return ($ret);
      }

      public function get_form($name)
      {
        $json = @file_get_contents(FORM.$name.".json");
        if ($json === FALSE)
          throw new Exception("Cannot access " . $name . " json file");
        $json = json_decode($json, TRUE);
        return ($this->transform_to_html($json));
      }
  }


?>
