<?php
// a_local_file.php


ob_start();
Header("content-type: application/javascript");
ob_end_flush();
require __DIR__ . '/../../vendor/autoload.php';
// $settings = \Illuminate\Support\Facades\DB::table('settings');
// $title = $settings->where('key', 'chatbot.chat_title')->first()->value;
$servername = env("DB_HOST");
$username = 'root';
$password = 'root';
$dbname = 'laravel_agromy';

$conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//   \Log::info("Connection failed: " . $conn->connect_error);
// }
$sql = "SELECT * FROM settings";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
        if ($row['key'] == 'chatbot.chat_title') $title = $row['value'];
        if ($row['key'] == 'chatbot.chat_intro_message') $intro = $row['value'];
        if ($row['key'] == 'chatbot.placeholder_text') $placeText = $row['value'];
        if ($row['key'] == 'chatbot.icon_image') $icon = addslashes($row['value']);


    }
} else {
    echo "0 results";
}
$conn->close();

echo '
            var botmanWidget = {
            frameEndpoint: "https://my.agro.uz/package/build/chat.html",
            bubbleAvatarUrl: "https://my.agro.uz/storage/' . ($icon) . '",
            aboutLink: "https://agro.uz",
	        aboutText: "Powered By Agro.Uz",
            introMessage: "' . $intro . '",
			title: "' . strval($title) . '",
			placeholderText: "' . $placeText . '"
	    };
        ';
echo ' t = document.getElementById("messageArea");
        wer = document.getElementById("botmanChatRoot");
        
        ';
?>
