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
    while ($row = $result->fetch_assoc())
        $settings[$row['key']] = $row;
}

$conn->close();

$folder = dirname(__DIR__, 2);

$file = $folder . '/public/package/build/js/chat.js';
//echo $file;

$content = file_get_contents($file);

$endpoint = '/fileUpload';

$print = strtr($content, [
    '${csrf_token}' => $_GET['csrf_token'],
    '${endpoint}' => $endpoint,
]);

echo $print;
?>

