<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mesaj İşlemleri</h1>
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
            $adddate = date('Y-m-d H:i:s');
            $user_id = 1;
            $dersnf= $_POST['dersnf'];
            $derskod= $_POST['derskod'];

             
      

            $sql= "INSERT INTO qp_references(title, adddate, user_id,dersnf,derskod) VALUES (?,?,?,?,?)";
            $args= [$title, $adddate, $user_id,$dersnf,$derskod];
            $args = $adminclass->getSecurity($args);
            $query = $adminclass->pdoPrepare($sql,$args);
            if ($query){
                print '<div class="alert alert-success">Mesaj Gönderildi...</div>';
                
            } else {print '<div class="alert alert-danger">İşlem Başarısız...</div>';}
 
      }
      }
  ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Mesaj Gönder</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                         <div class="card-body">
                         <div class="form-group">
                        <label>Kişi Seç </label>
                        <select class="form-control" name="title">
                          <option value=""></option>
                          <option value="FATMA ÇETİN">FATMA ÇETİN : 2020123068@cumhuriyet.edu.tr</option>
                          <option value="MERVE YAĞMURCU ">MERVE YAĞMURCU : 2020123021@cumhuriyet.edu.tr </option>
                          <option value="MERVE YAĞMURCU ">ZEHRA BETÜL DEMİR : 2022123023@cumhuriyet.edu.tr </option>
                          <option value="MERVE YAĞMURCU ">ALİ GÜRBÜZ : 2019123121@cumhuriyet.edu.tr </option>
                          <option value="MERVE YAĞMURCU ">EREN ÇETİN : 2022123024@cumhuriyet.edu.tr </option>
                          <option value="HATUN YÜCEL">HATUN YÜCEL : 2020123067@cumhuriyet.edu.tr</option>
                          <option value="EMRE DELİBAŞ">EMRE DELİBAŞ : edelibas@cumhuriyet.edu.tr</option>
                          <option value="HİDAYET TAKÇI">HİDAYET TAKÇI : htakci@cumhuriyet.edu.tr</option>
                        </select>
                      </div>
                  <div class="form-group">
                    <label >Mesaj Başlık</label>
                   <textarea class="form-control" rows="2" name="dersnf"></textarea>
                  </div>
                    <div class="form-group">
                    <label >Yeni Mesaj Gönder</label>
                   <textarea class="form-control" rows="7" name="derskod"></textarea>
                  </div>
                    
                       
                  <div class="form-group">
                   
                  </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" name="save" value="1001">
                <div class="card-footer">
                <button type="submit" class="btn btn-success">Gönder</button>
           
                </div>
              </form>
            </div>
            <!-- /.card -->
         
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Gönderilen Mesaj Listesi</h3>
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
               
                   }


                   $sql = "DELETE FROM qp_references WHERE id IN ('$deleteData')";
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
                    <th>Gönderilen Kişi</th>
                    <th>Mesaj Başlık</th>
                    <th>Mesaj İçeriği</th>
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
                    <td><?php print $value['dersnf']; ?></td>
                    <td><?php print $value['derskod']; ?></td>
              
               
                    <td>
                    
                  </tr>
 <?php } } ?> 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Seç</th>
                    <th>id</th>
                    <th>Gönderilen Kişi</th>
                    <th>Mesaj Başlık</th>
                    <th>Mesaj İçeriği</th>
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