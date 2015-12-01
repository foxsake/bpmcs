@extends('layout')

@section('content')
  <div class="container">
  	@include('flash::message')
  	<h3>{{$acc->member->name()}}</h3>
  	<h4>{{$acc->loan->name}}</h4>
    <table class="table table-bordered table-condensed">
		<tr>
			<th>Date</th>
			<th>Particular</th>
			<th>Ref</th>
			<th>Avaiment</th>
			<th>Payment</th>
			<th>Interest</th>
			<th>Penalty</th>
			<th>Principal</th>
			<th>Total</th>
		</tr>
		@foreach($ledgers as $ledger)
			<tr>
			<td>
				{{$ledger->curDate->toDateString()}}
			</td>
			<td>
				{{$ledger->particulars}}
			</td>
			<td>
				{{$ledger->reference}}
			</td>
			<td>
				{{$ledger->avaiment}}
			</td>
			<td>
				{{$ledger->amountPayed}}
			</td>
			<td>
				{{$ledger->interestDue}}
			</td>
			<td>
				{{$ledger->penaltyDue}}
			</td>
			<td>
				{{$ledger->principal}}
			</td>
			<td>
				{{$ledger->balance}}
			</td>
		</tr>
		@endforeach
	</table>
	<a href="/print/{{$acc->id}}" class="btn btn-warning pull-right">Print</a>
  </div>
@stop