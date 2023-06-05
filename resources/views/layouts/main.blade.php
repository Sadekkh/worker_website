<!doctype html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @yield('styles')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        body {
            background: url('http://www.wallpaperup.com/uploads/wallpapers/2012/10/21/20181/cad2441dd3252cf53f12154412286ba0.jpg');
            padding: 50px;
        }

        #login-dp {
            min-width: 250px;
            padding: 14px 14px 0;
            overflow: hidden;
            background-color: rgba(255, 255, 255, .8);
        }

        #login-dp .help-block {
            font-size: 12px
        }

        #login-dp .bottom {
            background-color: rgba(255, 255, 255, .8);
            border-top: 1px solid #ddd;
            clear: both;
            padding: 14px;
        }

        #login-dp .social-buttons {
            margin: 12px 0
        }

        #login-dp .social-buttons a {
            width: 49%;
        }

        #login-dp .form-group {
            margin-bottom: 10px;
        }

        .btn-fb {
            color: #fff;
            background-color: #3b5998;
        }

        .btn-fb:hover {
            color: #fff;
            background-color: #496ebc
        }

        .btn-tw {
            color: #fff;
            background-color: #55acee;
        }

        .btn-tw:hover {
            color: #fff;
            background-color: #59b5fa;
        }

        @media(max-width:768px) {
            #login-dp {
                background-color: inherit;
                color: #fff;
            }

            #login-dp .bottom {
                background-color: inherit;
                border-top: 0 none;
            }
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
        integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
        crossorigin="anonymous">
</head>

<body dir="rtl">

    <nav class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">العاملات الكادحات</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id="topheader">
                    @can('worker_tra')
                        <li><a href="{{ route('jobs.index') }}">معرض الأعمال</a></li>
                        <li><a href="{{ route('request.create') }}">أعمالي</a></li>
                        <li><a href="{{ route('request.calendar') }}">اليومية</a></li>
                        <li><a href="{{ route('requests.map') }}">الخريطة</a></li>
                    @endcan
                    @can('employer')
                        <li><a href="{{ route('jobs.create') }}">إضافة عمل</a></li>
                        <li><a href="{{ route('request.index') }}">مطالب العمل</a></li>
                        <li><a href="{{ route('transport.index') }}">مطالب السواق</a></li>
                        <li><a href="{{ route('request.create') }}">أعمالي</a></li>
                        <li><a href="{{ route('requests.map') }}">الخريطة</a></li>
                    @endcan
                    @can('admin')
                        <li><a href="{{ route('adminpannel.index') }}">admin</a></li>
                    @endcan
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @guest
                        @if (Route::has('login'))
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>تسجيل الدخول</b> <span
                                        class="caret"></span></a>
                                <ul id="login-dp" class="dropdown-menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                تسجيل الدخول
                                                <form class="form" role="form" method="post"
                                                    action="{{ route('login') }}" id="login-nav">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputEmail2">رقم بطاقة
                                                            التعريف</label>
                                                        <input type="text" class="form-control" id="cin"
                                                            name="cin" placeholder="أدخل الرقم" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputPassword2">كلمة
                                                            المرور</label>
                                                        <input type="password" class="form-control"
                                                            id="exampleInputPassword2" name="password"
                                                            placeholder="أدخل كلمة المرور" required>

                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-block">Sign
                                                            in</button>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> keep me logged-in
                                                        </label>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="bottom text-center">
                                                <a href="{{ route('register') }}"><b>حساب جديد</b></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @else
                        <div class="dropdown">

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                    aria-haspopup="true" aria-expanded="false">
                                    تسجيل الخروج
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        @endguest

                    </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
    </nav>
    <div style="background-color:#ddd;" class="container">
        @yield('content')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
        integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
        crossorigin="anonymous"></script>

    @yield('scripts')
    <script>
        $('#topheader  a').on('click', function() {
            $('#topheader').find('li.active').removeClass('active');
            $(this).parent('li').addClass('active');
        });
    </script>
</body>

</html>
