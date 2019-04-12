<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalHorizontal">
    Launch Horizontal Form
</button>

<!-- Modal -->
<div class="modal fade" id="modalPenyelia" tabindex="-1" role="dialog" 
     aria-labelledby="modalPenyelia" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Tutup</span>
                </button>
                <h4 class="modal-title" id="modalPenyelia">
                    Tambah Penyelia
                </h4>
            </div>
            <!-- End Modal Header-->
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <!-- Form -->
                <form class="form-horizontal" role="form">
                  <!-- ID Pengguna -->
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" 
                        id="inputEmail3" placeholder="Email"/>
                    </div>
                  </div>
                  <!-- End ID Pengguna -->
                  <!-- Bilik-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control"
                            id="inputPassword3" placeholder="Password"/>
                    </div>
                  </div>
                  <!-- End Bilik-->
                  <!-- Tambah -->
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                  </div>
                  <!-- End Tambah -->
                </form>
                <!-- End Form -->
            </div>
            <!-- End Modal Body-->
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            <!-- End Modal Footer -->
        </div>
        <!-- End modal-content -->
    </div>
    <!-- End modal-dialog -->
</div>
<!-- End Modal -->

<!-- Modal Penyelia-->
<div id="modalPenyelia" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!-- Start Header-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Penyelia</h4>
      </div>
      <!-- End Header-->
      <!-- Start Body-->
      <div class="modal-body">
        <!-- Start ID Pengguna-->
        <div class="form-row">
          <div class="form-group col-md-3">
            <label>ID Pengguna:</label>
          </div>
          <div class="form-group col-md-9">
            <?php
                    require_once('connection.php');
                    $result = $conn->prepare("SELECT * FROM users");
                    $result->execute();
                    $user_id = $result->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <select id="user_id" name="user_id"  class="form-control">
                <option selected="" disabled="">--- Pilih ID Pengguna ---</option>
                <?php 
                    foreach ($user_id as $output){ 
                        echo "<option user_id='".$output['user_id']."'value='".$output['user_id']."'>".$output['user_id']."</option>";
                    }
                ?>
            </select>
          </div>
        </div>
        <!-- End ID Pengguna-->
        <!-- Start Bilik-->
        <div class="form-row">
          <div class="form-group col-md-3">
              <label>Bilik:</label>
          </div>
          <div class="form-group col-md-9">
            <?php
                  require_once('connection.php');
                  $result = $conn->prepare("SELECT * FROM bilik");
                  $result->execute();
                  $bilik = $result->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <select id="incharge_bilik" name="incharge_bilik"  class="form-control">
                <option selected="" disabled="">--- Pilih Bilik ---</option><?php 
                    foreach ($bilik as $output){ 
                        echo "<option bilik_id='".$output['bilik_id']."'value='".$output['bilik_id']."'>".$output['bilik_nama']."</option>";
                    }
                ?>
            </select>
          </div>
        </div>  
        <!-- End Bilik-->
      </div>
      <!-- End Body-->
      <!-- Start footer-->
      <div class="modal-footer">
        <button type="button" id="btnTambah" class="btn btn-success" >Tambah</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
      <!-- End footer-->
    </div>
    <!-- End Modal Content-->

  </div>
</div>
<!-- End Modal Penyelia-->