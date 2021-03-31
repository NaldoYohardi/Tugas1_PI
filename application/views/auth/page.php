<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css ?>">
<script type="text/javascript" src="Bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="Bootstrap/js/proper.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title> Profile </title>
    <style media="screen">
    .hide{
      display: none;
      }
    </style>
  </head>
  <body>
    <a href="<?php echo base_url('userdata/logout'); ?>"><button type="submit" name="submit"> Logout </button></a>
    <table border="1">
      <tr>
        <td><b> Id </b></td>
        <td><b> Username </b></td>
        <td><b> Email </b></td>
        <td><b> Jenis Kelamin </b></td>
        <td><b> Action </b></td>
      </tr>
      <?php foreach ($result as $o): ?>
      <tr>
        <td> <?php echo $o->id; ?> </td>
        <td> <?php echo $o->username; ?> </td>
        <td> <?php echo $o->email; ?> </td>
        <td> <?php if($o->jenkel == 0){
          echo "Laki - Laki";
        } else {
          echo "Perempuan";
        } ?>
        </td>
        <td>
          <a href="#editModal" data-toggle="modal" method="post" onclick="<?php $this->session->set_tempdata('data',$o->id); ?>"><button  type="submit" name="submit"> Edit </button></a>
          <a href="#deleteModal" data-toggle="modal"method="post" onclick="<?php $this->session->set_tempdata('data',$o->id); ?>"><button  type="submit" name="submit"> Delete </button></a>
        </td>
      </tr>

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
          </form>
        </div>
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
    </table>


  </body>
<script type="text/javascript">
$("#change").click(function(){
	$('#submit').removeClass('hide');

});
</script>
</html>
