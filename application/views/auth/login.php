<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Main Menu</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css ?>">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="Bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="Bootstrap/js/proper.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    </style>
</head>
<body>
    <div class="container" id="tabs">
        <div class="flat-form">
            <ul class="tabs">
                <li>
                    <a href="#login" class="bn active" name="submit" onclick="changelog()">Login</a>
                </li>
                <li>
                    <a href="#register" class="bn" name="submit" onclick="changereg()">Register</a>
                </li>
            </ul>
            <div id="login"  class="fn form-action">
              <h1>Welcome Back</h1>
              <p>
                  Please login to enter the website.
              </p>
              <?php if($this->session->flashdata('errors')): ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('errors') ?></div>
              <?php endif; ?>
                <form action="<?php echo base_url('userdata/do_login') ?>" method="POST">
                    <tr>
                        <td>
                            <label> Username: </label>
                            <input type="text" name="username" placeholder="Enter Username"/>
                        </td>
                        <td>
                          <label> Password: </label>
                          <input type="password" name="password" placeholder="Enter Password"/>
                        </td>
                        <td>
                          <label><input type="checkbox" name="remember" value="remember"/> Remember me </label>
                        </td>
                        <td>
                          <center>
                          <input type="submit" value="Login" class="button" />
                          </center>
                        </td>
                    </tr>
                </form>
            </div>
            <div id="regis"  class="fn form-action hide">
                <h1>Register</h1>
                <p>
                    Sign Up now to login to the website.
                </p>
                <?php if($this->session->flashdata('error')): ?>
                  <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
                <?php endif; ?>
                <form action="<?php echo base_url('userdata/regist')?>" method="POST">
                    <tr>
                      <td>
                        <label> Nama: </label>
                        <input type="text" name="name" placeholder="Enter Full Name" />
                      </td>
                      <td>
                        <label> Username: </label>
                        <input type="text" name="username" placeholder="Enter Username" />
                      </td>
                      <td>
                        <label> Email: </label>
                        <input type="email" name="email" placeholder="Enter Your Email">
                      </td>
                      <td>
                        <label> Password: </label>
                        <input type="password" name="password" placeholder="Enter Password" />
                      </td>
                      <td>
                        <label> Jenis Kelamin: </label>
                        <label><input type="radio" name="jenkel" value="0" /> Laki-laki </label>
                        <label><input type="radio" name="jenkel" value="1" /> Perempuan </label>
                      </td>
                      <td>
                        <center>
                        <input type="submit" value="Register" class="button" />
                        </center>
                      </td>
                    </tr>
                </form>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript">
var header = document.getElementById("tabs");
var btns = header.getElementsByClassName("bn");
var log = header.getElementsByClassName('fn');
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
});
}
function changelog(){
  document.getElementById('regis').style.display='none';
  document.getElementById('login').style.display='block'
}
function changereg() {
  document.getElementById('login').style.display='none';
  document.getElementById('regis').style.display='block'
}
</script>
</html>
