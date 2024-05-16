<!DOCTYPE html>
<html>
<head>
@php
    $title = "Clients";
@endphp
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
  <body>
  @include('includes.nav')

<div class="container" style="margin-left: 20px ">
  <h2>Insert Client</h2>

<form action="{{ route('insertClient') }}" method="POST">
    @csrf
  <label for="clientname">Client name:</label><br>

  <p style= "color: red">
  @error('clientname')
     {{ $message }}
  @enderror
</p>
  <input type="text"  name="clientname" value=""><br>

  <label for="phone">phone:</label><br>
  <p style= "color: red">
  @error('phone')
     {{ $message }}
  @enderror
</p>
  <input type="text"  name="phone" value=""><br>
  
  <label for="email">email:</label><br>
  <p style= "color: red">
  @error('email')
     {{ $message }}
  @enderror
</p>
  <input type="email"  name="email" value=""><br>
  
  <label for="website">website:</label><br>
  <input type="text"  name="website" value=""><br><br>
 
  <input type="submit" value="Submit">
  </form> 
</div>

</body>
</html>