<?php

try
{
  $db = new PDO("sqlite:" . Config::read("app_path") . "/db.sqlite3");
}
catch (PDOException $e)
{
  die("Failed to open SQLite database: " . $e->getMessage());
}
