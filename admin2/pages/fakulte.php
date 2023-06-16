<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fakulte İşlem</h1>
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
     if(isset($_POST['save'])){
      if($_POST['save'] == 1001){
        $title = $adminclass->getSecurity ($_POST['title']);
        $description = $adminclass->getSecurity ($_POST['description']);
        $user_id = 1;
        $statu = $adminclass->getSecurity ($_POST['statu'][0]);
        $sql = "INSERT INTO qp_fakulte(title, description, user_id, statu) VALUES (?,?,?,?)"; 
        $args = [$title, $description, $user_id, $statu];
        $result = $adminclass->getSecurity($args);
        print $adminclass->pdoInsert($sql,$result);

      }
    }
    if(isset($_POST['update'])){
      if($_POST['update'] == 1002){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $statu = $_POST['statu'][0];
        $sql = "UPDATE qp_fakulte SET title=?,description=?, statu = ? WHERE id = ? ";
        $args = [$title,$description,$statu,$id];
        $args = $adminclass->getSecurity($args);
        $veriable = $adminclass->pdoPrepare($sql,$args);
        if ($veriable == 1) {
          print '<div class = "alert alert success"> İşlem Başarılı.. </div>';
        } else {print '<div class = "alert alert success"> İşlem Başarısız.. </div>';
        }
      }
    }
    
      if (isset($_POST['dataDelete'])) {
        $delete_id = $_POST['dataDelete'];
        $sql = "DELETE FROM qp_fakulte WHERE id = ?";
        $args = [$delete_id];
        $result = $adminclass->pdoDelete($sql,$args);
        print $result;
      }

      ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Fakulte Ekle</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">


              

                      <div class="row">
                    <div class="col-sm-12">
                     
                    </div>               
                  </div>
                  <div class="form-group">
                    <label>Fakulte Adı</label>
                    <input type="text" class="form-control" name="title">
                  </div>
                  <div class="form-group">
                    <label>Fakulte Acıklaması</label>
                    <input type="text" class="form-control" name="description">
                  </div>


                  <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu[]">
                          <option value="1">Aktif</option>
                          <option value="2">Pasif</option>
                          <option value="3">veri</option>
                          <option value="4">gorsel</option>
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
                <h3 class="card-title">Fakulte Listesi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
               $veriable = $adminclass->getFakulte();
               if ($veriable) { foreach ($veriable as  $value ){ ?>
                <tr>
                    <td><?php print $value['id']; ?></td>
                    <td> <?php print $value['title'];?></td>
                    <td><?php print $value['description'];?></td>
                    <td><?php print $adminclass->getStatu($value['statu']);?></td>
                   <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default<?php print $value['id']; ?>"> SİL </button>
                   <div class="modal fade" id="modal-default<?php print $value['id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Hakkımızda | SİL</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method ="POST">
            <input type="hidden" name ="dataDelete" value="<?php print $value['id']; ?>">
            <p><?php print $value['title']; ?> : Bölümünü silmek istiyor musunuz?</p>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal">VAZGEÇ</button>
              <button type="submit" class="btn btn-danger">SİL</button>
            </div>
                </form>
              </div>
            </div>
            </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default-update<?php print $value['id']; ?>"> GÜNCELLE </button>
        <div class="modal fade" id="modal-default-update<?php print $value['id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hakkımızda | Güncelle</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
                 <?php } } ?>
              <form method="post">
              <button type="submit" class="btn btn-danger" onlick="return confirm('Silmek istiyor musunuz ?');"> SİL</button>
              <input type="hidden" name="deleteData" value="1001" >
              <table id="example2" class="table table-bordered table-hover"> 
                  <thead>
                  <tr>
                    <th>Seç</th>
                    <th>id</th>
                    <th>Fakulte Adı</th>
                    <th>Fakulte Acıklaması</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
                        <?php
                        $sql = "SELECT * FROM qp_fakulte";
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
                    <td> <?php print $value['statu']; ?></td>
                    <td>
                     <a href="./fakulte_edit?id=<?php print $value['id']; ?>">GÜNCELLE</a>
                  </tr>
 <?php } } ?> 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Seç</th>
                    <th>id</th>
                    <th>Fakulte Adı</th>
                    <th>Fakulte Açıklama</th>
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
