<?php
session_start();
class Database {
    public $con;  
      public function __construct()  
      {  
           $this->con = mysqli_connect("localhost", "root", "vertrigo", "airline");  
           if(!$this->con)  
           {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
           }  
      }
    public function selectdairport($table_name)  
      {  
           $array = array();  
           $query = "SELECT dairport FROM ".$table_name."";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }
      public function selectaairport($table_name)  
      {  
           $array = array();  
           $query = "SELECT aairport FROM ".$table_name."";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }
      public function selectairport1($table_name)  
      {  
           $array = array();  
           $query = "SELECT airport1 FROM ".$table_name."";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }
      public function selectairport2($table_name)  
      {  
           $array = array();  
           $query = "SELECT airport2 FROM ".$table_name."";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }
      public function selectroundflights($table_name)  
      {  
           $array = array();  
           $query = "SELECT fnumber FROM ".$table_name."";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }
      public function selectonewayflights($table_name)  
      {  
           $array = array();  
           $query = "SELECT fnumber FROM ".$table_name."";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }
}
