@extends('layout')

@section('content')
  <div class="container">
    <table class="table table-bordered">
      <tr>
        <td><th>Account</th></td>
        <td><th>Granted</th></td>
        <td><th>Term</th></td>
        <td><th>Due</th></td>
        <td><th>Payment</th></td>
        <td><th>Amount</th></td>
        <td><th>Rate</th></td>
        <td><th># of Days</th></td>
        <td><th>Interest Due</th></td>
        <td><th>Penalty</th></td>
        <td><th>Total</th></td>
      </tr>
      @foreach($accs as $acc)

      @endforeach
    </table>
  </div>
@stop