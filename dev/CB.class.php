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
    public static function _assert(array $input, array $keys): bool
    {
      $need_confirmation = array_keys($input);
      $ret = FALSE;

      for ($i = 0; $i < count($need_confirmation); $i++)
      {
        $ret = FALSE;
        for ($j = 0; $j < count($keys); $j++)
          if ($keys[$j] == $need_confirmation[$i] && !(empty($input[$need_confirmation[$i]])))
            $ret = TRUE;
        if (!($ret))
          return ($ret);
      }
      return (TRUE);
    }
  }

?>
