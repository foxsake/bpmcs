@extends('master')

@section('content')
  <div class="container-fluid">
  	<div class="text-center">
  	<h4><strong>BANTUG PRIMARY MULTI-PURPOSE COOPERATIVE</strong></h4>
  	<h6>Bantug, Science City of Munoz, Nueva Ecija</h6>
  	<h6>CDA Registration No.9520-030015533 / CONFIRMATION NO. 724</h6>
  	</div>
  	<br>
  	<h5 class="pull-right">{{\Carbon\Carbon::now()->format('l, F j, Y')}}</h5>
  	<h5>Name of Borrower: <strong>{{$acc->member->name()}}</strong></h5>
  	<h5>Loan Type: <strong>{{$acc->loan->name}}</strong></h5>
  	<h5 class="text-center"><strong>LOAN LEDGER</strong></h5>
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
  </div>
@stop