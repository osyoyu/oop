<?php

class BaseModel {
  static $table = "";

  public static function create($attrs)
  {
    global $db;

    $keys   = array();
    $values = array();
    foreach ($attrs as $k => $v)
    {
      $keys[]   = $k;
      $values[] = "'" . $v . "'";
    }
    $s = $db->prepare("insert into " . static::$table . " (" . implode(", ", $keys) . ") values (" . implode(", ", $values) . ")");
    $s->execute();
  }

  public static function all()
  {
    global $db;

    $s = $db->prepare("select * from " . static::$table);
    $s->execute();

    $result = array();
    while ($row = $s->fetch())
    {
      $result[] = $row;
    }

    return $result;
  }
}
