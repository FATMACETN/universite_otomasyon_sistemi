
<div class="form-group">
                  <label>Disabled Result</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option disabled="disabled">California (disabled)</option>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fakulte Güncelle</h1>
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
            $description= $_POST['description'];
           $statu = $_POST['statu'][0];
           

    

             
            $sql= " UPDATE qp_fakulte SET title =?, description=?, statu=? WHERE id=?";
            $args= [$title, $description, $id];
            $args = $adminclass->getSecurity($args);
            $query = $adminclass->pdoPrepare($sql,$args);
            if ($query){
                print '<div class="alert alert-success">İşlem Başarılı...</div>';
                header("location:./fakulte");
            } else {print '<div class="alert alert-danger">İşlem Başarısız...</div>';}
 
      } }



  if (isset($_GET['id'])){
     $id = $adminclass->getSecurity($_GET['id']);
  
  
  ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Fakulte Listesi</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php print $id; ?>">
              <?php
              $sql = "SELECT * FROM qp_fakulte WHERE id = {$id}";
              $query = $adminclass->pdoQuery($sql);
              if ($query){
                  ?>
                <div class="card-body">



                <div class="row">
                    <div class="col-sm-12">
                   

                 
                      
                  <div class="form-group">
                    <label>Başlık</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $query[0]['title']; ?>">
                  </div>
                  <div class="form-group">
                    <label >Açıklama</label>
                   <textarea class="form-control" rows="3" name="description"><?php echo $query[0]['description']; ?></textarea>
                  </div>

                  
                           <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="statu[]">
                          <option value="1">1. Öğretim</option>
                          <option value="2">2. Öğretim</option>
                        </select>
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
