<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trashed</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

@include('includes.nav')

<div class="container">
  <h2>Trashed Clients</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Client Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Website</th>
        <th>Restore</th>
        <th>Show</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($trashed as $client)
      <tr>
        <td>{{ $client->clientname }}</td>
        <td>{{ $client->phone }}</td>
        <td>{{ $client->email }}</td>
        <td>{{ $client->website }}</td>
        <td><a href="{{ route('restoreClient', $client->id) }}">Restore</a></td>
        <td><a href="{{ route('showClient', $client->id)}}">Show</a></td>
        <td>
          <form action="{{ route('forceDeleteClient')}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" value="{{ $client->id }}" name="id">
            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this client?')">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>