<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ders İşlem</h1>
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
            $image='image/'.$_FILES['image']['name'];
            $adddate = date('Y-m-d H:i:s');
            $user_id = 1;
            $statu = $_POST['statu'][0];
            $image_tmp = $_FILES['image']['tmp_name'];

            if(file_exists($image)){
                print '<div class="alert alert-danger">Aynı isimde dosya mevcut...</div>';
            } else{

             
            move_uploaded_file($image_tmp, $image);

            $sql= "INSERT INTO qp_references(title, description, image, adddate, user_id, statu) VALUES (?,?,?,?,?,?)";
            $args= [$title, $description, $image, $adddate, $user_id, $statu];
            $args = $adminclass->getSecurity($args);

            $query = $adminclass->pdoPrepare($sql,$args);
            if ($query){
                print '<div class="alert alert-success">İşlem Başarılı...</div>';
                header("refresh:2;url=referanslar");
            } else {print '<div class="alert alert-danger">İşlem Başarısız...</div>';}
 
      }
      }
  } ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Ders Ekle</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Ders Adı</label>
                    <input type="text" class="form-control" name="title">
                  </div>
                  <div class="form-group">
                    <label >Ders Sınıf</label>
                   <textarea class="form-control" rows="3" name="description"></textarea>
                  </div>
                       <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu[]">
                          <option value="1">1. Öğretim</option>
                          <option value="2">2. Öğretim</option>
                        </select>
                      </div>
                  <div class="form-group">
                    <label>Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                      <input type="file" name="image">
                      </div>
                    </div>
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
                <h3 class="card-title">Referans Listesi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
              if (isset($_POST['deleteData'])){
                  if ($_POST['deleteData']==1001){
                   $deleteData = $_POST['checkbox'];
                   $deleteData = implode("','", $deleteData);
                   $sql1001 = "SELECT * FROM qp_references WHERE id IN ('$deleteData')";
                   $stmt= $adminclass->pdoQuery($sql1001);
                   if($stmt){
                       foreach ($stmt as $value){
                           $unlink = unlink($value['image']);
                       }
                   }


                   $sql = "DELETE FROM qp_references WHERE id IN ('$deleteData')";
                   $query = $adminclass->pdoPrepare($sql);
                   if ($query){
                       if ($query){
                           print '<div class="alert alert-success">Silme işlemi başarılı...</div>';
                       } else {  print '<div class="alert alert-danger">Silme işlemi başarısız...</div>'; }
                   }
                  }

              } ?>
              <form method="post">
              <button type="submit" class="btn btn-danger" onlick="return confirm('Silmek istiyor musunuz ?');"> SİL</button>
              <input type="hidden" name="deleteData" value="1001" >
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Seç</th>
                    <th>id</th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>Resim</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
$sql = "SELECT * FROM qp_references";
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
                    <td><?php print $value['description']; ?></td>
                     <td><img src="<?php print $value['image'];?>" style="width: 100px;"></td>
                    <td> <?php print $value['statu']; ?></td>
                    <td>
                     <a href="./referanslar_edit?id=<?php print $value['id']; ?>">GÜNCELLE</a>
                  </tr>
 <?php } } ?> 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Seç</th>
                    <th>id</th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>Resim</th>
                    <th>Durum</th>
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
