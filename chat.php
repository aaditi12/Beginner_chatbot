?php
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
    $user_message = $conn->real_escape_string($_POST['user_message']);
    $bot_response = $conn->real_escape_string(getBotResponse($user_message));

    $sql = "INSERT INTO messages (user_message, bot_response) VALUES ('$user_message', '$bot_response')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function getBotResponse($message) {
    // Simple keyword-based response
    if (strpos($message, 'hello') !== false) {
        return "Hello! How can I help you today?";
    } else {
        return "I'm not sure how to respond to that.";
    }
}

$conn->close();
?>
