<?php

function render($action, $layout, $vars)
{
  if (isset($layout))
  {
    include(dirname(__FILE__) . "/views/" . $layout . ".php");
  }
}
