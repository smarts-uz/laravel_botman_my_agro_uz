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
<body>
    <div class="input-area"></div>
</div>

<script src="/js/app.js"></script>
<script>

    let ull = document.getElementsByClassName('btn')
    for(let i of ull) {
        if(i.textContent == "") {
            i.style.display = "none"
        }
    }
    let wrappInp = document.getElementsByClassName('input-area')
    let ul = document.getElementsByClassName('ChatLog')
    let ChatInput = document.getElementsByClassName('ChatInput')
    let attachment = document.getElementsByTagName('label')
    let wrap = ChatInput[0].parentElement
    attachment[0].classList.add('fas')
    attachment[0].classList.add('fa-paper-plane')

     ChatInput[0].value = '/start'
    wrappInp[0].appendChild(ChatInput[0])
    wrappInp[0].appendChild(attachment[0])
</script>

</body>

<script>
    let div = document.getElementById('botmanWidgetRoot')
    console.log(div)
</script>
  
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">

</link>
    <script>
	    var botmanWidget = {
            aboutLink: 'https://agro.uz',
	        aboutText: 'AgroChat',
            introMessage: '⚖️  Qishloq xo\'jaligi vazirligi va vazirlikning elektron resurslaridan foydalanuvchi jismoniy va yuridik shaxslar o\'rtasida onlayn muloqot tizimiga hush kelibsiz.<br>📝  Iltimos asosiy elektron pochta (E-Mail) manzilingizni kiriting.<br>-----------------------------------------------------------<br>⚖️  Добро пожаловать в систему онлайн взаимодействия между Министерством сельского хозяйства РУз и пользователями электронных ресурсов министерства.<br>📝 Пожалуйста, введите ваш основной адрес электронной почты (E-Mail).',
			title: "AgroChat",
			placeholderText: "S E N D   M E S S A G E ........"
	    };
    </script>

    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</html>