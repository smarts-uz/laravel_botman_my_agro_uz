<!DOCTYPE html>
<html>
<head>
    <title>AGRO</title>
</head>
<body>

@php
if(json_decode(Auth::user()->settings)!=null){ 
            $lang = json_decode(Auth::user()->settings)->locale; 
          } else  
          $lang = app()->getLocale();
@phpend

<h1>Mavzu : <span>{{ $details['title'] }}</span></h1>
<h1>Murojaat matni</h1>
<p>{{ $details['body'] }}</p>
<p>Link for Cabinet : https://my.agro.uz/admin</p>
    
<p>Thank you</p>
</body>
</html>
