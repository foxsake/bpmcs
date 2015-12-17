@extends('layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Print Reports</h3>
          </div>
          <div class="panel-body text-center">
            <a href="/print/account/tbpd" class="btn btn-warning">Accounts To Be Past Due</a>
            <a href="/print/account/pd" class="btn btn-warning">Accounts Past Due</a>
            <a href="/print/sched" class="btn btn-warning">Schedule of Loan Recievable</a>
            <a href="/print/accounts" class="btn btn-warning">All Accounts</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">   
      <div class="col-md-8 col-md-offset-2">
      <h2 class="text-center">Accounts To Be Passed Due (31days or less)</h2>
        @if(count($accstbp) > 0)
    <table class="table table-bordered table-condensed">
    <tr>
      <th class="text-center">Borrower's Name</th>
      <th class="text-center">Loan</th>
      <th class="text-center">Granted</th>
      <th class="text-center">Terms</th>
      <th class="text-center">Due</th>
      <th class="text-center">#Days</th>
      <th class="text-center">Amount</th>
      <th></th>
    </tr>
    @foreach($accstbp as $acc)
      <tr>
      <td class="text-left">
        {{$acc->member->name()}}
      </td>
      <td class="text-center">
        {{$acc->loan->name}}
      </td>
      <td class="text-center">
        {{$acc->dateGranted->format('M j, Y')}}
      </td>
      <td class="text-center">
        {{$acc->terms}}
      </td>
      <td class="text-center">
        {{$acc->dueDate->format('M j, Y')}}
      </td>
      <td class="text-center">
        {{ \Carbon\Carbon::now()->diffInDays($acc->dueDate) }}
      </td>
      <td class="text-right">
        {{number_format($acc->balance,2)}}
      </td>
      <td class="text-center">
        <a href="/admin/accounts/{{$acc->id}}" class="btn btn-primary">View</a>
      </td>
    </tr>
    @endforeach
  </table>
  @else
    <h3 class="text-danger text-center">None Found.</h3>
  @endif
      </div>
    </div>
    <div class="row">   
      <div class="col-md-8 col-md-offset-2">
      <h2 class="text-center">Accounts Passed Due</h2>
        @if(count($accspd) > 0)
    <table class="table table-bordered table-condensed">
    <tr>
      <th class="text-center">Borrower's Name</th>
      <th class="text-center">Loan</th>
      <th class="text-center">Granted</th>
      <th class="text-center">Terms</th>
      <th class="text-center">Due</th>
      <th class="text-center">#Days</th>
      <th class="text-center">Amount</th>
      <th></th>
    </tr>
    @foreach($accspd as $acc)
      <tr>
      <td class="text-left">
        {{$acc->member->name()}}
      </td>
      <td class="text-center">
        {{$acc->loan->name}}
      </td>
      <td class="text-center">
        {{$acc->dateGranted->format('M j, Y')}}
      </td>
      <td class="text-center">
        {{$acc->terms}}
      </td>
      <td class="text-center">
        {{$acc->dueDate->format('M j, Y')}}
      </td>
      <td class="text-center">
        {{ \Carbon\Carbon::now()->diffInDays($acc->dueDate) }}
      </td>
      <td class="text-right">
        {{number_format($acc->balance,2)}}
      </td>
      <td class="text-center">
        <a href="/admin/accounts/{{$acc->id}}" class="btn btn-primary">View</a>
      </td>
    </tr>
    @endforeach
  </table>
  @else
    <h3 class="text-danger text-center">None Found.</h3>
  @endif
      </div>
    </div>
  </div>
@stop