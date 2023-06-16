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
                <strong> AD SOYAD : </strong>
                  <address>
                     <?php print $_SESSION['unvan']."&nbsp;&nbsp;".$_SESSION['firstname']."&nbsp;&nbsp;".$_SESSION['lastname']; ?><br>
                   
                    <strong>EPOSTA  : </strong> <?php print $_SESSION['mail']."&nbsp;&nbsp;"?><br>
                    <strong>T.C.   :  </strong><?php print $_SESSION['tc']; ?><br>
                    <strong>TEL    :  </strong><?php print $_SESSION['tel']; ?><br>
                    <strong>ADRES :   </strong><br>
                    Hürriyet Mahallesi Gül Sokak Çiçek Apartmanı daire : 4 <br>
                </div>
                
            
              </div>
              </div>