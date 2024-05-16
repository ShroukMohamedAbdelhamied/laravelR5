<!DOCTYPE html>
<html>
<head>
@php
    $title = "Edit Clients";
@endphp
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
  <body>
  @include('includes.nav')

<div class="container" style="margin-left: 20px ">
  <h2>Edit Client</h2>

<form action="{{ route('updateClients', $client->id) }}" method="POST">
    @csrf
    @method('put')
  <label for="clientname">Client name:</label><br>
  <input type="text" id="clientname" name="clientname" class="form-control" value="{{ $client->clientname }}"><br>
  
  <label for="phone">phone:</label><br>
  <input type="text" id="phone" name="phone" class="form-control" value="{{ $client->phone }}"><br>
  
  <label for="email">email:</label><br>
  <input type="email" id="email" name="email" class="form-control" value="{{ $client->email }}"><br>
  
  <label for="website">website:</label><br>
  <input type="text" id="website" name="website" class="form-control" value="{{ $client->website }}"><br><br>
 
  <input type="submit" class="form-control" value="Submit">
  </form> 
</div>

</body>
</html>