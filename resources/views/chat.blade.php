@extends('voyager::master')
<link rel="stylesheet" href="/css/chatt.css">
@section('content')
<style>
 

a {
	text-decoration: none;
}

button {
	cursor: pointer;
}

button, input[type="search"], input[type="text"] {
	border: none;
	outline: none;
}

input[type="checkbox"] {
	margin: 7px;
	margin-right: 15px;
}

/* FIRST, THE OVERLAY ELEMENTS */

.alerts {
	position: absolute;
	bottom: 10px;
	left: 10px;
	z-index: 9999;
	padding: 10px;
	color: #666;
	border-radius: 4px;
	background: #FFF;
	box-shadow: 0 0 7px 0 rgba(0,0,0,0.4);
	display: none;
}

/* small conversation menu */
.moreMenu {
	position: absolute;
	top: 70px;
	right: 0px;
	z-index: 10;
	padding: 10px;
	color: #666;
	border-radius: 0 0 0 4px;
	background: #FFF;
	display: none;
	border-top: 1px solid #DDD;
}

.moreMenu .option {
	width: 150px;
	height: 50px;
	display: block;
	background: #FFF;
	font-size: 14px;
	text-align: left;
	border-radius: 4px;
	padding-left: 10px;
}

.moreMenu .option:hover {
	background: #DDD;
}

.moreMenu .option:nth-last-child(1) {
	margin-top: 3px;
}

/* switch to mobile version screen */
.switchMobile {
	position: absolute;
	width: 65%;
	height: auto;
	padding: 10px;
	background: #FFF;
	top: 75px;
	left: 0px;
	right: 0px;
	margin: auto;
	border-radius: 4px;
	box-shadow: 0 0 7px 0 rgba(0,0,0,0.1);
	display: none;
}

.switchMobile .title {
	font-size: 18px;
	font-weight: 600;
	margin-bottom: 20px;
}

.switchMobile .desc {
	font-size: 14px;
	font-weight: 300;
	margin-bottom: 25px;
}

.switchMobile .okay {
	float: right;
	width: 80px;
	font-size: 16px;
	font-weight: 600;
	background: #419fd9;
	color: #fff;
	border-radius: 4px;
	padding: 10px;
}

/* side menu */
.menuWrap {
	position: absolute;
	width: 30%;
	min-width: 240px;
	max-width: 320px;
	height: 100%;
	z-index: 3;
	display: none;
}

.menu {
	position: relative;
	left: -320px;
	width: 100%;
	height: 100vh;
	float: left;
	background: #FFF;
	box-shadow: 0 0 7px 0 rgba(0,0,0,0.4);
	opacity: 0;
}

.me {
	position: relative;
	width: calc(100% - 50px);
	height: 140px;
	background: #419fd9;
	padding: 15px 25px;
	margin-bottom: 15px;
}

.me .image {
	width: 70px;
	height: 70px;
	background: #FFF url(http://4.bp.blogspot.com/-BHhUazKytmw/VbCfWPqrOJI/AAAAAAAAB7c/qj6WVX3du-s/s1600/51b91bba5a3fd9b6c8b9c53bc0ab6c65.jpg) no-repeat center;
	background-size: cover;
	border-radius: 100%;
	cursor: pointer;
}

.me .settings {
	position: absolute;
	right: 20px;
	bottom: 65px;
	width: 40px;
	height: 40px;
	padding-top: 2px;
	color: #FFF;
	border-radius: 100%;
	background: rgba(0, 0, 0, 0.15);
}

.me .settings:hover {
	background: rgba(0, 0, 0, 0.35);
}

.me .cloud {
	position: absolute;
	right: 20px;
	bottom: 15px;
	width: 40px;
	height: 40px;
	color: #FFF;
	border-radius: 100%;
	background: rgba(0, 0, 0, 0.09);
}

.me .cloud:hover {
	background: rgba(0, 0, 0, 0.35);
}

.me .myinfo {
	position: absolute;
	bottom: 15px;
	font-size: 14px;
	color: #FFF;
}

.myinfo .name {
	font-weight: 600;
	margin-bottom: 5px;
}

.myinfo .phone {
	font-weight: 300;
}

nav button {
	width: 100%;
	height: 45px;
	background: #FFF;
	text-align: left;
	padding-left: 20px;
	color: #666;
}

/* nav {
	float: left;
	width: 100%;
	height: auto;
	max-height: 350px;
	overflow-x: hidden;
	overflow-y: auto;
} */

nav button:hover {
	background: #EEE;
}

nav button > i {
	color: #999;
	float: left;
}

nav button > span {
	display: inline-block;
	margin-top: 5px;
	margin-left: 20px;
	font-weight: 600;
	font-size: 14px;
}

.info {
	position: absolute;
	left: 20px;
	bottom: 15px;
	font-size: 12px;
	color: #666;
}

/* configuration screen */
.config {
	position: absolute;
	width: 50%;
	height: 100vh;
	left: 0px;
	right: -200vw;
	top: 0px;
	margin: auto;
	background: #DDD;
	overflow-x: hidden;
	overflow-y: auto;
	display: block;
	z-index: 520;
	opacity: 0;
}

.confTitle {
	font-size: 24px;
	font-weight: 600;
	color: #444;
	margin: 10px 0px 15px 0px;
}

.configSect {
	float: left;
	width: calc(100% - 60px);
	padding: 15px 30px;
	margin-bottom: 10px;
	background: #FFF;
}

.profile .image {
	width: 140px;
	height: 140px;
	background: #FFF url(http://4.bp.blogspot.com/-BHhUazKytmw/VbCfWPqrOJI/AAAAAAAAB7c/qj6WVX3du-s/s1600/51b91bba5a3fd9b6c8b9c53bc0ab6c65.jpg) no-repeat center;
	background-size: cover;
	border-radius: 100%;
	float: left;
	margin-right: 30px;
}

.side {
	width: auto;
	height: 110px;
	float: none;
	position: relative;
}

.side .name {
	font-size: 18px;
	font-weight: 600;
}

.side .pStatus {
	margin-top: 5px;
	font-size: 14px;
	font-weight: 300;
}

.profile .changePic, .profile .edit {
	width: auto;
	font-size: 16px;
	font-weight: 600;
	background: #419fd9;
	color: #fff;
	border-radius: 4px;
	padding: 10px;
}

.profile .edit {
	margin-left: 10px;
	background: #FFF;
	color: #999;
}

.profile .edit:hover {
	color: #419fd9;
}

.second ul {
	float: none;
	margin-left: -7px;
	list-style-type: none;
}

.second ul li {
	margin: 7px;
}

.second .blue {
	color: #419fd9
}

.second label {
	display: block;
	clear: both;
}

.second .information {
	margin-bottom: 30px;
}

.check {
	position: relative;
	float: left;
	display: block;
	width: 38px;
	height: 14px;
	background: #BBB;
	cursor: pointer;
	border-radius: 15px;
	transition: all 0.2s ease-in-out;
}

.check > .tracer {
	width: 16px;
	height: 16px;
	background: #FFF;
	border: 2px solid #BBB;
	border-radius: 100%;
	float: left;
	margin-top: -3px;
	transition: all 0.2s ease-in-out;
}

#checkNight, #deskNotif, #showSName, #showPreview, #playSounds {
	display: none;
}

.toggleTracer:checked ~ .check {
	background: #419fd9;
}

.toggleTracer:checked ~ .check > .tracer {
	border-color: #419fd9;
	margin-left: 18px;
}

.optionWrapper {
	display: block;
	width: 100%;
	height: 32px;
}

.optionWrapper p {
	float: left;
	margin-top: 3px;
	margin-left: 15px;
	font-size: 14px;
	color: #444;
}

/* dark overlay element */
.overlay {
	position: absolute;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.8);
	z-index: 2;
	display: none;
}

.app-footer{
  display: none;
}


.rightPanel {
	float: left;
	width: calc(100%);
	/* height: 100vh; */
	background: #999;
}

.rightPanel .topBar {
	position: relative;
	width: 100%;
	/* height: 70px; */
	background: #FFF;
}

.leftSide {
	display: inline-block;
	clear: none;
	float: left;
}

.leftSide .chatName {
	float: left;
	margin-left: 30px;
	margin-top: 13px;
	color: #444;
	font-weight: 600;
	cursor: default;
}

.chatName > span {
	font-size: 12px;
	font-weight: 500;
	color: #BBB;
	margin-left: 10px;
}

.leftSide .chatStatus {
	float: left;
	clear: left;
	margin-left: 30px;
	margin-top: 5px;
	color: #419fd9;
	font-weight: 300;
	cursor: default;
}

.rightSide {
	display: inline-block;
	clear: none;
	float: right;
	margin-right: 20px;
}

.tbButton, .otherTools .toolButtons {
	width: 50px;
	height: 50px;
	margin-top: 10px;
	background: #FFF;
	color: blue;
	border-radius: 100%;
    font-size: 30px;
    
}

.tbButton:hover, .otherTools .toolButtons:hover {
	color: green;
}




/* THE CONVERSATION HISTORY CSS */

.convHistory {
	float: left;
	position: relative;
	width: 100%;
	height: calc(100vh - 140px);
	background: #333;
	overflow-x: hidden;
	overflow-y: auto;
}

.userBg {
	background: url("https://images.unsplash.com/photo-1463058837219-41e13a132b7d?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=&bg=") 100% center;
}

.msg {
	position: relative;
	width: auto;
	min-width: 100px;
	max-width: 45%;
	height: auto;
	padding: 25px;
	padding-bottom: 35px;
	margin: 20px 15px;
	margin-bottom: 0px;
	background: #FFF;
	border-radius: 7px;
	clear: both;
}

.msg:nth-last-child(1) {
	margin-bottom: 20px;
}

.msg .timestamp {
	display: block;
	position: absolute;
	right: 10px;
	bottom: 6px;
	color: #AAA;
	user-select: none;
}

.messageReceived {
	float: left;
	background: #FFF;
}

.messageSent {
	float: right;
	background: #effdde;
}

.messageSent > .timestamp, .messageSent > .readStatus {
	bottom: 10px;
	right: 40px;
	color: darkgreen;
	user-select: none;
}

.messageSent > .readStatus {
	position: absolute;
	bottom: 10px;
	right: 12px;
}


/* THE REPLY BAR CSS */

.replyBar {
	width: 100%;
	height: 70px;
	float: left;
	background: #fff;
}

.replyBar .attach {
	width: 70px;
	height: 70px;
  color: #777;
	background: #FFF;
	float: left;
    overflow: hidden;
}

.hiddeninput {
display: none;
}

.replyBar .attach:hover {
  color: #555;
	background: #DDD;
}

.replyBar .d45 {
	transform: rotate(45deg);
	font-size: 32px;
}

.replyBar .replyMessage {
	width: calc(100% - 220px);
	float: left;
	height: 70px;
	padding: 0px 8px;
	font-size: 16px;
}

.replyBar .otherTools {
	float: right;
	width: 120px;
	height: 70px;
}

.emojiBar {
	display: none;
	position: absolute;
	width: 325px;
	height: 200px;
	padding: 10px;
	right: 30px;
	bottom: 80px;
	border: 2px solid #DDD;
	border-radius: 3px;
	background: #FFF;
}

.emoticonType {
	width: 100%;
	height: 50px;
}

.emoticonType button {
	width: 105px;
	height: 36px;
	font-weight: 600;
	color: #555;
	background: none;
}

.emoticonType button:hover {
	color: #FFF;
	background: #419fd9;
}

.emojiList, .stickerList {
	width: 100%;
	height: 150px;
	overflow-x: hidden;
	overflow-y: auto;
}

.emojiList .pick {
	width: 50px;
	height: 50px;
	background: transparent;
	background-repeat: no-repeat;
	background-position: center;
	background-size: 70%;
	transition: all 0.15s ease-in-out;
}

.emojiList .pick:hover {
	background: #DDD;
	background-repeat: no-repeat;
	background-position: center;
	background-size: 70%;
}

.stickerList .pick {
	width: 80px;
	height: 80px;
	background: transparent;
	background-repeat: no-repeat;
	background-position: center;
	background-size: 65%;
	transition: all 0.15s ease-in-out;
}

.stickerList .pick:hover {
	background: #DDD;
	background-repeat: no-repeat;
	background-position: center;
	background-size: 65%;
}


/* hidden, while not complete */
.stickerList {
	display: none;
}

/* CSS FOR THE EMOJI IMAGES, JUST SOME */

#smileface {
	background-image: url(https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/96/grinning-face_1f600.png);
}

#grinningface {
	background-image: url(https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/96/grinning-face-with-smiling-eyes_1f601.png);
}

#tearjoyface {
	background-image: url(https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/96/face-with-tears-of-joy_1f602.png);
}

#rofl {
	background-image: url(https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/96/rolling-on-the-floor-laughing_1f923.png);
}

#somface {
	background-image: url(https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/96/smiling-face-with-open-mouth_1f603.png);
}

#swfface {
	background-image: url(https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/96/smiling-face-with-open-mouth-and-smiling-eyes_1f604.png);
}

/* SOLVING RESPONSIVE DESIGN ISSUES */

@media screen and (max-width: 1180px) {	
	.config {
		width: 60%;
	}
}

@media screen and (max-width: 980px) {
	.config {
		width: 90%;
	}
}

@media screen and (max-width: 840px) {
	.leftPanel {
		width: 40%;
	}
	
	.rightPanel {
		width: calc(100% - 1px);
	}
}

@media screen and (max-width: 640px) {
	body {
		font-size: 14px;
	}
	
	.leftPanel {
		width: 45%;
	}
	
	.rightPanel {
		width: calc(100% - 1px);
	}
	
	.msg {
		width: 90%;
	}
}

@media screen and (max-width: 640px) {
	.leftPanel {
		width: 45%;
	}
	
	.rightPanel {
		width: calc(100% - 1px);
	}
	
	.msg {
		width: auto;
		max-width: 60%;
	}
	
	.profile .changePic, .profile .edit {
		font-size: 14px;
		font-weight: 500;
	}
	
	.profile .edit {
		margin-left: 5px;
	}
}

@media screen and (max-width: 540px) {
	.switchMobile {
		display: block;
	}
	
	.leftPanel, .rightPanel, .menuWrap, .config, .overlay {
		/* display: none; */
	}
}

@media screen and (max-width: 300px) {
	.switchMobile {
		width: calc(220px - 20px);
	}
}


/* Button */

</style>
<section class="mainApp">
	
	
	<div class="rightPanel">
		
		
		<div class="convHistory userBg">
			<!-- CONVERSATION GOES HERE! -->
		@if(!$messages==null)
			@foreach($messages as $msg)
			@if($msg->user_id == $id)
        <div class="msg messageSent">
				  {{$msg->messages}}
				  <span class="timestamp">00:00</span>
			</div>

			@else
			<div class="msg messageReceived">
          		{{$msg->messages}}
          	<span class="timestamp">00:00</span>
      		</div>
			  @endif
      @endforeach
	  @endif
			
			
			 <!-- <div class="msg messageSent">
				Salom, nima xizmat?
				<span class="timestamp">00:01</span>
			</div> -->
		</div>
	
        
		<form action="{{route('chat.post')}}" method="post">
      @csrf
    <div class="replyBar">
            <!-- <button class="attach">
              <label for="fileupload">
                <span class="iconify d45" data-icon="ic:baseline-attach-file" > </span>
                <input type="file"  class="hiddeninput" id="fileupload">
              </label>
      </button> -->
      <input type="text" name="msg" class="replyMessage" placeholder="Type your message..."/>
      <input type="hidden" name="id" class="replyMessage" value="{{$chat}}"/>
      <div class="emojiBar">
        <div class="emoticonType">
        <button id="panelEmoji">Emoji</button>
        <button id="panelStickers">Stickers</button>
        <button id="panelGIFs">GIFs</button>
        </div>

        <!-- Emoji panel -->
        <div class="emojiList">
          <button id="smileface" class="pick">
        </button>
          <button id="grinningface" class="pick"></button>
          <button id="tearjoyface" class="pick"></button>
          <button id="rofl" class="pick"></button>
          <button id="somface" class="pick"></button>
          <button id="swfface" class="pick"></button>
        </div>
        
        <!-- the best part of telegram ever: STICKERS!! -->
        <div class="stickerList">
          <button id="smileface" class="pick">
        </button>
          <button id="grinningface" class="pick"></button>
          <button id="tearjoyface" class="pick"></button>
        </div>
      </div>
      
      <div class="otherTools">
        <button class="toolButtons emoji">
           <span class="iconify" data-icon="fluent:send-24-filled"></span>
        </button>
      </div>
    </div>
  </div>
</form>
</section>

<section class="overlay"></section>

<div class="alerts">
	Trying to reconnect... 
</div>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

@endsection


