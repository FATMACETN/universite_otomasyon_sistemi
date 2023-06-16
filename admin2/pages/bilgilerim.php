<div class="content-wrapper">
 <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="image/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        
      </div>
      <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  AD SOYAD :
                  <address>
                    <strong> <?php print $_SESSION['firstname']."&nbsp;&nbsp;".$_SESSION['lastname']; ?>></strong>
                   
                    EPOSTA  : <a href="#" class="d-block"><?php print $_SESSION['mail']."&nbsp;&nbsp;"?></a>
                    T.C.   :<a href="#" class="d-block"><?php print $_SESSION['tc']; ?></a>
                    TEL    :<a href="#" class="d-block"><?php print $_SESSION['tel']; ?></a>
                </div>
                
            
              </div>
              </div>