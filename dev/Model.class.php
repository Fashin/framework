<?php
/***/
abstract class Model extends Init
{
  private function create_table($table_info)
  {
    $req = $this->bdd->exec($table_info);
    if ($req)
      file_put_contents(LOG."db.log", date("Y-m-d [G:i:s]") . " : state error : " . $this->bdd->errorInfo() . "\n", FILE_APPEND);
    else
      file_put_contents(LOG."db.log", date("Y-m-d [G:i:s]") . " : success to create it\n", FILE_APPEND);
  }

  private function check_up_json() : int
  {
    $db = $this->bdd;
    (Array)$saved_json = file_get_contents(DB."/saved_json.json");
    (Array)$json = json_decode($saved_json, true);
    foreach ($json as $k => $v)
    {
      (String)$req = "SELECT ";
      (String)$table_info = 'CREATE TABLE ';
      $table_info .= '' . $k . ' (';
      foreach ($v as $key => $value)
      {
        $req .= $key . ",";
        $table_info .= '' . $key . ' ' . $value . ', ';
      }
      $table_info = substr($table_info, 0, -2);
      $table_info .= ')';
      $req = substr($req, 0, -1);
      $req .= " FROM " . $k;
      if ($db->query($req) === FALSE)
      {
        file_put_contents(LOG."db.log", date("Y-m-d [G:i:s]") . " : table " . $k . " don't exists, create it\n", FILE_APPEND);
        $this->create_table($table_info);
      }
    }
    file_put_contents(LOG."db.log", date("Y-m-d [G:i:s]") . " : all tables are synchronized\n", FILE_APPEND);
    return (1);
  }

  function __construct($db_name)
  {
    $p_co = $this->db_connect[$db_name];
    try {
      $this->bdd = new PDO('mysql:host='. $p_co['host'] .'; dbname='.$p_co['db_name'], $p_co['user'], $p_co['psswd']);
    }
    catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $this->check_up_json();
  }


}

?>
