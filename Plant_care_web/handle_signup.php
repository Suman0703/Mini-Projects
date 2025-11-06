<?php
// Set the response type to JSON
header('Content-Type: application/json');

// This array will hold our response
$response = ['status' => 'error', 'message' => 'An unknown error occurred.'];

// 1. Database Connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'plantlife'; // Make sure this is your database name

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    $response['message'] = "Connection failed: " . $conn->connect_error;
    echo json_encode($response);
    exit;
}

// 2. Get Data from Form
if ( !isset($_POST['fullname']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['confirm-password']) ) {
    $response['message'] = 'Please fill in all required fields.';
    echo json_encode($response);
    exit;
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];

// 3. Validation
if (empty($fullname) || empty($email) || empty($password)) {
    $response['message'] = 'Please fill in all fields.';
    echo json_encode($response);
    exit;
}
if ($password !== $confirm_password) {
    $response['message'] = 'Passwords do not match.';
    echo json_encode($response);
    exit;
}

// 4. Hash the Password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// 5. Create SQL to Insert User
$sql = "INSERT INTO users (fullname, email, password_hash) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    $response['message'] = "Error preparing statement: " . $conn->error;
    echo json_encode($response);
    exit;
}

$stmt->bind_param('sss', $fullname, $email, $password_hash);

// 6. Execute and Send JSON Response (with try...catch)
// This is the new, fixed section
try {
    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Account created successfully! Redirecting to login...';
    } else {
        // This might catch non-exception errors
        $response['message'] = "An unknown error occurred during execution.";
    }
} catch (mysqli_sql_exception $e) {
    // This "catches" the fatal error
    
    // Check if it's the "Duplicate entry" error (code 1062)
    if ($e->getCode() == 1062) {
        $response['message'] = 'This email address is already registered.';
    } else {
        // Some other database error
        $response['message'] = "Database error: " . $e->getMessage();
    }
}

// 7. Echo the final JSON response
echo json_encode($response);

$stmt->close();
$conn->close();
?>