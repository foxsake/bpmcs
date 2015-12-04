@extends('layout')

@section('content')
  <div class="container">
  <table class="table table-striped table-bordered">
  <tr>
    <th class="text-center">Name</th>
    <th class="text-center">Contact#</th>
    <th class="text-center">Email</th>
    <th class="text-center">Address</th>
    <th class="text-center"></th>
  </tr>
    @foreach($appli as $app)
    <tr>
      <td class="text-center">{{$app->name()}}</td>
      <td class="text-center">{{$app->contact}}</td>
      <td class="text-center">{{$app->user->email}}</td>
      <td class="text-center">{{$app->addr}}</td>
      <td class="text-center"><a href="#" class="btn btn-primary">View</a></td>
    </tr>
    @endforeach
    </table>
  </div>
@stop