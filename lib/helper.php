<?php

function is_assoc($array)
{
  return is_array($array) && !(array_values($array) === $array);
}
