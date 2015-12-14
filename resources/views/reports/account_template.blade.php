@extends('master')

@section('content')
  <div class="container-fluid">
  	<div class="text-center">
  	<h4><strong>BANTUG PRIMARY MULTI-PURPOSE COOPERATIVE</strong></h4>
  	<h6>Bantug, Science City of Munoz, Nueva Ecija</h6>
  	<h6>CDA Registration No.9520-030015533 / CONFIRMATION NO. 724</h6>
  	</div>
  	<br>
  	<h5 class="text-center"><strong>{{$title}}</strong></h5>
  	<h5 class="text-center">{{\Carbon\Carbon::now()->format('l, F j, Y')}}</h5>
  	@if(count($accs) > 0)
    <table class="table table-bordered table-condensed">
		<tr>
			<th class="text-center">Borrower's Name</th>
			<th class="text-center">Loan</th>
			<th class="text-center">Granted</th>
			<th class="text-center">Terms</th>
			<th class="text-center">Due</th>
			<th class="text-center">#Days</th>
			<th class="text-center">Amount</th>
		</tr>
		@foreach($accs as $acc)
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
		</tr>
		@endforeach
	</table>
	@else
		<h3 class="text-danger text-center">None Found.</h3>
	@endif
  </div>
@stop