@extends('voyager::master')
@section('content')
<link href="{{ asset('css/conversation.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
<script src="{{ asset('js/conversation.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.0/jquery.nicescroll.min.js" integrity="sha512-UNhXgGfBNK/HX/XNqxbToByWCenHAQRgJxcpXt5eE8BytOVON5xcNm4BSSYBYV0NwNm7EjEghcpKhqKKM792zA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container">
<div class="content container-fluid bootstrap snippets bootdey">
      <div class="row row-broken">

        <div class="col-sm-9 col-xs-12 chat" style="overflow: hidden; outline: none;" tabindex="5001">
          <div class="col-inside-lg decor-default">
            <div class="chat-body">
              <h6>Mini Chat</h6>
              <div class="answer left">
                <div class="avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                  <div class="status offline"></div>
                </div>
                <div class="name">Alexander Herthic</div>
                <div class="text">
                  Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adiping elit
                </div>
                <div class="time">5 min ago</div>
              </div>
              <div class="answer right">
                <div class="avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                  <div class="status offline"></div>
                </div>
                <div class="name">Alexander Herthic</div>
                <div class="text">
                  Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adiping elit
                </div>
                <div class="time">5 min ago</div>
              </div>
              <div class="answer left">
                <div class="avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                  <div class="status online"></div>
                </div>
                <div class="name">Alexander Herthic</div>
                <div class="text">
                  ...
                </div>
                <div class="time">5 min ago</div>
              </div>
              <div class="answer right">
                <div class="avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                  <div class="status busy"></div>
                </div>
                <div class="name">Alexander Herthic</div>
                <div class="text">
                  It is a long established fact that a reader will be. Thanks Mate!
                </div>
                <div class="time">5 min ago</div>
              </div>
              <div class="answer right">
                <div class="avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                  <div class="status off"></div>
                </div>
                <div class="name">Alexander Herthic</div>
                <div class="text">
                  It is a long established fact that a reader will be. Thanks Mate!
                </div>
                <div class="time">5 min ago</div>
              </div>
              <div class="answer left">
                <div class="avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                  <div class="status offline"></div>
                </div>
                <div class="name">Alexander Herthic</div>
                <div class="text">
                  Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adiping elit
                </div>
                <div class="time">5 min ago</div>
              </div>
              <div class="answer right">
                <div class="avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                  <div class="status offline"></div>
                </div>
                <div class="name">Alexander Herthic</div>
                <div class="text">
                  Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adiping elit
                </div>
                <div class="time">5 min ago</div>
              </div>
              <div class="answer left">
                <div class="avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                  <div class="status online"></div>
                </div>
                <div class="name">Alexander Herthic</div>
                <div class="text">
                  ...
                </div>
                <div class="time">5 min ago</div>
              </div>
              <div class="answer right">
                <div class="avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                  <div class="status busy"></div>
                </div>
                <div class="name">Alexander Herthic</div>
                <div class="text">
                  It is a long established fact that a reader will be. Thanks Mate!
                </div>
                <div class="time">5 min ago</div>
              </div>
              <div class="answer right">
                <div class="avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                  <div class="status off"></div>
                </div>
                <div class="name">Alexander Herthic</div>
                <div class="text">
                  It is a long established fact that a reader will be. Thanks Mate!
                </div>
                <div class="time">5 min ago</div>
              </div>
              <div class="answer-add">
                <input placeholder="Write a message">
                <span class="answer-btn answer-btn-1"></span>
                <span class="answer-btn answer-btn-2"></span>
              </div>
            </div>
          </div>

        </div>
        <div class="col-sm-3 ks-info ks-messenger__info">
            <div class="ks-header">
                User Info
            </div>
            <div class="ks-body">
                <div class="ks-item ks-user">
                    <span class="ks-avatar ks-online">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="36" height="36" class="rounded-circle">
                    </span>
                    <span class="ks-name">
                        Lauren Sandoval
                    </span>
                </div>

                <div class="ks-item">
                    <div class="ks-name">Username</div>
                    <div class="ks-text">
                        @lauren.sandoval
                    </div>
                </div>
                <div class="ks-item">
                    <div class="ks-name">Email</div>
                    <div class="ks-text">
                        lauren.sandoval@example.com
                    </div>
                </div>
                <div class="ks-item">
                    <div class="ks-name">Phone Number</div>
                    <div class="ks-text">
                        +1(555) 555-555
                    </div>
                </div>
            </div>
            <div class="ks-footer">
                <div class="ks-item">
                    <div class="ks-name">Created</div>
                    <div class="ks-text">
                        Febriary 17, 2016 at 11:38 PM
                    </div>
                </div>
                <div class="ks-item">
                    <div class="ks-name">Last Activity</div>
                    <div class="ks-text">
                        1 minute ago
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
 </div>
@endsection
