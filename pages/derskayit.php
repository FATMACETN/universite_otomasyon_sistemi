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
            $kod = $_POST['kod'];
            $kredi = $_POST['kredi'];
           $statu = $_POST['statu'][0];

          

             
          

            $sql= "INSERT INTO qp_derskayit(title, description, kod, kredi, statu) VALUES (?,?,?,?,?)";
            $args= [$title, $description, $kod, $kredi, $statu];
            $args = $adminclass->getSecurity($args);

            $query = $adminclass->pdoPrepare($sql,$args);
            if ($query){
                print '<div class="alert alert-success">İşlem Başarılı...</div>';
                header("refresh:2;url=derskayit");
            } else {print '<div class="alert alert-danger">İşlem Başarısız...</div>';}
 
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


              

                      <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                       <!-- <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu[]">
                          <option value="1">Aktif</option>
                          <option value="2">Pasif</option>
                        </select>
                      </div> -->
                    </div>               
                  </div>
                  <div class="form-group">
                    <label>Ders Adı</label>
                    <input type="text" class="form-control" name="title">
                  </div>
                  <div class="form-group">
                    <label>Ders Sınıf</label>
                    <input type="text" class="form-control" name="description">
                  </div>

                  <div class="form-group">
                    <label>Ders Kod</label>
                    <input type="text" class="form-control" name="kod">
                  </div>
                  <div class="form-group">
                    <label>Ders Kredi</label>
                    <input type="text" class="form-control" name="kredi">
                  </div>

                  

                       <!-- <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu[]">
                          <option value="1">1. Öğretim</option>
                          <option value="2">2. Öğretim</option>
                        </select>
                      </div> -->
                  <div class="form-group">
                        <label>Ders ADI</label>
                        <select class="form-control" name="statu[]">
                          <option value="1">Bilgisayar</option>
                          <option value="2">veri</option>
                          <option value="3">ders</option>
                        </select>
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
                <h3 class="card-title">Ders Listesi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
              if (isset($_POST['deleteData'])){
                  if ($_POST['deleteData']==1001){
                   $deleteData = $_POST['checkbox'];
                   $deleteData = implode("','", $deleteData);
                   $sql1001 = "SELECT * FROM qp_derskayit WHERE id IN ('$deleteData')";
                   $stmt= $adminclass->pdoQuery($sql1001);
                  


                   $sql = "DELETE FROM qp_derskayit WHERE id IN ('$deleteData')";
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
                    <th>Ders Adı</th>
                    <th>Ders Sınıf</th>
                    <th>Ders Kod</th>
                    <th>Ders Kredi</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
$sql = "SELECT * FROM qp_derskayit";
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
                    <td><?php print $value['kod']; ?></td>
                    <td><?php print $value['kredi']; ?></td>
                    <td> <?php print $value['statu']; ?></td>
                    <td>
                     <a href="./derskayit_edit?id=<?php print $value['id']; ?>">GÜNCELLE</a>
                  </tr>
 <?php } } ?> 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Seç</th>
                    <th>id</th>
                    <th>Ders Adı</th>
                    <th>Ders Sınıf</th>
                    <th>Ders Kod</th>
                    <th>Ders Kredi</th>
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
