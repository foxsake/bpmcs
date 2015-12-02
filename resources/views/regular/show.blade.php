@extends('layout')

@section('content')
  <div class="container">
  	@include('flash::message')
  	<h3>Name of Borrower: {{$acc->member->name()}}</h3>
  	<h4>Loan Type: {{$acc->loan->name}}</h4>
    <table class="table table-bordered table-condensed">
		<tr>
			<th class="text-center">Date</th>
			<th class="text-center">Particular</th>
			<th class="text-center">Ref</th>
			<th class="text-center">Avaiment</th>
			<th class="text-center">Payment</th>
			<th class="text-center">Interest</th>
			<th class="text-center">Penalty</th>
			<th class="text-center">Principal</th>
			<th class="text-center">Total</th>
		</tr>
		@foreach($ledgers as $ledger)
			<tr>
			<td class="text-center">
				{{$ledger->curDate->toDateString()}}
			</td>
			<td class="text-center">
				{{$ledger->particulars}}
			</td>
			<td class="text-center">
				{{$ledger->reference}}
			</td>
			<td class="text-right">
				{{number_format($ledger->avaiment,2)}}
			</td>
			<td class="text-right">
				{{number_format($ledger->amountPayed,2)}}
			</td>
			<td class="text-right">
				{{number_format($ledger->interestDue,2)}}
			</td>
			<td class="text-right">
				{{number_format($ledger->penaltyDue,2)}}
			</td>
			<td class="text-right">
				{{number_format($ledger->principal,2)}}
			</td>
			<td class="text-right">
				{{number_format($ledger->balance,2)}}
			</td>
		</tr>
		@endforeach
	</table>
	<a href="/print/{{$acc->id}}" class="btn btn-warning pull-right">Print</a>
  </div>
@stop