<?php
$title = "Register";
require_once('scripts/register_handler.php');
include_once('includes/header.php');
include_once('includes/navbar.php');
?>
<section class="bg-light">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Register</h2>
            <p class="lead mb-0">Create a new account</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <!-- Registration form -->
                <form method="POST" action="">
                    <!-- Name -->
                    <div class="form-floating mb-3">
                        <input class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" id="name" name="name" type="text"
                               value="<?php escape_html($name); ?>" required autocomplete="off"/>
                        <label for="name">Name</label>
                        <div class="invalid-feedback"><?php echo $errors['name'] ?? ''; ?></div>
                    </div>
                    <!-- Email -->
                    <div class="form-floating mb-3">
                        <input class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" id="email" name="email" type="email"
                               value="<?php escape_html($email); ?>" required autocomplete="off"/>
                        <label for="email">Email</label>
                        <div class="invalid-feedback"><?php echo $errors['email'] ?? ''; ?></div>
                    </div>
                    <!-- Phone -->
                    <div class="form-floating mb-3">
                        <input class="form-control <?php echo isset($errors['phone_no']) ? 'is-invalid' : ''; ?>" id="phone" name="phone_no" type="text"
                               value="<?php escape_html($phone_no); ?>" required autocomplete="off"/>
                        <label for="phone">Phone Number</label>
                        <div class="invalid-feedback"><?php echo $errors['phone_no'] ?? ''; ?></div>
                    </div>
                    <!-- Password -->
                    <div class="form-floating mb-3">
                        <input class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" id="password" name="password" type="password" required autocomplete="off"/>
                        <label for="password">Password</label>
                        <div class="invalid-feedback"><?php echo $errors['password'] ?? ''; ?></div>
                    </div>
                    <!-- Confirm Password -->
                    <div class="form-floating mb-3">
                        <input class="form-control <?php echo isset($errors['confirmPassword']) ? 'is-invalid' : ''; ?>" id="confirmPassword" name="confirmPassword" type="password" required autocomplete="off"/>
                        <label for="confirmPassword">Confirm Password</label>
                        <div class="invalid-feedback"><?php echo $errors['confirmPassword'] ?? ''; ?></div>
                    </div>
                    <!-- Submit -->
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Register</button>
                    </div>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="login.php">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include_once('includes/footer.php'); ?>
</body>
</html>
