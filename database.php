<?php
 class Database{
     public  $host="localhost";

     public $user="root";

     public $password="";

     public  $database="simple_shop";

     public  $connection;


//     Phương thức khởi tạo
//
//    Database contructor

    public function __construct(){
    $this->connection = $this->connectDatabase()    ;
}


    /**
     * phuong thuc ket noi den csdl
     *
     */
  public function connectDatabase(){

        $connection = mysqli_connect($this->host, $this->user, $this->password,$this->database);
        return $connection;
    }


    /**
     * @param $sql
     * Phuong thuc chay cau truy van sql
     */
    public function runQuery($sql){
      $data=array();
        $result=mysqli_query($this->connection,$sql);
        while ($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
            return $data;
  }

    /**
     * @param $sql
     * Phuong thuc dem so bang ghi trong cau lenh query
     */
  public  function numRows($sql){
        $result=mysqli_query($this->connection,$sql);
        $count=mysqli_num_rows($result);
        return $count;
  }
}

?>