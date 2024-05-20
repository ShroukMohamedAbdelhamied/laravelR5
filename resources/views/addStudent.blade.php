<!DOCTYPE html>
<html>
<head>
<?php 
  $title = "Students";
   ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includes.nav')

<div class="container" style="margin-left: 20px ">
<h2>Insert Student</h2>

<form action="{{ route('insertStudent') }}" method="POST">
      @csrf
  <label for="studentName">Student name:</label><br>
  <p style= "color: red">
  @error('studentName')
     {{ $message }}
  @enderror
</p>
  <input type="text" id="studentName" name="studentName" placeholder="Student Name" value="{{ old('studentName') }}"><br>
  <br>
  <label for="age">Age:</label><br>
  <p style= "color: red">
  @error('age')
     {{ $message }}
  @enderror
</p>
  <input type="text" id="age" name="age" placeholder="Age" value="{{ old('age') }}"><br><br>

  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>