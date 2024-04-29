<!DOCTYPE html>
<html>
<body>
<h2>HTML Forms</h2>
<form action="{{ route('insertClient') }}" method="POST">
    @csrf
  <label for="clientname">Client name:</label><br>
  <input type="text"  name="clientname" value=""><br>
  
  <label for="phone">phone:</label><br>
  <input type="text"  name="phone" value=""><br>
  
  <label for="email">email:</label><br>
  <input type="email"  name="email" value=""><br>
  
  <label for="website">website:</label><br>
  <input type="text"  name="website" value=""><br><br>
 
  <input type="submit" value="Submit">
</form> 
<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>
</body>
</html>