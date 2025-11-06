<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - PlantLife</title>
    <link rel="stylesheet" href="signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <div class="signup-wrapper">
        <div class="signup-container">

            <div class="signup-info-container">
                <a href="index.php" class="logo">
                    <i class="fas fa-leaf"></i> PlantLife
                </a>
                
                <h3>Welcome to the Community!</h3>
                <p>By creating an account, you can:</p>
                
                <ul class="perks-list">
                    <li>
                        <i class="fas fa-seedling"></i>
                        <span>Track your contributions and trees planted.</span>
                    </li>
                    <li>
                        <i class="fas fa-award"></i>
                        <span>Join exclusive events and volunteer programs.</span>
                    </li>
                    <li>
                        <i class="fas fa-bell"></i>
                        <span>Receive updates on projects you care about.</span>
                    </li>
                </ul>
                
                <img src="media/sapling.jpg" alt="A sapling growing in hand">
            </div>

            <div class="signup-form-container">
                <div class="form-content">
                    <h2>Create your Account</h2>
                    <p class="subtitle">Join the green movement today.</p>
                    
                    <form id="signup-form">
                        <div class="input-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
                        </div>

                        <div class="input-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        
                        <div class="input-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Create a password" required>
                        </div>

                         <div class="input-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                        </div>
                        
                        <div class="options-group">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">I agree to the <a href="#">Terms & Privacy Policy</a></label>
                        </div>
                        
                        <div id="form-message"></div>
                        
                        <button type="submit" class="btn-signup">Create Account</button>
                    </form>
                    
                    <p class="signin-link">
                        Already have an account? <a href="login.php">Sign In</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
    
    <script src="script.js"></script>

</body>
</html>