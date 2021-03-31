<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Main Menu</title>
    <script type="text/javascript" src="assets/js/animation.js">alert("Berhasil")</script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css ?>">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="flat-form">
            <ul class="tabs">
                <li>
                    <a href="#login" class="active">Login</a>
                </li>
                <li>
                    <a href="#register">Register</a>
                </li>
            </ul>
            <div id="login" class="form-action show">
              <h1>Welcome Back</h1>
              <p>
                  Please login to enter the website.
              </p>
                <?php if($this->session->flashdata('errors')): ?>
                  <div class="alert alert-danger"><?php echo $this->session->flashdata('errors') ?>
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
            <div id="register" class="form-action hide">
                <h1>Register</h1>
                <p>
                    Sign Up now to login to the website.
                </p>
                <?php if($this->session->flashdata('errors')): ?>
                  <div class="alert alert-danger"><?php echo $this->session->flashdata('errors') ?>
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
                        <label><input type="radio" name="jenis_kelamin" value="laki-laki" /> Laki-laki </label>
                        <label><input type="radio" name="jenis_kelamin" value="perempuan" /> Perempuan </label>
                      </td>
                    </tr>
                </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    function set(){
      if(document.getElementById("remember").value == 0) {
        document.getElementById("remember").value = 1;
      } else {
        document.getElementById("remember").value = 0;
      }
    }
</script>
</html>
