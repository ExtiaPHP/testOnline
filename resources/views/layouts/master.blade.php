<html>
<head>
    <title>Questionnaire</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{ HTML::style('css/jquery.countdown.css') }}
</head>
<body>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div id="countdown"></div>
    @yield('content')
</div>
</body>

{{ HTML::script('js/jquery-2.2.2.min.js') }}
{{ HTML::script('js/jquery.countdown.js') }}

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    @yield('javascript')
</script>
</html>