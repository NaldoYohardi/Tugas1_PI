<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form Login</title>
  </head>

  <body>
    <?php if($this->session->flashdata('errors')): ?>
     <div class="alert alert-danger"><?php echo $this->session->flashdata('errors') ?>
  <?php endif; ?>
    <form action="<?php echo base_url('userdata/do_login') ?>" method="POST">
      <fieldset>
      <legend> Login </legend>

      <p>
        <label> Username: </label>
        <input type="text" name="username" placeholder="username..."/>
      </p>

      <p>
        <label> Password: </label>
        <input type="password" name="password" placeholder="password..."/>
      </p>

      <p>
        <input type="submit" name="submit" value="Login"/>
      </p>

      <p>
        Remember me  <input type="checkbox" name="remember" value="0" id="remember" onclick="set()">

      </p>
      </fieldset>
</form>
<a href="<?php echo base_url('userdata/register') ?>"><input type="submit" name="submit" value="Register"/></a>
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
