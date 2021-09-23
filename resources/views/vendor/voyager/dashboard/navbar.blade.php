<nav class="navbar navbar-default navbar-fixed-top navbar-top">

    <div class="container-fluid">

        <div class="navbar-header">
            <button class="hamburger btn-link">
                <span class="hamburger-inner"></span>
            </button>
            @section('breadcrumbs')
            <ol class="breadcrumb hidden-xs">
                @php
                $segments = array_filter(explode('/', str_replace(route('voyager.dashboard'), '', Request::url())));
                $url = route('voyager.dashboard');
                @endphp
                @if(count($segments) == 0)
                    <li class="active"><i class="voyager-boat"></i> @lang('generic.dashboard')</li>
                @else
                    <li class="active">
                        <a href="{{ route('voyager.dashboard')}}"><i class="voyager-boat"></i> @lang('generic.dashboard')</a>
                    </li>
                    @foreach ($segments as $segment)
                        @php
                        $url .= '/'.$segment;
                        @endphp
                        @if ($loop->last)
                            <li>{{ ucfirst(urldecode($segment)) }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}">{{ ucfirst(urldecode($segment)) }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ol>
            @show

        </div>

        <ul class="nav navbar-nav @if (@lang('generic.is_rtl') == 'true') navbar-left @else navbar-right @endif">
            {{-- lang selector --}}
            {{-- <li style="margin-top: 20px;">
                <select class="selectLang" data-width="fit" style="border: none; padding: 5px 2px;border-radius: 2px">
                    <option>English</option>
                    <option>Russian</option>
                    <option>Uzbek</option>
                </select>
            </li> --}}
            <li>
                {{-- @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <option><a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </option>
                @endforeach
                </select> --}}
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown"><span class="iconify" data-icon="eva:arrow-ios-downward-outline"></span>
                    {{-- @lang('site.lang')</a> --}}
                    <div class="dropdown-menu">
                        <a href="/uz/admin" class="dropdown-item">UZ</a>
                        <a href="/ru/admin" class="dropdown-item">RU</a>
                        <a href="/en/admin" class="dropdown-item">EN</a>
                    </div>
                </div>
            </li>

            {{-- /lang selector --}}

            <li class="dropdown profile">

                <a href="#" class="text-right dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-expanded="false"><img src="{{ $user_avatar }}" class="profile-img"> <span
                            class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-animated">
                    <li class="profile-img">
                        <img src="{{ $user_avatar }}" class="profile-img">
                        <div class="profile-body">
                            <h5>{{ Auth::user()->name }}</h5>
                            <h6>{{ Auth::user()->email }}</h6>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <?php $nav_items = config('voyager.dashboard.navbar_items'); ?>
                    @if(is_array($nav_items) && !empty($nav_items))
                    @foreach($nav_items as $name => $item)
                    <li {!! isset($item['classes']) && !empty($item['classes']) ? 'class="'.$item['classes'].'"' : '' !!}>
                        @if(isset($item['route']) && $item['route'] == 'voyager.logout')
                        <form action="{{ route('voyager.logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-block">
                                @if(isset($item['icon_class']) && !empty($item['icon_class']))
                                <i class="{!! $item['icon_class'] !!}"></i>
                                @endif
                                {{__($name)}}
                            </button>
                        </form>
                        @else
                        <a href="{{ isset($item['route']) && Route::has($item['route']) ? route($item['route']) : (isset($item['route']) ? $item['route'] : '#') }}" {!! isset($item['target_blank']) && $item['target_blank'] ? 'target="_blank"' : '' !!}>
                            @if(isset($item['icon_class']) && !empty($item['icon_class']))
                            <i class="{!! $item['icon_class'] !!}"></i>
                            @endif
                            {{__($name)}}
                        </a>
                        @endif
                    </li>
                    @endforeach
                    @endif
                </ul>
            </li>
        </ul>

    </div>
</nav>
