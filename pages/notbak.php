<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Not Bak</h1>
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
            $but= $_POST['but'];
           $staatu = $_POST['staatu'][0];

          

             
          

            $sql= "INSERT INTO qp_notbak(title, description,but, staatu) VALUES (?,?,?,?)";
            $args= [$title, $description, $but, $staatu];
            $args = $adminclass->getSecurity($args);

            $query = $adminclass->pdoPrepare($sql,$args);
            if ($query){
                print '<div class="alert alert-success">İşlem Başarılı...</div>';
           
            } else {print '<div class="alert alert-danger">İşlem Başarısız...</div>';}
 
      }
  } ?>
        
         
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Not Listesi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
            
              <form method="post">
          
              <input type="hidden" name="deleteData" value="1001" >
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Seç</th>
                    <th>id</th>
                    <th>Vize</th>
                    <th>Final</th>
                    <th>But</th>
                    <th>Durum</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
$sql = "SELECT * FROM qp_notbak";
$query = $adminclass->pdoQuery($sql); 
if ($query){
    foreach ($query as $value) {

?>
                  <tr>
                   <td style="width: 5px;">
                      <input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php print $value['id']; ?>">
                    </td>
                    <td><?php print $value['id']; ?></td>
                    <td><?php print $value['title']; ?><?php print $_SESSION['title']; ?></td>
                    <td><?php print $value['description']; ?></td>
                    <td><?php print $value['but']; ?><?php print $_SESSION['but']; ?></td>
                    <td> <?php print $value['staatu']; ?></td>
                   
 <?php } } ?> 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Seç</th>
                    <th>id</th>
                    <th>Vize</th>
                    <th>Final</th>
                    <th>But</th>
                    <th>Durum</th>
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
