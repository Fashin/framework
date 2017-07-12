<?php

class Model
{
  public function __construct($db_name)
  {
    print_r(Init::get_db_information($db_name));
  }
}

?>
