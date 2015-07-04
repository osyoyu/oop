<?php

class Query
{
  function __construct($table)
  {
    $this->table = $table;
    $this->clauses = [];
    $this->placeholders = [];
  }

  function find($attrs)
  {
    if (!is_assoc($attrs)) { throw new InvalidArgumentException(); }
  }

  function where($attrs)
  {
    if (!is_assoc($attrs)) { throw new InvalidArgumentException(); }

    $wheres = [];

    foreach ($attrs as $key => $value)
    {
      $hashed_key = md5("where-" . $key);
      $wheres[]   = $key . " = " . ":" . $hashed_key;
      $this->placeholders[$hashed_key] = $value;
    }

    $this->clauses["where"] = "WHERE " . implode(" AND ", $wheres);

    return $this;
  }

  /**
   * SQLを組み立てほげふが
   */
  function call()
  {
    $sql = "SELECT * FROM " . $this->table . " " . implode(" ", $this->clauses) . ";";
    var_dump($sql);
    var_dump($this->placeholders);
  }
}
