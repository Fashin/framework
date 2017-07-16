<?php

  class Insert extends Model
  {
    public function __construct($db_name) { parent::__construct($db_name);}

    public function db_insert(String $table, Array $fields, Array $data) : int
    {
      if (count($fields) != count($data))
        return (0);
      (String)$prep = "INSERT INTO " . $table . " (";
      (String)$prep2 = "(";
      (Array)$value = Array();
      foreach($fields as $v)
      {
        $prep .= $v . ", ";
        $prep2 .= ":" . $v . ", ";
      }
      $prep = substr($prep, 0, -2) . ") VALUES " . substr($prep2, 0, -2) . ")";
      for ($i = 0; $i < count($fields); $i++)
          $value[$fields[$i]] = $data[$i];
      $req = $this->bdd->prepare($prep);
      return ($req->execute($value));
    }
  }

?>
