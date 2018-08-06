<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>

<div class="container">
    @include('partials.nav')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            @if(Session::has('flash_message_important'))
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif
        </div>
    @endif
    @yield('content')

</div>
    <script src="{{asset('js/app.js')}}"></script>

    @yield('footer')
</body>
</html>