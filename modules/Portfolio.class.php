<?php

class Portfolio {

  public function get_portfolio() : String
  {
    $file = file_get_contents(MOD."portfolio/img.json");
    $img = json_decode($file, TRUE);
    $ret = "";
    foreach ($img as $k => $v)
    {
      $ret .= '<span class="volet">';
      $ret .= '<a href="' . Routeur::redirect('index/read/' . $k) . '">';
      $ret .= '<img src="' . IMG . "portfolio/" . $v['img'] . '"/>';
      $ret .= '<span class="subvolet">' . $v['title'] . '</span>';
      $ret .= '</a>';
      $ret .= '</span>';
    }
    return ($ret);
  }

}

?>
