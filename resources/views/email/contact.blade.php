<!DOCTYPE html>
<html>
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TKDKR7EQ7G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-TKDKR7EQ7G');
</script>

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
