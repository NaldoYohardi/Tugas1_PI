<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Registrasi </title>
  </head>
  <body>
    <?php if($this->session->flashdata('errors')): ?>
     <div class="alert alert-danger"><?php echo $this->session->flashdata('errors') ?>
  <?php endif; ?>
    <form action="<?php echo base_url('userdata/regist')?>" method="POST">
      <fieldset>
        <legend> Registrasi </legend>
        <p>
          <label> Username: </label>
          <input type="text" name="username" placeholder="Username..." />
        </p>

        <p>
          <label> Email: </label>
          <input type="email" name="email" placeholder="Your email...">
        </p>

        <p>
          <label> Password: </label>
          <input type="password" name="password" placeholder="Password..." />
        </p>

        <p>
          <label> Jenis Kelamin: </label>
          <label><input type="radio" name="jenkel" value="0" /> Laki-laki </label>
          <label><input type="radio" name="jenkel" value="1" /> Perempuan </label>
        </p>

        <p>
          <input type="submit" name="submit" value="regist">
        </p>
      </fieldset>
    </form>
    <a href="<?php echo base_url('userdata/index') ?>"><input type="submit" name="submit" value="Login"/></a>
  </body>
</html>
