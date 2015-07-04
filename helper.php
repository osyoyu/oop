<?php

function is_associative_array($array)
{
  return (array_values($array) === $array);
}
