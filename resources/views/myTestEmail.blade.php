<!DOCTYPE html>
<html>
<head>
    <title>AGRO</title>
</head>
<body>

<h1>{{ $details['title'] }}</h1>
<p>{{ $details['body'] }}</p>
<p>Link for Cobinet : https://my.agro.uz/admin</p>

    @foreach($details['files'] as $file)
    <a href='{{url("")."/storage/".$file}}'>FILE</a>
    @endforeach 

<p>Thank you</p>
</body>
</html>
