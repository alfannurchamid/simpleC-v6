<?php

namespace App;

/**
 * SQLite connnection
 */
class SQLiteConnection
{
  /**
   * PDO instance
   * @var type
   */
  private $pdo;
  private $pdo1;
  private $pdo2;
  /**
   * return in instance of the PDO object that connects to the SQLite database
   * @return \PDO
   */
  public function connect()
  {
    if ($this->pdo == null) {
      try {
        $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
      } catch (\PDOException $e) {
        echo $e;
      }
    }
    return $this->pdo;
  }



  public function connect1()
  {
    if ($this->pdo1 == null) {
      try {
        $this->pdo1 = new \PDO("sqlite:" . Config1::PATH_TO_SQLITE_FILE);
      } catch (\PDOException $e) {
        echo $e;
      }
    }
    return $this->pdo1;
  }

  public function connect2()
  {
    if ($this->pdo2 == null) {
      try {
        $this->pdo2 = new \PDO("sqlite:" . Config2::PATH_TO_SQLITE_FILE);
      } catch (\PDOException $e) {
        echo $e;
      }
    }
    return $this->pdo2;
  }
}
