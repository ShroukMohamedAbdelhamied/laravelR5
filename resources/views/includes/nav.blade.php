<!-- Start Nav bar -->
<nav class="navbar navbar-inverse">
  
    <div class="container-fluid">
      <!-- Students -->
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Students</a>
      </div>
      <ul class="nav navbar-nav">
        <!-- class="active"-->
        <li><a href="{{ route('addStudent') }}">Add Student</a></li>
        <li><a href="{{ route('Students') }}">Students</a></li>
        <li><a href="{{ route('trashStudent') }}">Trash</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
        @yield('menu')
        @stack('submenu')
        </ul>

       <!-- Clients -->
      <a class="navbar-brand" href="#">Clients</a>
      <ul class="nav navbar-nav">
       <!-- class="active"-->
        <li><a href="{{ route('addClient') }}">Add Client</a></li>
        <li><a href="{{ route('Clients') }}">Clients</a></li>
        <li><a href="{{ route('trashClient') }}">Trash</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>

  </nav>
  <!-- End Nav bar -->



  