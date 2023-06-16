
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
            $description= $_POST['description'];
            $adddate = date('Y-m-d H:i:s');
            $user_id = 1;
            $statu = $_POST['statu'][0];
            $image = "image/".$_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];

            if($image_tmp != '') {
                if (file_exists($image))
            {
              print '<div class="alert alert-danger">Aynı isimde dosya mevcut...</div>';
           
            }
            else 
            {
              $sql = "SELECT image FROM qp_references WHERE id = {$id}";
              $query = $adminclass->pdoQuery($sql);
              if ($query){ 
              $delete_image = $query[0]['image'];
              unlink($delete_image);


              }

            move_uploaded_file($image_tmp, $image);

            $sql= " UPDATE qp_references SET title =?, description=?, adddate=?, user_id=?, statu=? WHERE id=?";
            $args= [$title, $description, $adddate,$image, $user_id,$id];
            $args = $adminclass->getSecurity($args);
            $query = $adminclass->pdoPrepare($sql,$args);
            if ($query){ 
                print '<div class="alert alert-success">Resim Güncelleme Başarılı...</div>';
                header("location:./referanslar");
              } else {print '<div class="alert alert-danger">Resim Güncelleme Başarısız...</div>';}



            }
          }

             
            $sql= " UPDATE qp_references SET title =?, description=?, adddate=?, user_id=?, statu=? WHERE id=?";
            $args= [$title, $description, $adddate,$image, $user_id,$id];
            $args = $adminclass->getSecurity($args);
            $query = $adminclass->pdoPrepare($sql,$args);
            if ($query){
                print '<div class="alert alert-success">İşlem Başarılı...</div>';
                header("location:./referanslar");
            } else {print '<div class="alert alert-danger">İşlem Başarısız...</div>';}
 
      } }



  if (isset($_GET['id'])){
     $id = $adminclass->getSecurity($_GET['id']);
  
  
  ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Referans Güncelleme</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php print $id; ?>">
              <?php
              $sql = "SELECT * FROM qp_references WHERE id = {$id}";
              $query = $adminclass->pdoQuery($sql);
              if ($query){
                  ?>
                <div class="card-body">
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
                  <div class="form-group">
                    <label>Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                      <input type="file" name="image">
                      </div>
                    </div>
                    <img src="<?php echo $query[0]['image']; ?>"  style="width: 200px;">
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
