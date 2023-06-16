<?php
  class AdminClass {
    protected  $pdo = null;
    protected  $host = 'localhost';
    protected  $dbname = 'admin';
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

    public function getStaatu($data) {
      switch ($data) {
        case '1':
          return "Aktif";
          break;
        case '2':
          return "Pasif";
          break;
          default:
          return 'Belirsiz';
          break;

      }
    }

    public function getTitle($data) {
      switch ($data) {
        case '1':
          return "Veritabanı";
          break;
        case '2':
          return "İnternet Teknolojileri";
          break;
        case '3':
          return "Görsel programlama";
          break;
        case '4':
          return "Bilgisayar Ağları";
          break;
        case '5':
          return "Yazılım Mühendisliği";
          break;
        case '6':
          return "Algoritma Analizi";
          break;
        default:
          return 'Belirsiz';
          break;
      }
    }

    
    public function getOgr_ad($data) {
      switch ($data) {
        case '1':
          return "FATMA ÇETİN";
          break;
        case '2':
          return "FATMA ÇETİN";
          break;
        case '3':
          return "FATMA ÇETİN";
          break;
        case '4':
          return "FATMA ÇETİN";
          break;
        case '5':
          return "Yazılım Mühendisliği";
          break;
        case '6':
          return "Algoritma Analizi";
          break;
        default:
          return 'Belirsiz';
          break;
      }
    }

    
    public function getDescription($data) {
      switch ($data) {
        case '1':
          return "1.Sınıf";
          break;
        case '2':
          return "2.Sınıf";
          break;
          case '3':
            return "3.Sınıf";
            break;
            case '4':
              return "4.Sınıf";
              break;
              case '5':
                return "5.Sınıf";
                break;
                case '6':
                  return "6.Sınıf";
                  break;
        default:
          return 'Belirsiz';
          break;
      }
    }

    public function getKod($data) {
      switch ($data) {
        case '1':
          return "123";
          break;
        case '2':
          return "234";
          break;
          case '3':
            return "345";
            break;
            case '4':
              return "456";
              break;
        default:
          return 'Belirsiz';
          break;
      }
    }
    
    public function getKredi($data) {
      switch ($data) {
        case '1':
          return "1";
          break;
        case '2':
          return "2";
          break;
          case '3':
            return "3";
            break;
            case '4':
              return "3.5";
              break;
              case '5':
                return "4";
                break;
        default:
          return 'Belirsiz';
          break;
      }
    }
    public function getDersnf($data) {
      switch ($data) {
        case '1.Sınıf':
          return "1.Sınıf";
          break;
        case '2.Sınıf':
          return "2.Sınıf";
          break;
          case '3Sınıf':
            return "3.Sınıf";
            break;
            case '4Sınıf':
              return "4.Sınıf";
        default:
          return 'Belirsiz';
          break;
      }
    }

    public function getDerskod($data) {
      switch ($data) {
        case '1':
          return "123";
          break;
        case '2':
          return "234";
          break;
          case '3':
            return "345";
            break;
            case '4':
              return "456";
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
      $sql = $this->pdo->query("SELECT * FROM qp_about ORDER BY id ASC", PDO::FETCH_ASSOC)->fetchAll();
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
    public function getNotbak(){
      $sql = $this->pdo->query("SELECT * FROM qp_notbak ORDER BY id ASC", PDO::FETCH_ASSOC)->fetchAll();
      if($sql){
        return $sql;
      }else {return false;}
    }
    

    public function getNotbakk(){
      $sql = $this->pdo->query("SELECT * FROM qp_notbakk ORDER BY id ASC", PDO::FETCH_ASSOC)->fetchAll();
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