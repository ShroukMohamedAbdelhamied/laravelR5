<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show {{ $client->clientName }}</title>
</head>
<body>
    <p><img src="{{ asset('assets/images/' . $client->image) }}" alt=""></p>
    <h1><strong>Client: </strong>{{ $client->clientname }}</h1>
    <hr>
    <h2><strong>Phone: </strong>{{ $client->phone }}</h2>
    <hr>
    <h2><strong>Email: </strong>{{ $client->email }}</h2>
    <hr>
    <h2><strong>Website: </strong>{{ $client->website }}</h2>
    <hr>
    <h2><strong>City: </strong>{{ $client->City }}</h2>
    <hr>
    <h2><strong>Active: </strong>{{ $client->active }}</h2>
    <hr>
    <h2><strong>Image:</strong></h2>
@if ($client->image)
    <img src="{{ asset('assets/images/' . $client->image) }}" alt="Client Image" class="img-thumbnail">
@else
    <span class="text-danger">No valid image available.</span>
@endif
</body>
</html>