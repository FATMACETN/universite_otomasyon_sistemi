<?php
  class AdminUsersClass {
    protected  $pdo = null;
    protected  $host = 'localhost';
    protected  $dbname = 'admin2';
    protected  $username = 'root';
    protected  $password = '';
    protected  $charset = 'utf8';
 

public function __construct(){
    try {
        
            $this->pdo= new pdo("mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset", $this->username, $this->password);
            // print 'baglantı sağlandı...';
    
        }catch (PDOException $error) {
            die($error->getMessage());
    }    
    if (!isset($_SESSION['mail']) && isset($_SESSION['login'])) {
     header('location: ./index.php');
    }   
 }

 public function getUser($mail) {
    $query = $this->pdo->prepare('SELECT * FROM qp_users2 WHERE mail=?');
    $query->execute([$mail]);
    $veriable = $query->fetch(PDO::FETCH_ASSOC);
    if ($veriable) { return $veriable; } else { return false; }
 }

    


    public function getSecurity($data){
      if(is_array($data)){
        $veriable = array_map('htmlspecialchars', $data);
        $response = array_map('stripslashes' , $veriable);
        return $response;
      }else{
        $veriable = htmlspecialchars($data);
        $response =stripslashes($veriable);
        return $response;
      }
    }


  } 

?>