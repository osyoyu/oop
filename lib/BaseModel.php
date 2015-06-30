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
    $db->beginTransaction();
    $s->execute();
    $id = $db->lastInsertId();
    $db->commit();

    return array("id" => $id);
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

  public static function find_or_create($attrs)
  {
    global $db;

    $values = array();
    $where  = array();
    foreach ($attrs as $k => $v)
    {
      $where[]  = $k . " == ?";
      $values[] = $v;
    }
    $s = $db->prepare("select * from " . static::$table . " where " . implode(" and ", $where) . ";");
    $s->execute($values);

    $result = array();
    while ($row = $s->fetch())
    {
      $result[] = $row;
    }

    if (!empty($result))
    {
      return $result[0];
    }
    else
    {
      return self::create($attrs);
    }
  }
}
