<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatbot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_message = $_POST['user_message'];
    $bot_response = getBotResponse($user_message);

    $sql = "INSERT INTO messages (user_message, bot_response) VALUES ('$user_message', '$bot_response')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function getBotResponse($message) {
    // Simple keyword-based response
    if (strpos($message, 'hello') !== false) {
        return "Hello! How can I help you today?";
    not sure how to respond to that.";
    }
}

$conn->close();
?>
