@extends('layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Print Reports</h3>
          </div>
          <div class="panel-body">
            <a href="/print/account/tbpd" class="btn btn-warning">Accounts To Be Past Due</a>
            <a href="/print/account/pd" class="btn btn-warning">Accounts Past Due</a>
            <a href="/print/sched" class="btn btn-warning">Schedule of Loan Recievable</a>
            <a href="/print/accounts" class="btn btn-warning">All Accounts</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop