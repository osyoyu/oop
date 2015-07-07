<?php

abstract class BaseModel {

  /**
   * Returns a Query for this class.
   *
   * return Query
   */
  static function query()
  {
    return new SelectQuery(get_called_class());
  }

  /**
   * Alias for query()
   *
   * return Query
   */
  static function q()
  {
    return self::query();
  }

  /**
   * SQL INSERT
   *
   * return BaseModel
   */
  static function create($attrs)
  {
    global $db;

    if (!is_assoc($attrs)) { throw new InvalidArgumentException(); }

    $fields = [];
    $values = [];
    $placeholders = [];

    foreach ($attrs as $key => $value)
    {
      $fields[] = $key;
      $hashed_key = ":" . md5("insert-" . $key);
      $values[] = $hashed_key;
      $placeholders[$hashed_key] = $value;
    }

    $sql = "INSERT INTO " . get_called_class() . " (" . implode(", ", $fields) . ") VALUES (" . implode(", ", $values) . ");";

    $db->beginTransaction();
    $statement = $db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $statement->execute($placeholders);

    $result = self::query()->where(["id" => $db->lastInsertID()])->call();
    $db->commit();

    return $result;
  }


  function __construct($saved = true)
  {
    $this->saved = $saved;
  }

  /**
   * SQL UPDATE
   */
  function save()
  {
    global $db;

    $sql = "";
  }

}
