<?php
// a_local_file.php

use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

ob_start();
Header("content-type: application/javascript");
ob_end_flush();
require __DIR__ . '/../../vendor/autoload.php';

// $settings = \Illuminate\Support\Facades\DB::table('settings');
// $title = $settings->where('key', 'chatbot.chat_title')->first()->value;
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'laravel_agromy';

$conn = new mysqli($servername, $username, $password, $dbname);



$sql = "SELECT * FROM settings";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
        if ($row['key'] === 'chatbot.chat_title') $title = $row['value'];
        if ($row['key'] === 'chatbot.ChatIntroText') $intro = $row['value'];
        if ($row['key'] === 'chatbot.placeholder_text') $placeText = $row['value'];
        if ($row['key'] === 'chatbot.icon_image') $icon = addslashes($row['value']);


    }
} else {
    echo "0 results";
}
$conn->close();


echo <<<JS
var botmanWidget = {
            chatServer:"https://my.agro.uz/botman",
            timeFormat: "HH:MM",
            dateTimeFormat: "m/d/yy HH:MM",
            cookieValidInDays: 1,
            displayMessageTime: !0,
            sendWidgetOpenedEvent: !1,
            widgetOpenedEventData: "",
            mainColor: "#408591",
            headerTextColor: "#333",
            desktopHeight: 450,
            desktopWidth: 370,
            mobileHeight: "100%",
            mobileWidth: "300px",
            videoHeight: 160,
            chatId: "",
            userId: "",
            alwaysUseFloatingButton: !1
            frameEndpoint: "https://my.agro.uz/package/build/chat.html",
            bubbleAvatarUrl: "https://my.agro.uz/images/logo.png",
            aboutLink: "https://agro.uz",
            aboutText: "Powered By Agro.Uz",
            introMessage: `$intro`,
            title: `$title`,
            placeholderText: `$placeText`
};

JS;

?>

