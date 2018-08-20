@extends('layout')

@section('content')
  <div class="card">
    <div class="card-header">
      I'm feeling like...
    </div>
    <div class="card-body">
      <h5 class="card-title">Gifonize yourself!</h5>
      <p class="card-text">Choose a gif that represents your feelings of the moment.</p>
      <input type='text' class='form-control' placeholder='Search...'>

      <div class='gif-holder text-center'>
        <img class='py-1' src='http://placehold.it/320x240'>
        <img class='py-1' src='http://placehold.it/320x240'>
        <img class='py-1' src='http://placehold.it/320x240'>
        <img class='py-1' src='http://placehold.it/320x240'>
      </div>
    </div>
  </div>
@endsection