<!DOCTYPE html>
<html>
<head>
    <title>AGRO</title>
</head>
<body>

<h1>{{ $details['title'] }}</h1>
<p>{{ $details['body'] }}</p>
<p>Link for Cabinet : https://my.agro.uz/admin</p>

    <!-- @forelse($details['files'] as $file)
    <a href='{{url("")."/storage/".$file}}'>{{ pathinfo($file, PATHINFO_BASENAME) }}</a> <br/>
    @endforeach -->

<p>Thank you</p>
</body>
</html>
