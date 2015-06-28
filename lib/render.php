<?php

function render($action, $layout = "", $vars = array())
{
  if (empty($layout))
  {
    include(APP_PATH . "/app/views/" . $action. ".php");
  }
  else
  {
    include(APP_PATH . "/app/views/" . $layout . ".php");
  }
}
