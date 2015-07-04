<?php

class BaseModel {

  /**
   * Disallow instancing of BaseModel.
   */
  private function __construct()
  {
    throw RuntimeException("You should not create a instance of BaseModel.");
  }

  /**
   * Returns a Query for this class.
   *
   * return Query
   */
  static function query()
  {
    return new Query(get_called_class());
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

}
