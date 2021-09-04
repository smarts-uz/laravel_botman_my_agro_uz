<?php
// a_local_file.php
ob_start();
Header("content-type: application/x-javascript");
ob_end_flush();
echo '<script type="text/javascript">
            alert("Hello");
            console.log("Ok");
            var botmanWidget = {
            frameEndpoint: "chat.html",
            aboutLink: "https://agro.uz",
	        aboutText: "AgroChatqwert",
            introMessage: "⚖️  Qishloq xo\'jaligi vazirligi va vazirlikning elektron resurslaridan foydalanuvchi jismoniy va yuridik shaxslar o\'rtasida onlayn muloqot tizimiga hush kelibsiz.<br>📝  Iltimos asosiy elektron pochta (E-Mail) manzilingizni kiriting.<br>-----------------------------------------------------------<br>⚖️  Добро пожаловать в систему онлайн взаимодействия между Министерством сельского хозяйства РУз и пользователями электронных ресурсов министерства.<br>📝 Пожалуйста, введите ваш основной адрес электронной почты (E-Mail).",
			title: "AgroChat",
			placeholderText: "S E N D   M E S S A G E ........"
	    };
    </script>';
?>
