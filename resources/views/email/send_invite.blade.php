<!DOCTYPE html>
<html>
<head>

    <title>{{config('app.name')}}</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    @if (isset($details['subject']) && !empty($details['subject']))
    <p>{{$details['subject']}}</p>
    @endif
    <p>{{ $details['body'] }}</p>
    <br>
    <a href="{{ $details['url'] }}">click here to accept</a>

    <p>Thank you</p>
</body>
</html>
