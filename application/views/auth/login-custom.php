<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login-style.css">
    <title>SIM ODGJ</title>
</head>

<body>
    <div class="container">
        <form method="POST">
            <div class="content">
                <div class="form-left">
                    <h2>SIM <br> ODGJ</h2>
                </div>
                <div class="form-right">
                    <div class="form-header">
                        <h2>Silahkan Login Akun Anda</h2>
                    </div>
                    <div class="form-body">
                        <div class="form-control">
                            <label for="username" id="login-alert-username"><p>Masukkan Username anda</p></label>
                            <input type="text" name="username" id="login-form-username" placeholder="Username" require>
                        </div>
                        <div class="form-control">
                            <label for="password" id="login-alert-username"><p>Masukkan Username anda</p></label>
                            <input type="password" name="password" id="login-form-password" placeholder="Password" require>
                        </div>
                        <button type="submit" class="button-login" id="btn-login-submit" onclick="authLogin();">LOGIN</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
</body>

</html>