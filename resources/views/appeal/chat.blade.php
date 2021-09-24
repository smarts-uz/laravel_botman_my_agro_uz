@extends('voyager::master')
<link rel="stylesheet" href="/css/admin/conversation.css" />


@section('content')

{{-- @dd($totalDuration) --}}
<div class="inputs">
    <section class="msger">
        <div class="titles">@lang('site.title')</div>

        <main class="msger-chat">
            <div class='msg {{ $appeal->user_id == Auth::user()->id ? 'right-msg' : 'left-msg' }} '>
                <div class="msg-img" style="background-image: url({{ asset('storage/'. Auth::user()->avatar)}})">
                </div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name">{{ $user }}</div>
                        <div class="msg-info-time">{{date_format($appeal->created_at, 'G:i a')  }}</div>
                    </div>
                    <div class="msg-text">
                        {{ $appeal->text }}
                        <div>
                        @forelse(json_decode($appeal->images) as $img)
                            <a href="{{asset('storage/' . $img)}}">user file</a> <br/>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>




            @foreach ($conversations as $conversation)
            {{-- @dd($duration); --}}

            @php
                $appeal_user = \App\Models\User::where('id', $conversation->user_id)->first();

            @endphp

            <div class='msg {{ $conversation->user_id == Auth::user()->id ? 'right-msg' : 'left-msg' }} '>
                <div class="msg-img" style="background-image: url({{ asset('storage/'. Auth::user()->avatar)}})">
                </div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name">{{ $appeal_user->name }}</div>
                        <div class="msg-info-time">{{ date_format($conversation->created_at, 'G:i a') }}</div>
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
            <input name="text" type="text" class="msger-input" {{ $appeal->status == 3 ? "disabled" : ""}} required
                placeholder="Enter your message...">
            <button type="submit" required class="msger-send-btn "
                {{ $appeal->status == 3 ? "disabled" : ""}}>@lang('site.send_button')</button>
        </form>
        {{-- @endif --}}
    </section>
    <div class="right">
        <div class="wrap">
            <div class="block text-center">
                <h2>@lang('site.info')</h2>
            </div>
            <div class="block">
                <span>@lang('site.appealer')</span>
                <p>{{ $user }} </p>
            </div>
            <div class="block">
                <span>@lang('site.region')</span>
                <p>{{ $region }}</p>
            </div>
            <div class="block">
                <span>@lang('site.route')</span>
                <p>{{ $route }}</p>
            </div>
            <div class="block">
                <span>@lang('site.sent')</span>
                <p>{{ date('d.m.y (H:m)', strtotime($appeal->created_at)) }}</p>
            </div>
            <div class="block">
                <span>@lang('site.status')</span>
                <p>{{ ($appeal->status == 1) ? 'Средняя' : (($appeal->status == 0) ? 'Низкая': 'Високая') }}</p>
            </div>

            @if( $appeal->status != 3 && (Auth::user()->hasRole('user') ||  $totalDuration>48))
                <div class="block text-center bloc1">
                    {{-- <form action="{{ route('appeal.close', $appeal) }}" method="POST"> --}}
                    {{-- @csrf --}}
                    <button onclick="askClose()" type="button" class="btn">Закрыть тикет</button>
                    {{-- </form> --}}
                </div>
            @else
                <button type="button" class="btn disabled buttonDis">@lang('site.close')</button>
            @endif
        </div>
    </div>

</div>
@if( $appeal->status != 3 && (Auth::user()->hasRole('user') ||  $totalDuration>48))
<div class="wrap1">
    @if($appeal->status == 1)
    <div class="block text-center bloc1">
        <form action="{{ route('appeal.close', $appeal) }}" method="POST">
            @csrf
            <button onclick="askClose()" type="button" class="btn">@lang('site.close')</button>
        </form>
    </div>
    @else
    <button type="button" class="btn disabled buttonDis">@lang('site.close')</button>
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
