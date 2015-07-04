<?php

class Config {
  private static $config = [];

  static function read($key)
  {
    return self::$config[$key];
  }

  static function write($key, $value)
  {
    self::$config[$key] = $value;
  }
}

Config::write("app_path", realpath(dirname(__FILE__) . "/../../"));
