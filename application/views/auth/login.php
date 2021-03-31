<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Main Menu</title>
    <script type="text/javascript" src="assets/js/animation.js">alert("Berhasil")</script>
    <link rel="stylesheet" href="assets/css/style.css">
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
                    <ul>
                        <li>
                            <label> Username: </label>
                            <input type="text" name="username" placeholder="Enter Username"/>
                        </li>
                        <li>
                          <label> Password: </label>
                          <input type="password" name="password" placeholder="Enter Password"/>
                        </li>
                        <li>
                          <label> Email: </label>
                          <input type="email" name="email" placeholder="Enter Email"/>
                        </li>
                        <li>
                          <label><input type="checkbox" name="remember" value="remember"/> Remember me </label>
                        </li>
                        <li>
                          <center>
                          <input type="submit" value="Login" class="button" />
                          </center>
                        </li>
                    </ul>
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
                    <ul>
                      <li>
                        <label> Nama: </label>
                        <input type="text" name="name" placeholder="Enter Full Name" />
                      </li>
                      <li>
                        <label> Username: </label>
                        <input type="text" name="username" placeholder="Enter Username" />
                      </li>
                      <li>
                        <label> Email: </label>
                        <input type="email" name="email" placeholder="Enter Your Email">
                      </li>
                      <li>
                        <label> Password: </label>
                        <input type="password" name="password" placeholder="Enter Password" />
                      </li>
                      <li>
                        <label> Jenis Kelamin: </label>
                        <label><input type="radio" name="jenis_kelamin" value="laki-laki" /> Laki-laki </label>
                        <label><input type="radio" name="jenis_kelamin" value="perempuan" /> Perempuan </label>
                      </li>
                    </ul>
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
