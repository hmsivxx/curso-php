<?php require 'pages/header.php'; ?>

<div class="container">
    <h1 class="mt-4">Sign Up:</h1>
    <?php
        require 'classes/User.class.php';
        $user = new User();
        if (isset($_POST['name']) && !empty(['name'])) {
            $name = addslashes($_POST['name']);
            $email= addslashes($_POST['email']);
            $password = $_POST['password'];
            $phone = addslashes($_POST['phone']);

            if (!empty($email) && !empty($password) && !empty($phone)) {
                $user->add($name, $email, $password, $phone);
    ?>
                <div class="alert alert-success" role="alert">
                    User registered successfuly.
                </div>
    <?php
            } else {
    ?>
                <div class="alert alert-warning" role="alert">
                    All fields are required.
                </div>
    <?php
            }
        }
    ?>

    <form class="" method="post">
        <div class="form-group mt-3">
            <label for="name" class="mt-2">Name</label>
            <input type="text" name="name" id="name" class="form-control">
            <label for="name" class="mt-2">Email</label>
            <input type="email" name="email" id="email" class="form-control">
            <label for="name" class="mt-2">Password</label>
            <input type="text" name="password" id="password" class="form-control">
            <label for="name" class="mt-2">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <input type="submit" name="register" value="Sign Up" class="btn btn-primary">
    </form>


</div>



<?php require 'pages/footer.php'; ?>
