<?php

  class CB
  {
    /**
     * Testing the array $input and check all the $keys array if the $keys exists and are non empty on $input.
     * You can put regex on $keys=>value
     * @param  array $input Basic array input like $_POST
     * @param  array $keys  Keys need exists and non empty on $input
     * @return int          Return 0 if a key don't exist or is empty or regex error
     * @author cbeauvoi
     */
    public static function _assert(array $input, array $keys): int
    {
      $i = 0;
      $ret = 1;
        print_r($keys);
      foreach ($input as $key => $value)
      {
        print_r($key);
        if (isset($keys[$i]) && $key != $keys[$i])
          $ret = 0;
        else if (array_key_exists($key, $keys))
          print_r("need check regex");
        $i++;
      }
      return ($ret);
    }
  }

?>
