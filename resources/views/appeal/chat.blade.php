@extends('voyager::master')
<link rel="stylesheet" href="/css/admin/conversation.css" />


@section('content')

{{-- @dd($totalDuration) --}}

<div class="inputs">
    <section class="msger">
        <div class="titles">{{$appeal->title}}</div>
        <header class="msger-header">

            <div class="msger-header-title">

                <i class="fas fa-comment-alt"></i>
                <h4>SimpleChat</h4>
            </div>
            <div class="msger-header-options">
                <span><i class="fas fa-cog"></i></span>
            </div>
        </header>
        <main class="msger-chat">
            <div class='msg {{ $appeal->user_id == Auth::user()->id ? 'right-msg' : 'left-msg' }} '>
                <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)">
                </div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name">{{ $user }}</div>
                        <div class="msg-info-time">{{ date('H:m', strtotime($appeal->created_at)) }}</div>
                    </div>
                    <div class="msg-text">
                        {{ $appeal->text }}
                    </div>
                </div>
            </div>
            @foreach ($conversations as $conversation)
            {{-- @dd($duration); --}}


            <div class='msg {{ $conversation->user_id == Auth::user()->id ? 'right-msg' : 'left-msg' }} '>
                <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)">
                </div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name">{{ $user }}</div>
                        <div class="msg-info-time">{{ date('H:m', strtotime($conversation->created_at)) }}</div>
                    </div>
                    <div class="msg-text">
                        {{ $conversation->text }}
                    </div>
                </div>
            </div>
            @endforeach


        </main>
        {{-- @if($appeal->is_closed == 0) --}}

        <form action="{{ route('conversation.send', $appeal->id) }}" method="post" class="msger-inputarea">
            @csrf
            <input name="text" type="text" class="msger-input" {{ $appeal->is_closed == 1 ? "disabled" : ""}} required
                placeholder="Enter your message...">
            <button type="submit" required class="msger-send-btn "
                {{ $appeal->is_closed == 1 ? "disabled" : ""}}>Send</button>
        </form>
        {{-- @endif --}}
    </section>
    <div class="right">
        <div class="wrap">
            <div class="block text-center">
                <h2>Информация о заявке</h2>
            </div>
            <div class="block">
                <span>Запрашивающий</span>
                <p>{{ $user }} </p>
            </div>
            <div class="block">
                <span>Область</span>
                <p>{{ $region }}</p>
            </div>
            <div class="block">
                <span>Направления</span>
                <p>{{ $route }}</p>
            </div>
            <div class="block">
                <span>Отправлен</span>
                <p>{{ date('d.m.y (H:m)', strtotime($appeal->created_at)) }}</p>
            </div>
            <div class="block">
                <span>Состояние/Приоритет</span>
                <p>{{ ($appeal->status == 1) ? 'Средняя' : (($appeal->status == 0) ? 'Низкая': 'Високая') }}</p>
            </div>
            @if($appeal->is_closed == 0 && $totalDuration>48)
                <div class="block text-center bloc1">
                    {{-- <form action="{{ route('appeal.close', $appeal) }}" method="POST"> --}}
                    {{-- @csrf --}}
                    <button onclick="askClose()" type="button" class="btn">Закрыть тикет</button>
                    {{-- </form> --}}
                </div>
            @else
                <button type="button" class="btn disabled buttonDis">Закрыть тикет</button>
            @endif
        </div>
    </div>

</div>
@if($totalDuration>48)
<div class="wrap1">
    @if($appeal->is_closed == 0)
    <div class="block text-center bloc1">
        <form action="{{ route('appeal.close', $appeal) }}" method="POST">
            @csrf
            <button type="submit" class="btn">Закрыть тикет</button>
        </form>
    </div>
    @else
    <button type="button" class="btn disabled buttonDis">Закрыть тикет</button>
    @endif
</div>
<form id="submit"  action="{{route('conversation.rating',$appeal)}}" method="POST">
    @csrf
    <div class="stars">
        <input type="radio" id="star1" name="rating" value="1" /><input type="radio" id="star2" name="rating"
            value="2" /><input type="radio" id="star3" name="rating" value="3" /><input type="radio" id="star4"
            name="rating" value="4" /><input type="radio" id="star5" name="rating" value="5" />

        <label for="star1" aria-label="Banana">1 star</label><label for="star2">2 stars</label><label for="star3">3
            stars</label><label for="star4">4 stars</label><label for="star5">5 stars</label>
    </div>
</form>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="{{ asset('js/admin/conversation.js') }}"></script>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
@endsection
