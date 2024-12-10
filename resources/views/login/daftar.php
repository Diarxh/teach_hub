<!DOCTYPE html>
<?php require_once ('../koneksi.php'); ?>
<html>

<head>
    <title> SignUp - WD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script type="module" src="./ionicons.esm.js"></script>
    <script nomodule src="./ionicons.js"></script>
    <link rel="stylesheet" href="daftar.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="h1">
                <!-- <h1>DAFTAR</h1> -->
            </div>
            <div class="col-sm-4">
            </div>
        </div>
        <div class="row">
            <?php
                if (isset($_POST['signup'])) {
                    extract($_POST);
                    if (!preg_match('/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/', $username)) {
                        $error[] = 'Invalid Entry Last Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
                    }
                    if (strlen($username) < 3) {  // Change Minimum Lenghth
                        $error[] = 'Please enter Username using 3 charaters atleast.';
                    }
                    if (strlen($username) > 50) {  // Change Max Length
                        $error[] = 'Username : Max length 50 Characters Not allowed';
                    }
                    if (!preg_match('/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/', $username)) {
                        $error[] = 'Invalid Entry for Username. Enter lowercase letters without any space and No number at the start- Eg - myusername, okuniqueuser or myusername123';
                    }
                    if (strlen($email) > 50) {  // Max
                        $error[] = 'Email: Max length 50 Characters Not allowed';
                    }
                    if ($passwordConfirm == '') {
                        $error[] = 'Please confirm the password.';
                    }
                    if ($password != $passwordConfirm) {
                        $error[] = 'Passwords do not match.';
                    }
                    if (strlen($password) < 5) {  // min
                        $error[] = 'The password is 6 characters long.';
                    }

                    if (strlen($password) > 20) {  // Max
                        $error[] = 'Password: Max length 20 Characters Not allowed';
                    }
                    $sql = "select * from users where (username='$username' or email='$email');";
                    $res = mysqli_query($koneksi, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        $row = mysqli_fetch_assoc($res);

                        if ($username == $row['username']) {
                            $error[] = 'Username alredy Exists.';
                        }
                        if ($email == $row['email']) {
                            $error[] = 'Email alredy Exists.';
                        }
                    }
                    if (!isset($error)) {
                        $date = date('Y-m-d');
                        $options = array('cost' => 4);
                        // $password = password_hash($password,PASSWORD_BCRYPT,$options);

                        $result = mysqli_query($koneksi, "INSERT into users(username,email,password,date) values('$username','$email','$password','$date')");

                        if ($result) {
                            $done = 2;
                        } else {
                            $error[] = 'Failed : Something went wrong';
                        }
                    }
                }
            ?>

            <div class="col-sm-4">

                <?php
                    if (isset($error)) {
                        foreach ($error as $error) {
                            echo '<p class="errmsg">&#x26A0;' . $error . ' </p>';
                        }
                    }
                ?>
            </div>
            <div class="col-sm-4">
                <?php if (isset($done)) { ?>
                <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> You have registered
                    successfully . <br> <button><a href="login.php" style="color:skyblue;">Login here... </a></button> </div>
                <?php } else { ?>
                <div class="signup_form">
                    <form action="" method="POST">
                        <h1>DAFTAR</h1>
                        <div class="inputbox">
                            <input type="text" name="username"
                                value="<?php if (isset($error)) { echo $_POST['username']; } ?>" required="">
                            <label>Username </label>    
                        </div>

                        <div class="inputbox">
                            <input type="email" name="email" value="<?php if (isset($error)) { echo $_POST['email']; } ?>"
                                required="">
                                <label>Email </label>    
                        </div>
                        <div class="inputbox">
                            <input type="password" name="password" required="">
                            <label>Password </label>
                        </div>
                        <!-- <div class="inputbox">
                            <label>Confirm Password </label>
                            <input type="password" name="passwordConfirm" required="">
                        </div> -->
                        <div class="inputbox">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name="passwordConfirm" required>
                            <label for="">Confirm Password</label>
                        </div>
                        <div class="register">
                            <button type="submit" name="signup">SignUp</button><br>
                            <p>Sudah punya akun? <a href="login.php">Log in</a> </p>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-4">
            </div>

        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</html>