<?php require 'pages/header.php' ?>
<div class="container">
    <h1 class="mt-4 mb-3">LogIn</h1>
    <?php
        require '../classes/User.class.php';
        $user = new User();
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $passord = $_POST['password'];

            if ($user->login($email, $passord)) {
    ?>
            <script type="text/javascript">window.location.href="../index.php";</script>
    <?php
            } else {
    ?>
                <div class="alert alert-danger" role="alert">
                    Wrong email or password. Please try again.
                </div>
    <?php
            }

        }

     ?>
     <form method="post">
         <div class="form-group">
             <label for="email">Email</label>
             <input type="email" name="email" placeholder="Email" class="form-control">
         </div>
         <div class="form-group">
             <label for="password">Email</label>
             <input type="password" name="password" placeholder="Passwprd" class="form-control">
         </div>
         <input type="submit" name="btnLogin" value="Login" class="btn btn-primary">
     </form>
</div>
<?php require 'footer.php' ?>
