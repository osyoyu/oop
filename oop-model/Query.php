<?php

class QueryObject
{

  function __construct($table)
  {
    $sql = "";
    $clauses = [];
    $placeholders = [];
  }

  function find($attrs)
  {
    if (!is_associative_array($attrs)) { throw new InvalidArgumentException(); }
  }

  function where($args)
  {
    if (!is_associative_array($attrs)) { throw new InvalidArgumentException(); }

    foreach ($args as $key => $value)
    {

    }
  }

  function call()
  {
    # 実際に RDB にリクエストを飛ばす
  }
}
