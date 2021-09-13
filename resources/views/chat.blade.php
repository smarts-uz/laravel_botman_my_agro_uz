@extends('voyager::master')
<link rel="stylesheet" href="/css/chatt.css">
@section('content')

<div class="chat">
  <div class="chat-title">
    <h1>Fabio Ottaviani</h1>
    <h2>Supah</h2>
    <figure class="avatar">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/156381/profile/profile-80.jpg" /></figure>
  </div>
  <div class="messages">
    <div class="messages-content"></div>
  </div>
  <div class="message-box">
    <textarea type="text" class="message-input" placeholder="Type message..."></textarea>
    <button type="submit" class="message-submit">Send</button>
  </div>

</div>
<div class="bg"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/js/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js">
<script src="/js/chat.js"></script>
@endsection