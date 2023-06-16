<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ders Güncelle</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-sm-12">
            <!-- general form elements -->
 <?php
         
  if (isset($_POST['save'])){
      if($_POST['save']==1001) {
          $id= $_POST['id'];
          $title= $_POST['title'];
            $dersnf= $_POST['dersnf'];
            $derskod= $_POST['derskod'];
            $vize= $_POST['vize'];
            $final= $_POST['final'];
            $but= $_POST['but'];
            $ort= ($vize * 0.4) + ($final * 0.6)+ ($but*0.6); 
            $ogr_ad= $_POST['ogr_ad'];
            $description= $_POST['description'];
            $adddate = date('Y-m-d H:i:s');
            $user_id = 1;
            $statu = $_POST['statu'][0];
    
      
             
            $sql= " UPDATE qp_not SET title =?, description=?, adddate=?, user_id=?, statu=?,dersnf=?,derskod=?, vize=?,final=?,but=?,ort=?,ogr_ad=?, WHERE id=?";
            $args= [$title ,$description, $adddate, $user_id,$statu,$dersnf,$derskod,$vize,$final,$but,$ort,$ogr_ad, $id];
            $args = $adminclass->getSecurity($args);
            $query = $adminclass->pdoPrepare($sql,$args);
            if ($query){
                print '<div class="alert alert-success">İşlem Başarılı...</div>';
                header("location:./not");
            } else {print '<div class="alert alert-danger">İşlem Başarısız...</div>';}
 
      } 
}


  if (isset($_GET['id'])){
     $id = $adminclass->getSecurity($_GET['id']);
  
  
  ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Not Güncelleme</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php print $id; ?>">
              <?php
              $sql = "SELECT * FROM qp_not WHERE id = {$id}";
              $query = $adminclass->pdoQuery($sql);
              if ($query){
                  ?>
               <div class="card-body">
                 <div class="form-group">
                        <label>Ders Ad</label>
                        <select class="form-control" name="title" >
                          <option value="1">Veritabanı</option>
                          <option value="2">İnternet teknolojileri</option>
                          <option value="3">Görsel programlama</option>
                          <option value="4">Bilgisayar ağları</option>
                          <option value="5">Yazılım mühendisliği</option>
                          <option value="6">Algoritma analizi</option>
                        </select>
                      </div>
                    
                  <div class="form-group">
                    <label >Öğrenci Ad Soyad</label>
                   <textarea class="form-control" rows="3" name="ogr_ad"><?php echo $query[0]['ogr_ad']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label >Ders Sınıf</label>
                   <textarea class="form-control" rows="3" name="dersnf"><?php echo $query[0]['dersnf']; ?></textarea>
                  </div>
                      <div class="form-group">
                    <label >Ders Kod</label>
                   <textarea class="form-control" rows="3" name="derskod"><?php echo $query[0]['derskod']; ?></textarea>
                  </div>
                      <div class="form-group">
                    <label >Ders Kredi</label>
                   <textarea class="form-control" rows="3" name="description"><?php echo $query[0]['description']; ?></textarea>
                  </div>
                    
                  <div class="form-group">
                    <label >Vize Not</label>
                   <textarea class="form-control" rows="3" name="vize"><?php echo $query[0]['vize']; ?></textarea>
                  </div>
                   
                  <div class="form-group">
                    <label >Final Not</label>
                   <textarea class="form-control" rows="3" name="final"><?php echo $query[0]['final']; ?></textarea>
                  </div>
                    
                  <div class="form-group">
                    <label >Büt Not</label>
                   <textarea class="form-control" rows="3" name="but"><?php echo $query[0]['but']; ?></textarea>
                  </div>
                
                       <div class="form-group">
                        <label>Öğrenim türü</label>
                        <select class="form-control" name="statu[]">
                          <option value="1">1. Öğretim</option>
                          <option value="2">2.Öğretim</option>
                        </select>
                      </div>
                  <div class="form-group">
                  </div>
                </div>
                <?php } } ?>
                <!-- /.card-body -->
                <input type="hidden" name="save" value="1001">
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Güncelle</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
         

           </div>

          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
