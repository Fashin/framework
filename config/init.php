<?php

  /**
   * Array to referend the database information
   * @author cbeauvoi
   * @var array
   */
   class Init
   {
     public function __construct()
     {
       $this->DB_CONNECT = array(
         'localhost' => array('host' => 'localhost', 'db_name' => 'framework', 'user' => 'root', 'psswd' => 'Beauvois41')
       );
     }

     public static function get_db_information($db_host) : array
     {
       return ($this->DB_CONNECT[$db_host]);
     }
   }

  /**
   * Require all dev file
   * @author cbeauvoi
   * @var [type]
   */
  $init = new Init();
  require_once(DEV."CB.class.php");
  require_once(DEV."Routeur.class.php");
  require_once(DEV."Model.class.php");
  require_once(DEV."Controller.class.php");
  require_once(DEV."Dispatcher.class.php");

?>
