<?php
header('Content-Type: application/json');
session_start();

// Load existing users data
$usersData = json_decode(file_get_contents('users.json'), true);

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['username'], $data['password'])) {
    $username = $data['username'];
    $password = $data['password'];

    foreach ($usersData as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            echo json_encode(['message' => 'Login successful!']);
            exit;
        }
    }

    echo json_encode(['message' => 'Invalid username or password']);
} else {
    echo json_encode(['message' => 'Invalid input']);
}
?>
