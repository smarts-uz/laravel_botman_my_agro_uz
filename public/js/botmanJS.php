<?php
// a_local_file.php
require __DIR__ . '/../../vendor/autoload.php';

// var_dump(__DIR__ . '/../vendor/autoload.php');
// use Symfony\Component\Dotenv\Dotenv;
use Dotenv\Dotenv;

// $dotenv = new Dotenv();
// $dotenv->load(__DIR__.'/.env');
$dotenv = Dotenv::createImmutable('../../');
$dotenv->load();
ob_start();
Header("content-type: application/javascript");
ob_end_flush();

// $settings = \Illuminate\Support\Facades\DB::table('settings');
// $title = $settings->where('key', 'chatbot.chat_title')->first()->value;
$servername = $_SERVER['DB_HOST'];
$username = $_SERVER['DB_USERNAME'];
$password = $_SERVER['DB_PASSWORD'];
$dbname = $_SERVER['DB_DATABASE'];
// var_dump($_ENV);
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
            frameEndpoint: "https://my.agro.uz/package/build/chat.html",
            bubbleAvatarUrl: "https://my.agro.uz/images/logo.png",
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
            alwaysUseFloatingButton: !1,
            aboutLink: "https://agro.uz",
            aboutText: "Powered By Agro.Uz",
            introMessage: `$intro`,
            title: `$title`,
            placeholderText: `$placeText`
};

JS;

?>

