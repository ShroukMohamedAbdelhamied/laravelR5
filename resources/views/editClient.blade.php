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

  <form action="{{ route('updateClients', $client->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
  <label for="clientname">Client name:</label><br>
  <p style= "color: red">
  @error('clientname')
     {{ $message }}
  @enderror
</p>
  <input type="text" id="clientname" name="clientname" class="form-control" placeholder="Client Name" value="{{ $client->clientname }}"><br>
  
  <label for="phone">phone:</label><br>
  <p style= "color: red">
  @error('phone')
     {{ $message }}
  @enderror
</p>
  <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" value="{{ $client->phone }}"><br>
  
  <label for="email">email:</label><br>
  <p style= "color: red">
  @error('email')
     {{ $message }}
  @enderror
</p>
  <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ $client->email }}"><br>
  
  <label for="website">website:</label><br>
  <p style= "color: red">
  @error('website')
     {{ $message }}
  @enderror
</p>
  <input type="text" id="website" name="website" class="form-control"  placeholder="Website" value="{{ $client->website }}"><br><br>
 
  <div class="form-group">
  <label for="City">City</label>
  <select name="City" id="City" class="form-control">
    <option value="">Please Select City</option>
    <option value="Cairo" {{ old('City', $client->City) == 'Cairo' ? 'selected' : '' }}>Cairo</option>
    <option value="Giza" {{ old('City', $client->City) == 'Giza' ? 'selected' : '' }}>Giza</option>
    <option value="Alex" {{ old('City', $client->City) == 'Alex' ? 'selected' : '' }}>Alex</option>
  </select>
</div>

<div class="form-group">
  <label for="active">Active:</label>
  <input type="checkbox" id="active" name="active" class="form-control" {{ old('active', $client->active) ? 'checked' : '' }}>
</div>

<label for="image">Image</label><br>
<p><img src="{{ asset('assets/images/' . $client->image) }}" alt="Client Image" class="img-thumbnail"></p>
@if($errors->has('image'))
    <p style="color: red">{{ $errors->first('image') }}</p>
@endif
<input type="file" id="image" name="image" class="form-control">
<br>
    <input type="submit" value="Submit">
  </form> 
</div>

</body>
</html>