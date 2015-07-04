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
  function query()
  {
    return new Query(get_class(self));
  }

  /**
   * Alias for query()
   *
   * return Query
   */
  function q()
  {
    return query();
  }

}
