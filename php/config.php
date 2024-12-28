<?php
class database{
    private $host = "localhost";
    private $user_name = "root";
    private $password = "";
    private $db_name = "cinema";
    private $conn;
    public function connect()
    {
        $this -> conn = null;

        $this-> conn = new mysqli($this-> host, $this->user_name, $this->password, $this->db_name);
        if($this-> conn->connect_error)
        {
            die('Connection Error: ' . $this->conn->connect_error);

        }
        return $this->conn;
    }


    

}


