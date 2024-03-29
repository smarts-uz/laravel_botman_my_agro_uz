<?php
// a_local_file.php
require __DIR__ . '/../../vendor/autoload.php';

// var_dump(__DIR__ . '/../vendor/autoload.php');
// use Symfony\Component\Dotenv\Dotenv;
use Dotenv\Dotenv;use Illuminate\Support\Arr;use Illuminate\Support\Str;

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
    while ($row = $result->fetch_assoc())
        $settings[$row['key']] = $row;
}

$conn->close();

$folder = dirname(__DIR__, 2);

$file = $folder . '/public/package/build/js/widget.js';
//echo $file;


$host = Arr::get($_SERVER, 'HTTP_REFERER');

if (empty($host))
    $before = null;
else {
    switch ($host) {
        case Str::contains($host, 'agro.tested.uz'):
        case Str::contains($host, 'agro.uz'):
            $before = 'https://my.agro.uz';
            break;

        default:
            $before = '';
    }
}
/*var_dump($host);
var_dump($before);
die;*/

$content = file_get_contents($file);

$print = strtr($content, [

    '${title}' => $settings['chatbot.chat_title']['value'],
    '${placeholderText}' => $settings['chatbot.placeholder_text']['value'],
    '${ChatIntroText}' => $settings['chatbot.ChatIntroText']['value'] . '<div style="display:flex">
    <a " style="width:80px;padding:5px;margin:5px;background-color:#065853;text-align:center;border:1px solid white;color:#BECAC9;" href="'.$settings['chatbot.manual_uz']['value'].'"  target="__Blank">Uzbek</a>
    <a   style="width:80px;padding:5px;margin:5px;background-color:#065853;text-align:center;border:1px solid white;color:#BECAC9;" href="'.$settings['chatbot.manual_ru']['value'].'" target="__Blank">Русский</a>
    </div>',

    '${aboutText}' => $settings['chatbot.aboutText']['value'],
    '${aboutLink}' => $settings['chatbot.aboutLink']['value'],

    '${videoHeight}' => 160,
    '${mobileWidth}' => "300px",
    '${mobileHeight}' => "100%",
    '${desktopWidth}' => 370,
    '${desktopHeight}' => 450,
    '${textColor}' => $settings['chatbot.textColor']['value'],
    '${mainColor}' => $settings['chatbot.mainColor']['value'],
    '${frameEndpoint}' => $before . '/uzchat',
    '${bubbleAvatarUrl}' => $before . '/images/logo.png',
    '${chatServer}' => $before . '/botman',
]);

echo $print;

echo '

window.addEventListener("scroll", function () {
    console.log("scrol: " + (window.innerHeight + window.scrollY));
    console.log("height: " + document.body.offsetHeight);
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        document.getElementsByClassName("desktop-closed-message-avatar")[0].click();
    }
  });
  ';

?>
