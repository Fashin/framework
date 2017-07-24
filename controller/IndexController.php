<?php

  class IndexController extends Controller
  {
      public function read()
      {
        $this->call_menu();
        $this->rend("index");
      }

      public function view()
      {
        if (!($this->call_style("index")))
          var_dump("Error from style calling");
        if (!($this->call_javascript("portfolio")))
          var_dump("Error from javascript calling");
        $this->call_menu();
        $this->set("portfolio", $this->call_module("portfolio.class", 1, "Portfolio")->get_portfolio());
        $this->rend("index");
      }
  }

?>
