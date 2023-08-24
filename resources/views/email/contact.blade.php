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

    <p>Thank you</p>
</body>
</html>
