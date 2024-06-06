@extends('layout.main')

@section('menu')
<li><a href="/">Home page</a></li>
@endsection

@push('submenu')
<li><a href="/">test page</a></li>
@endpush

@prepend('submenu')
<li><a href="/">test page 4</a></li>

@endprepend
