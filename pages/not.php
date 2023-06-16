<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Not İşlemleri</h1>
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
          $title= $_POST['title'];
            $description= $_POST['description'];
            $adddate = date('Y-m-d H:i:s');
            $user_id = 1;
            $statu = $_POST['statu'][0];
            $dersnf= $_POST['dersnf'];
            $derskod= $_POST['derskod'];
            $vize= $_POST['vize'];
            $final= $_POST['final'];
            $but= $_POST['but'];
            $ort= ($vize * 0.4) + ($final * 0.6)+ ($but*0.6); 
            $ogr_ad= $_POST['ogr_ad'];

             
      

            $sql= "INSERT INTO qp_not(title, description, adddate, user_id, statu,dersnf,derskod,vize,final,but,ort,ogr_ad) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $args= [$title, $description, $adddate, $user_id, $statu,$dersnf,$derskod,$vize,$final,$but,$ort,$ogr_ad];
            $args = $adminclass->getSecurity($args);
            $query = $adminclass->pdoPrepare($sql,$args);
            if ($query){
                print '<div class="alert alert-success">İşlem Başarılı...</div>';
         
            } else {print '<div class="alert alert-danger">İşlem Başarısız...</div>';}
 
      }
      }
  ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Not Ekle</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                         <div class="card-body">
                         <div class="form-group">
                        <label>Ders Ad </label>
                        <select class="form-control" name="title">
                          <option value="veritabanı">Veritabanı</option>
                          <option value="internet teknolojileri">İnternet teknolojileri</option>
                          <option value="görsel programlama">Görsel programlama</option>
                          <option value="bilgisayar ağları">Bilgisayar ağları</option>
                          <option value="yazılım mühendisliği">Yazılım mühendisliği</option>
                          <option value="algoritma analizi">Algoritma analizi</option>
                        </select>
                      </div>


                <div class="form-group">
                  <input class="form-control" placeholder="Öğrenci:">
                  <select class="form-control" name="ogr_ad">
                    <option value="Mehmet Özkan">Fatma Çetin</option>
                    <option value="Ayşe Deniz">Ayşe Deniz</option>   
                    <option value="Zehra Betül Demir">Zehra Betül Demir</option>  
                    <option value="Ali Gürbüz">Ali Gürbüz</option>    
                    <option value="Emre Yalçın">Emre Yalçın</option>        
                 </select>
                </div>
            
              
                <div class="form-group">
                        <label> Ders Sınıf </label>
                        <select class="form-control" name="dersnf">
                        <option value=""></option>
                          <option value="1.Sınıf">1.Sınıf</option>
                          <option value="2.Sınıf">2.Sınıf</option>
                          <option value="3.Sınıf">3.Sınıf</option>
                          <option value="4.Sınıf">4.Sınıf</option>
                       
                        </select>
                      </div>
                  <div class="form-group">
                        <label> Ders Kod </label>
                        <select class="form-control" name="derskod">
                        <option value=""></option>
                          <option value="123">123</option>
                          <option value="234">234</option>
                          <option value="345">345</option>
                          <option value="456">456</option>
                       
                        </select>
                      </div>
                  <div class="form-group">
                        <label>Ders Kredi </label>
                        <select class="form-control" name="description">
                        <option value=""></option>n
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="3.5">3.5</option>
                          <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label >Vize Not</label>
                   <textarea class="form-control" rows="3" name="vize"></textarea>
                  </div>
                    <div class="form-group">
                    <label >Final Not</label>
                   <textarea class="form-control" rows="3" name="final"></textarea>
                  </div>
                   <div class="form-group">
                    <label >Büt Not</label>
                   <textarea class="form-control" rows="3" name="but"></textarea>
                  </div>
                 

                       <div class="form-group">
                        <label>Öğrenim Türü</label>
                        <select class="form-control" name="statu[]">
                          <option value="1">1. Öğretim</option>
                          <option value="2">2. Öğretim</option>
                        </select>
                      </div>
                  <div class="form-group">
                   
                  </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" name="save" value="1001">
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Kaydet</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
         
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Not Listesi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
              if (isset($_POST['deleteData'])){
                  if ($_POST['deleteData']==1001){
                   $deleteData = $_POST['checkbox'];
                   $deleteData = implode("','", $deleteData);
                   $sql1001 = "SELECT * FROM qp_not WHERE id IN ('$deleteData')";
                   $stmt= $adminclass->pdoQuery($sql1001);
               
                   }


                   $sql = "DELETE FROM qp_not WHERE id IN ('$deleteData')";
                   $query = $adminclass->pdoPrepare($sql);
                   if ($query){
                       if ($query){
                           print '<div class="alert alert-success">Silme işlemi başarılı...</div>';
                       } else {  print '<div class="alert alert-danger">Silme işlemi başarısız...</div>'; }
                   }
                  }

               ?>
              <form method="post">
              <button type="submit" class="btn btn-danger" onlick="return confirm('Silmek istiyot musunuz ?');"> SİL</button>
              <input type="hidden" name="deleteData" value="1001" >
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Seç</th>
                    <th>id</th>
                    <th>Ders Ad</th>
                    <th>Öğrenci Ad Soyad</th>
                    <th>Ders Sınıf</th>
                    <th>Ders Kod</th>
                    <th>Ders Kredi</th>
                    <th>Vize Not</th>
                    <th>Final Not</th>
                    <th>Büt Not</th>
                    <th>Ortalama </th>
                    <th>Öğrenim Türü</th>
                    <th>İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
$sql = "SELECT * FROM qp_not";
$query = $adminclass->pdoQuery($sql); 
if ($query){
    foreach ($query as $value) {

?>
                  <tr>
                   <td style="width: 5px;">
                      <input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php print $value['id']; ?>">
                    </td>
                    <td><?php print $value['id']; ?></td>
                    <td><?php print $value['title']; ?></td>
                    <td><?php print $value['ogr_ad']; ?></td>
                    <td><?php print $value['dersnf']; ?></td>
                    <td><?php print $value['derskod']; ?></td>
                    <td><?php print $value['description']; ?></td>
                    <td><?php print $value['vize']; ?></td>
                    <td><?php print $value['final']; ?></td>
                    <td><?php print $value['but']; ?></td>
                    <td><?php print $value['ort']; ?></td>
                    <td> <?php print $value['statu']; ?></td>
                    <td>
                     <a href="./not_edit?id=<?php print $value['id']; ?>">GÜNCELLE</a>
                  </tr>
 <?php } } ?> 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Seç</th>
                    <th>id</th>
                    <th>Ders Ad</th>
                    <th>Öğrenci Ad Soyad</th>
                    <th>Ders Sınıf</th>
                    <th>Ders Kod</th>
                    <th>Ders Kredi</th>
                    <th>Vize Not</th>
                    <th>Final Not</th>
                    <th>Büt Not</th>
                    <th>Ortalama</th>
                    <th>Öğrenim Türü</th>
                    <th>İşlem</th>
                  </tr>
                  </tfoot>
                </table>
                </form>
              </div>
              <!-- /.card-body -->
            </div>

           </div>

          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
