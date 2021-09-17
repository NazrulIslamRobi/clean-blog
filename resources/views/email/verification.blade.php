<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <h4>Registration Sucessful!</h4>
    <p>Dear {{$user->full_name}}</p>
    <br>
    <p>please click the folloing link to verify your account:</p>
    <a href="{{route('verify.email',$user->email_verification_token)}}">
    {{route('verify.email',$user->email_verification_token)}} 
    
    </a>
    </div>
    <p>Thanks!</p>
</body>
</html>