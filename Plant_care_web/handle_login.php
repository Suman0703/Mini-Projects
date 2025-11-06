<?php
// This MUST be the very first line to use sessions
session_start(); 

// Set the response type to JSON
header('Content-Type: application/json');

// This array will hold our response
$response = ['status' => 'error', 'message' => 'An unknown error occurred.'];

// 1. Database Connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'plantlife';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    $response['message'] = "Connection failed: " . $conn->connect_error;
    echo json_encode($response);
    exit;
}

// 2. Get Data from Form
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    $response['message'] = 'Email and password are required.';
    echo json_encode($response);
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];

// 3. Find the user in the database
$sql = "SELECT id, fullname, password_hash FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // User found, fetch their data
    $user = $result->fetch_assoc();

    // 4. Verify the password
    if (password_verify($password, $user['password_hash'])) {
        // Password is correct!
        
        // 5. Store user info in a session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_fullname'] = $user['fullname'];
        
        $response['status'] = 'success';
        $response['message'] = 'Login successful! Redirecting...';
        
    } else {
        // Wrong password
        $response['message'] = 'Invalid email or password.';
    }
} else {
    // User not found
    $response['message'] = 'Invalid email or password.';
}

// 6. Echo the final JSON response
echo json_encode($response);

$stmt->close();
$conn->close();
?>