<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login-new.css">
  <title>Kohort</title>
</head>

<body>
  <main id="login-wrapper">
    <section id="login-box">
      <header class="login-logo">
        <h1>KOHORT APPS</h1>
      </header>
      <form id="login-form" action="#" method="POST">
        <div class="input-wrapper">
          <div class="form-group">
            <!-- <label for="username" class="label-login">USERNAME</label> -->
            <input type="text" name="username" class="login-input" id="login-username" placeholder="Username"/>
          </div>
          <div class="form-group">
            <!-- <label for="password" class="label-login">PASSWORD</label> -->
            <input type="password" name="password" class="login-input" id="login-password" placeholder="Password"/>
          </div>
        </div>
        <button type="submit" id="login-submit">LOGIN</button>
      </form>
    </section>
  </main>
  <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
</body>

</html>