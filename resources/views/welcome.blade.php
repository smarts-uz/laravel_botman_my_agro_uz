<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AgroChat</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
        .start{
            display:flex;
            justify-content:center;
            height: 100vh;
            align-items:center;

        }
        .start-btn{
            text-decoration:none;
            font-weight:600;
            font-size:30px
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
            width: 100%;height: 20%;padding: 0.2rem 1rem;display: flex;align-items: center;overflow-y: auto;
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
            padding: 0.3rem 1rem;margin: 0.5rem 0;border-radius: 7px;width: fit-content;
        }
        .message.primary {
            text-align: right;background-color: #d8d8d8;margin-left: auto;
        }
        .message.secondary {
            text-align: left; background-color: #98FB98;margin-right: auto;
        }
    </style>
</head>




</body>
    <link rel="stylesheet" type="text/css" href="/package/botman-web-widget-0.0.20/package/build/assets/css/chat.css"/>


    <form  action="{{route('fileUpload')}}" id="form" method="post" style="display: none" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" onchange="this.form.submit();" class="custom-file-input" id="chooseFile">
    </form>
    </div>

    <script>
	    var botmanWidget = {
            bubbleBackground: "red",
            bubbleAvatarUrl: 'css/patric.jpg',
            frameEndpoint: "chat.html",
            aboutLink: 'https://agro.uz',
	        aboutText: 'AgroChat',
            introMessage: '⚖️  Qishloq xo\'jaligi vazirligi va vazirlikning elektron resurslaridan foydalanuvchi jismoniy va yuridik shaxslar o\'rtasida onlayn muloqot tizimiga hush kelibsiz.<br>📝  Iltimos asosiy elektron pochta (E-Mail) manzilingizni kiriting.<br>-----------------------------------------------------------<br>⚖️  Добро пожаловать в систему онлайн взаимодействия между Министерством сельского хозяйства РУз и пользователями электронных ресурсов министерства.<br>📝 Пожалуйста, введите ваш основной адрес электронной почты (E-Mail).',
			title: "AgroChat",
			placeholderText: "S E N D   M E S S A G E ........"
	    };
    </script>
    <script src='/package/build/js/widget.js'></script>
    <body>
</html>
