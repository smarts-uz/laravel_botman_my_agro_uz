@extends('voyager::master')
<link rel="stylesheet" href="/css/chatt.css">
@section('content')
    <div class="main-container">
      <div class="head-container">
        <h1>• Mark Zuckerberg</h1>
        <a href="#" class="btn"
          ><img src="https://svgshare.com/i/Knn.svg" alt="close" class="delete"
        /></a>
      </div>

      <div class="message-container">
        <h3><span class="date">Today</span></h3>
        <div class="sent">
          <h5 class="hour">10:53</h5>
          <p class="sent-bubble">
            Hi, Mark! I made a new design for Messenger App.
          </p>
        </div>
        <div class="received">
          <h5 class="hour">10:57</h5>
          <p class="received-bubble">
            Yo! Send it to my assistant and we'll review it during the year.
          </p>
        </div>
        <div class="sent">
          <h5 class="hour">11:03</h5>
          <p class="sent-bubble">But Mark...</p>
        </div>
        <div class="blocked">
          <h5 class="hour">11:05</h5>
          <p class="blocked-bubble">You were blocked by the user</p>
        </div>
      </div>

      <div class="input-container">
        <input type="text" placeholder="Enter your message" />
        <a href="#" class="btn">Send</a>
      </div>
    </div>
@endsection