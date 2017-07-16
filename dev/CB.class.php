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

    private function fill_var_dump($data, $ret) : String
    {
      if (empty($ret))
        $ret = '<table class="table_var_dump">';
      if (is_array($data))
      {
        $ret .= '<tr><td class="td_var_dump">' . gettype($data) . ' size = ' . count($data) . '</td></tr>';
        $ret .= '<tr>';
        foreach ($data as $k => $v)
        {
          if (is_array($v))
            $ret = self::fill_var_dump($v, $ret);
          else
            $ret .= '<td class="td_var_dump">' . $k . ' => ' . gettype($v) . ' <content>\'' . $v . '\'</content> (length=' . strlen($v) . ')</td>';
        }
          $ret .= '</tr>';
      }
      $ret .= "</table>";
      return ($ret);
    }

    public static function _var_dump($data)
    {
      return (self::fill_var_dump($data, ""));
    }
  }

?>
