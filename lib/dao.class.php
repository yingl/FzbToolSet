<?php
class Dao {
  protected $dbh;
  protected $smt;

  public function __construct($options) {
    $dsn = isset($options['dsn']) ? $options['dsn'] : '';
    $username = isset($options['username']) ? $options['username'] : '';
    $password = isset($options['password']) ? $options['password'] : '';
    $options = isset($options['options']) ? $options['options'] : '';
    try {
      $this->dbh = new PDO($dsn, $username, $password, $options);
      $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function base_execute($query, $paras) {
    $this->stmt = $this->dbh->prepare($query);
    $this->stmt->execute($paras);
    return $this->stmt->fetchAll();
  }
}
?>
