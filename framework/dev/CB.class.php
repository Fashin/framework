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
      while ($value = current($keys))
      {
        $key = key($keys);
        if (!(empty($key)))
          if (array_key_exists($key, $input) && !(empty($input[$key])))
          {
            preg_match("/".$value."/", $input[$key], $match);
            if (empty($match[0]))
              return (0);
          }
          else
            return (0);
        else
          if (!(array_key_exists($value, $input)) || empty($input[$value]))
            return (0);
        next($keys);
      }
      return (1);
    }
  }

?>
