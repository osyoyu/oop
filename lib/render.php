<?php

function render($action, $vars, $layout)
{
  if (isset($layout))
  {
    include(APP_PATH . "/app/views/" . $layout . ".php");
  }
}
