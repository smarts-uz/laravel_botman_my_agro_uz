@extends('voyager::master')
<link rel="stylesheet" href="/css/chatt.css">
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
@section('content')

<div class="container">
<div class="content container-fluid bootstrap snippets bootdey">

      <div class="row row-broken">
          <div class="col-md-12" style="background-color: lightseagreen; height: 150px;">
            <h1 style="color: white;">{{ $appeal->title }}</h1>
          </div>
        <div class="col-xs-12 chat" style="overflow: ; outline: none;" tabindex="5001">
          <div class="col-inside-lg decor-default">
            <div class="chat-body">
                @foreach ($conversations as $conversation)
                {{-- @dd($conversation); --}}
                @php
                    $user = \App\Models\User::where('id', $conversation->user_id)->first();
                @endphp
                <div class="answer {{ $conversation->user_id == Auth::user()->id ? 'right' : 'left' }}">
                    <div class="avatar">
                      <img src="{{ asset('storage/'.$user->avatar) }}" alt="User name">
                      <div class="status offline"></div>
                    </div>
                    <div class="name">{{ $user->name }}</div>
                    <div class="text">
                        {{ $conversation->text }}
                    </div>
                    <div class="time">{{ date('H:m', strtotime($conversation->created_at)) }}</div>
                  </div>
                @endforeach


              <div class="answer-add" >

              <form action="{{ route('conversation.send', $appeal->id) }}" method="post">
                    @csrf
                        <input name="text" placeholder="Write a message">
                        <input type="submit"><img src="data:image/png;base64,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"  alt="Submit" style="width: 20px; fill: white" />

              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 </div>

<style type="text/css">
body{
    margin-top:20px;
    background:#eee;
}
.row.row-broken {
    padding-bottom: 0;
}
.chat {
    height: calc(100vh - 180px);
}
.decor-default {
    background-color: #ffffff;
}
.chat-users h6 {
    font-size: 20px;
    margin: 0 0 20px;
}
.chat-users .user {
    position: relative;
    padding: 0 0 0 50px;
    display: block;
    cursor: pointer;
    margin: 0 0 20px;
}
.chat-users .user .avatar {
    top: 0;
    left: 0;
}
.chat .avatar {
    width: 40px;
    height: 40px;
    position: absolute;
}
.chat .avatar img {
    display: block;
    border-radius: 20px;
    height: 100%;
}
.chat .avatar .status.off {
    border: 1px solid #5a5a5a;
    background: #ffffff;
}
.chat .avatar .status.online {
    background: #4caf50;
}
.chat .avatar .status.busy {
    background: #ffc107;
}
.chat .avatar .status.offline {
    background: #ed4e6e;
}
.chat-users .user .status {
    bottom: 0;
    left: 28px;
}
.chat .avatar .status {
    width: 10px;
    height: 10px;
    border-radius: 5px;
    position: absolute;
}
.chat-users .user .name {
    font-size: 14px;
    font-weight: bold;
    line-height: 20px;
    white-space: nowrap;
    /* overflow: hidden; */
    text-overflow: ellipsis;
}
.chat-users .user .mood {
    font: 200 14px/20px "Raleway", sans-serif;
    white-space: nowrap;
    /* overflow: hidden; */
    text-overflow: ellipsis;
}

/*****************CHAT BODY *******************/
.chat-body h6 {
    font-size: 20px;
    margin: 0 0 0;
}
.chat-body .answer.left {
    padding: 0 0 10px 58px;
    text-align: left;
    float: left;
}
.chat-body .answer {
    position: relative;
    max-width: 600px;
    /* overflow: hidden; */
    clear: both;
}
.chat-body .answer.left .avatar {
    left: 0;
}
.chat-body .answer .avatar {
    bottom: 36px;
}
.chat .avatar {
    width: 40px;
    height: 40px;
    position: absolute;
}
.chat .avatar img {
    display: block;
    border-radius: 20px;
    height: 100%;
}
.chat-body .answer .name {
    font-size: 14px;
    line-height: 36px;
}
.chat-body .answer.left .avatar .status {
    right: 4px;
}
.chat-body .answer .avatar .status {
    bottom: 0;
}
.chat-body .answer.left .text {
    background: #ebebeb;
    color: #333333;
    border-radius: 8px 8px 8px 0;
}
.chat-body .answer .text {
    padding: 12px;
    font-size: 16px;
    line-height: 26px;
    position: relative;
}
.chat-body .answer.left .text:before {
    left: -30px;
    border-right-color: #ebebeb;
    border-right-width: 12px;
}
.chat-body .answer .text:before {
    content: '';
    display: block;
    position: absolute;
    bottom: 0;
    border: 18px solid transparent;
    border-bottom-width: 0;
}
.chat-body .answer.left .time {
    padding-left: 12px;
    color: #333333;
}
.chat-body .answer .time {
    font-size: 16px;
    line-height: 36px;
    position: relative;
    padding-bottom: 1px;
}
/*RIGHT*/
.chat-body .answer.right {
    padding: 0 58px 10px 0;
    text-align: right;
    float: right;
}

.chat-body .answer.right .avatar {
    right: 0;
}
.chat-body .answer.right .avatar .status {
    left: 4px;
}
.chat-body .answer.right .text {
    background: #7266ba;
    color: #ffffff;
    border-radius: 8px 8px 0 8px;
}
.chat-body .answer.right .text:before {
    right: -30px;
    border-left-color: #7266ba;
    border-left-width: 12px;
}
.chat-body .answer.right .time {
    padding-right: 12px;
    color: #333333;
}

/**************ADD FORM ***************/
.chat-body .answer-add {
    clear: both;
    position: relative;
    margin: 20px -0 -20px;
    padding: 20px;
    background: #22A7F0;
    margin-top: 10px
}
.chat-body .answer-add input {
    border: none;
    background: none;
    display: block;
    width: 100%;
    font-size: 16px;
    line-height: 20px;
    padding: 0;
    color: ##19b5fe;
}
.chat input {
    -webkit-appearance: none;
    border-radius: 0;
}
.chat-body .answer-add .answer-btn-1 {
    background: url("http://91.234.35.26/iwiki-admin/v1.0.0/admin/img/icon-40.png") 50% 50% no-repeat;
    right: 56px;
}
.chat-body .answer-add .answer-btn {
    display: block;
    cursor: pointer;
    width: 36px;
    height: 36px;
    position: absolute;
    top: 50%;
    margin-top: 0;
}
.chat-body .answer-add .answer-btn-2 {
    background: url("http://91.234.35.26/iwiki-admin/v1.0.0/admin/img/icon-41.png") 50% 50% no-repeat;
    right: 20px;
}
.chat-body{
	height: 100%;
	overflow-y: scroll;
	overflow-x: hidden;
}
.answer-add{
	position: fixed;
	bottom: 10px;
  display: flex;
  justify-content: space-between;
}
.chat input::-webkit-input-placeholder {
   color: #fff;
}

.chat input:-moz-placeholder { /* Firefox 18- */
   color: #fff;

}

.chat input::-moz-placeholder {  /* Firefox 19+ */
   color: #fff;
}

.chat input:-ms-input-placeholder {
   color: #fff;
}
.chat input {
    -webkit-appearance: none;
    border-radius: 0;
    padding-top: 100px;
}
.app-footer{
	display: none;
}

</style>

<script type="text/javascript">
$(function(){
    $(".chat").niceScroll();
})
</script>


@endsection

