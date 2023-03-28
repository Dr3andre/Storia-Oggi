<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>  
    <h1>Buongiorno Amministratore</h1>
    <h3>Hai un nuovo messaggio da {{$contact->name}}</h3>
    <h5>Messaggio:<p>{{$contact->message}}</p></h5>
    
    <h5>Ruolo:<p>{{$contact->role}}</p></h5>
</body>
</html>