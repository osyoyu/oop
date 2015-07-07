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


  function __construct()
  {
  }

}
