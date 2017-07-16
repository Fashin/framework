<?php

  /**
   * Array to referend the database information
   * @author cbeauvoi
   * @var array
   */
   class Init
   {
     public $db_connect = array(
       'localhost' => array('host' => 'localhost', 'db_name' => 'framework', 'user' => 'root', 'psswd' => 'root')
     );

     public static function get_db_information($db_host) : array
     {
       return ($this->db_connect[$db_host]);
     }
   }

  /**
   * Require all dev file
   * @author cbeauvoi
   * @var [type]
   */
  require_once(DEV."CB.class.php");
  require_once(DEV."Routeur.class.php");
  require_once(DEV."Model.class.php");
  require_once(DEV."Controller.class.php");
  require_once(DEV."Dispatcher.class.php");

?>
