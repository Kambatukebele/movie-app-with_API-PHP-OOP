<?php

  class Database 
  {
    public function db_connect()
    {
      $query = DB_CLIENT.":host=". DB_HOST .";dbname=" . DB_NAME;

      try {
        $conn = new PDO($query, DB_USER, DB_PASS); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "connected to successfully";
      }catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

      if(isset($conn)) {
        return $conn;
      }

      $conn = null; 
    }

    public function read (string $query, array $data = [])
    {
      $conn = $this->db_connect();
      $stmt = $conn->prepare($query);
      $stmt->execute($data);
      $result = $stmt->fetchAll(PDO::FETCH_OBJ);
      
      if(is_array($result) && count($result) > 0) {
        return $result;
      }

      return false; 
    }

    public function write (string $query, array $data = [])
    {
      $conn = $this->db_connect();
      $stmt = $conn->prepare($query);
      $result = $stmt->execute($data);

      if($result){
        return $result;
      }

      return false; 

    }
  }