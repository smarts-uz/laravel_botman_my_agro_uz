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


/*
 *
 *  @php
        $chatLogo = setting('chatbot.icon_image');
$chatLogo = str_replace('\\', '/', $chatLogo);
          //dd( $chatLogo);
          //
        //  $intro = htmlspecialchars(setting('chatbot.ChatIntro'));
          $intro = setting('chatbot.ChatIntroText');
    @endphp

    var botmanWidget = {
        // bubbleBackground: "blue",
        bubbleAvatarUrl: 'https://my.agro.uz/images/logo.png',
        frameEndpoint: "chat.html",
        introMessage: `{{$intro}}`
    };
 * */


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

