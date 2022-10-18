<?php

namespace Core;
use PDO;

class DataBase
{
  private static $dbInstance;
  private static string $servername = "localhost";
  private static string $username = "root";
  private static string $password = "root";


  public static function connect(): void {
    try {
      $conn = new PDO("mysql:host=" . self::$servername . ";dbname=app", self::$username, self::$password);

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      self::$dbInstance = $conn;
      //echo "Connected successfully";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public static function getDB() {
    return self::$dbInstance;
  }
}