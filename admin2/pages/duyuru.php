<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Duyuru </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php 
     if(isset($_POST['save'])){
      if($_POST['save'] == 1001){
        $title = $adminclass->getSecurity ($_POST['title']);
        $description = $adminclass->getSecurity ($_POST['description']);
        $user_id = 1;
        $statu = $adminclass->getSecurity ($_POST['statu'][0]);
        $sql = "INSERT INTO qp_duyuru(title, description, user_id, statu) VALUES (?,?,?,?)"; 
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
        $sql = "UPDATE qp_duyuru SET title=?,description=?, statu = ? WHERE id = ? ";
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
        $sql = "DELETE FROM qp_duyuru WHERE id = ?";
        $args = [$delete_id];
        $result = $adminclass->pdoDelete($sql,$args);
        print $result;
      }

      ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  YENİ
                </button>   
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Duyuru No</th>
                    <th>Duyuru Başlığı</th>
                    <th>Duyuru </th>
                    <th>Durum</th>
                    <th>İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
           <?php
               $veriable = $adminclass->getDuyuru();
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
              <h4 class="modal-title"> Duyuru | Sil</h4>
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
              <h4 class="modal-title">Duyuru | Güncelle</h4>
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
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Başlık</label>
                        <input type="text" class="form-control" name="title" value="<?php print $value['title']; ?>" >
                      </div>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="form-control" rows="5" name="description"><?php print $value['description']; ?></textarea>
                      </div>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                       <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu[]">
                          <option value="1">Aktif</option>
                          <option value="2">Pasif</option>
                          <option value="3">veri</option>
                          <option value="4">gorsel</option>
                        </select>
                      </div>
                    </div>               
                  </div>
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">VAZGEÇ</button>
              <button type="submit" class="btn btn-success">KAYDET</button>
            </div>
            <input type="hidden" name="id" value="<?php print $value['id']; ?>">
            <input type="hidden" name="update" value="1002">
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
              
               
              </td>  
            </tr>
               
           <?php } } ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Duyuru Başlığı</th>
                    <th>Açıklama</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Duyuru</h4>
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
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Duyuru Başlık</label>
                        <input type="text" class="form-control" name="title" >
                      </div>
                    </div>
                   
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="form-control" rows="5" name="description"></textarea>
                      </div>
                    </div>
                    
                  </div>

                 

                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu[]">
                          <option value="1">Aktif</option>
                          <option value="2">Pasif</option>
                          <option value="3">veri</option>
                          <option value="4">gorsel</option>

                        </select>
                      </div>
                    </div>
                    
                  </div>
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">VAZGEÇ</button>
              <button type="submit" class="btn btn-success">KAYDET</button>
            </div>
            <input type="hidden" name="save" value="1001">
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

     
   
   