@extends('layout')

@section('content')
  <div class="container">
  {{--<a href="/admin/loans/create" class="btn btn-primary">Add Loan</a>--}}
  <table class="table table-striped table-bordered">
  <tr>
    <th class="text-center">Loan Name</th>
    <th class="text-center">Interest Rate</th>
    <th class="text-center">Service Fee</th>
    <th class="text-center">Penalty</th>
    <th class="text-center"></th>
  </tr>
    @foreach($loans as $loan)
    <tr>
      <td class="text-center">{{$loan->name}}</td>
      <td class="text-center">{{$loan->intRate*100 . '%'}}</td>
      <td class="text-center">{{$loan->sFee*100 . '%'}}</td>
      <td class="text-center">{{$loan->penalty*100 . '%'}}</td>
      <td class="text-center"><a href="/admin/loans/{{$loan->id}}/edit/" class="btn btn-warning">Edit</a></td>
    </tr>
    @endforeach
    </table>
  </div>
@stop