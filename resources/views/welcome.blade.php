<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroChat</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .start {
            display: flex;
            justify-content: center;
            height: 100vh;
            align-items: center;

        }

        .start-btn {
            text-decoration: none;
            font-weight: 600;
            font-size: 30px
        }

        .content {
            text-align: center;
        }

        .contact-info {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background-color: #e6e6e6;
            font-family: "Open Sans", "Helvetica", sans-serif;
        }

        .chat-box {
            width: 100%;
            height: 20%;
            padding: 0.2rem 1rem;
            display: flex;
            align-items: center;
            overflow-y: auto;
        }

        .button {
            width: 96%;
            height: 59px;
            position: absolute;
            bottom: 1px;
            background-color: greenyellow;
            font-size: 20px;
            color: red;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .input-area {
            display: flex;
            align-items: center;
            width: 100%;
            /* padding: 1.5rem 2rem; */
            justify-content: center;
        }

        .message {
            padding: 0.3rem 1rem;
            margin: 0.5rem 0;
            border-radius: 7px;
            width: fit-content;
        }

        .message.primary {
            text-align: right;
            background-color: #d8d8d8;
            margin-left: auto;
        }

        .message.secondary {
            text-align: left;
            background-color: #98FB98;
            margin-right: auto;
        }
    </style>


</head>


</body>
<link rel="stylesheet" type="text/css" href="/package/build/assets/css/chat.css"/>


<input type="file" style="display:none" id="form" name="file" onchange="" class="custom-file-input" id="chooseFile">
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script> -->
 <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<script src='/package/build/js/widget.js'></script>
<script>

    @php
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
</script>
<!-- <script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="form"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

    FilePond.setOptions({
        server:{
            url:"/upload",
            headers:{
                'X-CSRF-TOKEN':'{{csrf_token()}}'
            }
        }
    })
    console.log(pond.name);
</script> -->

<body>
</html>
