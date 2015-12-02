@extends('layout')

@section('content')
  <div class="container">
  <a href="/account/create" class="btn btn-primary">Apply Loan</a>
    <table class="table table-bordered table-condensed">
    <tr>
      <th class="text-center">Member</th>
      <th class="text-center">Loan</th>
      <th class="text-center">Terms</th>
      <th class="text-center">Amount Granted</th>
      <th class="text-center">Date Granted</th>
      <th class="text-center">Due</th>
      <th class="text-center">Co-maker</th>
      {{--<th>Balance</th>--}}
      <th></th>
    </tr>
    @foreach($accs as $acc)
      <tr>
      <td class="text-center">
        {{$acc->member->name()}}
      </td>
      <td class="text-center">
        {{$acc->loan->name}}
      </td>
      <td class="text-center">
        {{$acc->terms}}
      </td>
      <td class="text-right">
        {{number_format($acc->amountGranted,2)}}
      </td>
      <td class="text-center">
        {{$acc->dateGranted->toDateString()}}
      </td>
      <td class="text-center">
        {{Carbon\Carbon::now()->diffForHumans($acc->dueDate,true)}}
      </td>
      <td class="text-center">
        {{$acc->comaker}}
      </td>
      {{--<td>{{$acc->balance}}</td>--}}
      <td>
        <a href="/account/{{$acc->id}}" class="btn btn-primary">View</a>
      </td>
    </tr>
    @endforeach
  </table>
  </div>
@stop