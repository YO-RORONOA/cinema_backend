<?php
class database{
    private $host = "localhost";
    private $db_name = "cinema";
    private $password = "";
    private $conn;

    public function connect()
    {
        $this -> conn = null;

        $this-> conn = new mysqli($this-> host, $this->db_name, $this->password, $this->db_name);
        if($this-> conn->connect_error)
        {
            die('Connection Error: ' . $this->conn->connect_error);

        }
        return $this->conn;
    }

}