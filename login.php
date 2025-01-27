<?php
$title = "Login";
session_start();
include 'helper/helpers.php';
require_once('scripts/login_handler.php');
include_once('includes/header.php');
include_once('includes/navbar.php');
?>

<!-- Login section-->
<section class="bg-light">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-lock"></i></div>
            <h2 class="fw-bolder">Login</h2>
            <p class="lead mb-0">Please log in to your account</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <form id="loginForm" method="POST" action="">
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input
                                class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>"
                                id="email"
                                type="email"
                                name="email"
                                placeholder="name@example.com"
                                value="<?php escape_html($email); ?>"
                                required
                                autocomplete="off"
                        />
                        <label for="email">Email address</label>
                        <div class="invalid-feedback"><?php echo $errors['email'] ?? ''; ?></div>
                    </div>
                    <!-- Password input-->
                    <div class="form-floating mb-3">
                        <input
                                class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>"
                                id="password"
                                type="password"
                                name="password"
                                placeholder="Enter your password..."
                                required
                                autocomplete="off"
                        />
                        <label for="password">Password</label>
                        <div class="invalid-feedback"><?php echo $errors['password'] ?? ''; ?></div>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="text-danger"><?php echo $errors['general'] ?? ''; ?></div>
                    </div>
                    <div class="d-grid mb-3">
                        <button class="btn btn-primary btn-lg" id="loginButton" type="submit">Login</button>
                    </div>
                    <div class="text-center">
                        <p>Don't have an account? <a href="register.php">Register here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer-->
<?php include_once('includes/footer.php'); ?>
<?php include_once('scripts/flush_message_handler.php');?>

