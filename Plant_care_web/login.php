<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PlantLife</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <div class="login-wrapper">
        <div class="login-container">

            <div class="login-form-container">
                <div class="form-content">
                    <a href="index.php" class="logo">
                        <i class="fas fa-leaf"></i> PlantLife
                    </a>
                    <h2>Sign in to your Account</h2>
                    
                    <form id="login-form">
                        
                        <div id="form-message">
                            <?php
                            if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
                                echo '<p class="success-message" style="color:var(--primary-color); text-align:center; margin-bottom:1rem;">Account created! Please log in.</p>';
                            }
                            ?>
                        </div>

                        <div class="input-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter Email" required>
                        </div>
                        
                        <div class="input-group">
                            <label for="password">Password</label>
                            <a href="#" class="forgot-password">Forgot password?</a>
                            <input type="password" id="password" name="password" placeholder="Enter Password" required>
                            <i class="fa-regular fa-eye-slash password-icon"></i>
                        </div>
                        
                        <div class="options-group">
                            <input type="checkbox" id="remember-me" name="remember-me">
                            <label for="remember-me">Remember me</label>
                        </div>
                        
                        <button type="submit" class="btn-login">Sign In</button>
                    </form>
                    
                    <p class="signup-link">
                        Not registered yet? <a href="signup.php">Create an account</a>
                    </p>
                </div>
            </div>

            <div class="login-image-container">
                <img src="media/plant.jpg" alt="Green plants">
                <div class="image-overlay">
                    <h3>Join Our Mission</h3>
                    <p>Help us protect the planet, one plant at a time.</p>
                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>