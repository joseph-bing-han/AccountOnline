<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('global.lbl_app_title')</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src={{ asset("js/html5shiv.min.js") }}></script>
    <script src={{ asset("js/respond.min.js") }}></script>

    <style type="text/css">
        body {
            padding-top: 70px;
            padding-bottom: 50px;
        }

        i.icon {
            font-size: 28px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-top" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="padding: 0px;" href="/"><img width="48" height="48"
                                                                        src="{{ asset('img/AccountOnline.png') }}"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-top">
            <ul class="nav navbar-nav">
                @if(Auth::check())
                    @foreach(trans('global.list_modules') as $key=>$value)
                        <li class="{{ $key ==  Request::get('module') ? 'active':'' }}"><a
                                    href=" {{ $key }}">
                                <i class="{{ $value['ico'] }}"></i> {{ $value['name'] }}
                            </a></li>
                    @endforeach
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @unless(Auth::check())
                    <li class="{{ Request::getPathInfo() == '/login' ? 'active' : '' }}"><a
                                href="{{ asset('login') }}">
                            <span class="glyphicon glyphicon-log-in" aria-hidden="true">
                            </span> @lang('global.btn_login')
                        </a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false" data-toggle="tooltip" data-placement="bottom"
                           title="@lang('global.tip_current_user', ['name'=> Auth::getUser()['name']])">
                            <span class="glyphicon glyphicon-user">
                            </span> @lang('global.lbl_app_current_user', ['name'=> Auth::getUser()['name']])
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ asset('user') }}/{{ Auth::getUser()['id'] }}">
                                    <span class="glyphicon glyphicon-cog"
                                          aria-hidden="true"> @lang('global.lbl_app_setting')</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a onclick="$('#app_logout').submit(); return false;" href="#">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true">
                                    @lang('global.btn_logout')
                                </a>
                                <form method="POST" action="{{ asset("logout") }}" id="app_logout">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endunless
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid" style="min-height:85vh">
    <div class="row">
        @section('sidebar')
            <div class="col-xs-2 col-sm-2 col-md-1">
                <ul class="nav nav-list">
                    <li class="nav-header">
                        @if(isset(trans('global.list_modules')[Request::get('module')]))
                            <h4>{{ trans('global.list_modules')[Request::get('module')]['name'] }}</h4>
                        @endif
                    </li>
                    <li class="active"><a href="#">
                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> List</a></li>
                </ul>
            </div>
        @show
        @section('content')
            <div class="col-xs-10 col-sm-10 col-md-11">
            </div>
        @show

    </div>
</div>
<hr class="divider">
<footer>
    <p class="text-center">@lang('global.lbl_app_copyright')</p>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>