<?php
  class AdminClass {
    protected  $pdo = null;
    protected  $host = 'localhost';
    protected  $dbname = 'admin2';
    protected  $username = 'root';
    protected  $password = '';
    protected  $charset = 'utf8';
 

    public function __construct(){
    try {
        
            $this->pdo= new pdo("mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset", $this->username, $this->password);
     
    
        }catch (PDOException $error) {
            die($error->getMessage());
    }    
    if (!isset($_SESSION['mail']) && isset($_SESSION['login'])) {
     header('location: ./login.php');
    }   
 }

    public function getStatu($data) {
      switch ($data) {
        case '1':
          return "Aktif";
          break;
        case '2':
          return "Pasif";
          break;
          case '3':
            return "veri";
            break;
            case '4':
              return "gorsel";
              break;
        default:
          return 'Belirsiz';
          break;
      }
    }
    public function getSttatu($data) {
      switch ($data) {
        case '1':
          return "Algoritma Analizi";
          break;
        case '2':
          return "VeriTabanı";
          break;
          case '3':
            return "Görsel Programlama";
            break;
            case '4':
              return "İş Sağlığı";
              break;
        default:
          return 'Belirsiz';
          break;
      }
    }
    public function pdoQuery($sql) {
      $query = $this->pdo->query($sql,PDO::FETCH_ASSOC)->fetchAll();
      if ($query) {return $query; } else {return false;}
    }

    public function pdoPrepare($sql,$args=[]) {
      $statment = $this->pdo->prepare($sql);
      $response = $statment->execute($args);
      if($response) {
        return $response;
      } else { return false; }
    }

    public function pdoInsert($sql,$args){
      $statment = $this->pdo->prepare($sql);
      $response = $statment->execute($args);
      if($response){
        return '<div class = "alert alert success"> İşlem Başarılı </div>';
      }else{return '<div class = "alert alert danger"> İşlem Başarısız</div>';}
    }
    public function pdoDelete($sql,$args){
      $statment = $this->pdo->prepare($sql);
      $response = $statment->execute($args);
      if($response) {
        return '<div class = "alert alert success"> Silme işlemi başarılı </div>';
      } else {return '<div class = "alert alert danger"> Silme işlem başarısız</div>';}
    }

    public function getAbout(){
      $sql = $this->pdo->query("SELECT * FROM qp_about2 ORDER BY id ASC", PDO::FETCH_ASSOC)->fetchAll();
      if($sql){
        return $sql;
      }else {return false;}
    }


    public function getDuyuru(){
      $sql = $this->pdo->query("SELECT * FROM qp_duyuru ORDER BY id ASC", PDO::FETCH_ASSOC)->fetchAll();
      if($sql){
        return $sql;
      }else {return false;}
    }
    public function getDers(){
      $sql = $this->pdo->query("SELECT * FROM qp_ders ORDER BY id ASC", PDO::FETCH_ASSOC)->fetchAll();
      if($sql){
        return $sql;
      }else {return false;}
    }

    public function getFakulte(){
      $sql = $this->pdo->query("SELECT * FROM qp_fakulte ORDER BY id ASC", PDO::FETCH_ASSOC)->fetchAll();
      if($sql){
        return $sql;
      }else {return false;}
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