<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Example: Create an array with user data
    $newUser = [
        'username' => $username,
        'email' => $email,
        'password' => $password
    ];

    // Example: Append new user data to existing JSON file
    $users = [];
    if (file_exists('users.json')) {
        $users = json_decode(file_get_contents('users.json'), true);
    }
    $users[] = $newUser;

    // Save updated array back to JSON file
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

    // Example: Redirect or display a success message
    echo "Registration successful!";
}
?>
