<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Profile </title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style media="screen">
    .hide{
      display: none;
      }
    </style>
  </head>
  <body>
  <div class="col-sm-2">
    <a href="<?php echo base_url('userdata/logout'); ?>"><button type="submit" name="submit"> Logout </button></a>
  </div>
    <div class="container">
    <h2>Data User</h2>
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Name</div>
        <div class="col col-2">Username</div>
        <div class="col col-3">Email</div>
        <div class="col col-4">Email</div>
        <div class="col col-5">Action</div>
      </li>
      <?php foreach ($result as $o): ?>
      <li class="table-row">
        <div class="col col-1" ><?php echo $o->id; ?></div>
        <div class="col col-2" ><?php echo $o->username; ?></div>
        <div class="col col-3" ><?php echo $o->email; ?></div>
        <div class="col col-4" ><?php if($o->jenkel == 0){
          echo "Laki - Laki";
        } else {
          echo "Perempuan";
        } ?>
        </div>
        <div class="col col-5" >
          <button class="btn btn-primary" type="submit" name="submit"> Update </button>
          <button class="btn btn-danger" type="submit" name="submit"> Delete </button>
        </div>
      </li>
    </ul>

    <!-- Edit -->
    <div id="editModal" class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="<?php echo base_url(). 'userdata/edit_user/'.$this->session->tempdata('data');?>" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $o->username; ?>" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control"value="<?php echo $o->email; ?>" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="numeric" name="password" class="form-control" required>
              </div>
              <div class="form-group">
                <label> Jenis Kelamin: </label>
                <label><input type="radio" name="jenkel" value="0" /> Laki-laki </label>
                <label><input type="radio" name="jenkel" value="1" /> Perempuan </label>
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-info" value="Save">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Delete -->
    <div id="deleteModal" class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="<?php echo base_url(). 'userdata/delete_user/'.$this->session->tempdata('data');?>" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Delete Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-danger" value="Delete">
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

  </div>
  </body>
  <script type="text/javascript">
  $("#change").click(function(){
  	$('#submit').removeClass('hide');

  });
  </script>
</html>
