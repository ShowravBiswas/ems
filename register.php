<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - Event Management System</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Responsive navbar-->
<?php include_once('includes/navbar.php'); ?>

<!-- Login section-->
<section class="bg-light">
    <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-person-plus"></i></div>
            <h2 class="fw-bolder">Register</h2>
            <p class="lead mb-0">Create a new account</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <form id="registerForm">
                    <!-- Full name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="fullName" type="text" placeholder="Enter your full name..." required />
                        <label for="fullName">Full Name</label>
                        <div class="invalid-feedback">Full name is required.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" placeholder="name@example.com" required />
                        <label for="email">Email address</label>
                        <div class="invalid-feedback">Email is required.</div>
                    </div>
                    <!-- Password input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" type="password" placeholder="Enter your password..." required />
                        <label for="password">Password</label>
                        <div class="invalid-feedback">Password is required.</div>
                    </div>
                    <!-- Confirm password input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm your password..." required />
                        <label for="confirmPassword">Confirm Password</label>
                        <div class="invalid-feedback">Confirm password is required.</div>
                    </div>
                    <div class="d-grid mb-3">
                        <button class="btn btn-primary btn-lg" id="registerButton" type="submit">Register</button>
                    </div>
                    <div class="text-center">
                        <p>Already have an account? <a href="login.php">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer-->
<?php include_once('includes/footer.php'); ?>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="assets/js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
