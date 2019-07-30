<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            <img width="100" height="auto" src="{{ $result['icon_url'] }}" alt="">
            <h3>{{ $result['app_name'] }}</h3>
            <div class="links">
                @foreach ($result['screenshot_urls'] as $screenshot)
                    <img width="60" height="auto" src="{{ $screenshot }}" alt="">
                @endforeach
            </div>
            <p>{!! $result['description'] !!}</p>
        </div>
        <ul class="list-group">
            <li class="list-group-item">{{ $result['genre_id'] }}</li>
            <li class="list-group-item">{{ $result['status_date'] }}</li>
            <li class="list-group-item">{{ $result['downloads'] }}</li>
            <li class="list-group-item">{{ date("y-m-d", $result['status_unix_timestamp']) }}</li>
            <li class="list-group-item">{{ $result['bundle_id'] }}</li>
            <li class="list-group-item">{{ $result['all_rating'] }}</li>
            <li class="list-group-item">{{ $result['release_date'] }}</li>
            <li class="list-group-item">{{ $result['all_rating_count'] }}</li>
        </ul>
    </div>
</div>
</body>
</html>
