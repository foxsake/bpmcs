@extends('master')

@section('content')
  <div class="container-fluid">
  	<div class="text-center">
  	<h4><strong>BANTUG PRIMARY MULTI-PURPOSE COOPERATIVE</strong></h4>
  	<h6>Bantug, Science City of Munoz, Nueva Ecija</h6>
  	<h6>CDA Registration No.9520-030015533 / CONFIRMATION NO. 724</h6>
  	</div>
  	<br>
  	<h5 class="text-center"><strong>Schedule of Loan Recievable</strong></h5>
  	<h5 class="text-center">{{\Carbon\Carbon::now()->format('l, F j, Y')}}</h5>
  	@if(count($mems) > 0)
    <table class="table table-bordered table-condensed">
		<tr>
			<th class="text-center">Borrower's Name</th>

			@foreach(\App\Loan::all() as $loan)
				<th class="text-center">{{$loan->name}}</th>
			@endforeach
			
		</tr>

		@foreach($mems as $mem)
			<tr>
				<td class="text-left">
					{{$mem->name()}}
				</td>
				<td class="text-right">
					{{!empty($mem->accounts->where('loan_id',1)->first()->balance) ? number_format($mem->accounts->where('loan_id',1)->first()->balance,2) : number_format(0,2)}}				
				<td class="text-right">
					{{!empty($mem->accounts->where('loan_id',2)->first()->balance) ? number_format($mem->accounts->where('loan_id',2)->first()->balance,2) : number_format(0,2)}}
				</td>
				<td class="text-right">
					{{!empty($mem->accounts->where('loan_id',3)->first()->balance) ? number_format($mem->accounts->where('loan_id',3)->first()->balance,2) : number_format(0,2)}}
				</td>
				<td class="text-right">
					{{!empty($mem->accounts->where('loan_id',4)->first()->balance) ? number_format($mem->accounts->where('loan_id',4)->first()->balance,2) : number_format(0,2)}}
				</td>
				<td class="text-right">
					{{!empty($mem->accounts->where('loan_id',5)->first()->balance) ? number_format($mem->accounts->where('loan_id',5)->first()->balance,2) : number_format(0,2)}}
				</td>
				<td class="text-right">
					{{!empty($mem->accounts->where('loan_id',6)->first()->balance) ? number_format($mem->accounts->where('loan_id',6)->first()->balance,2) : number_format(0,2)}}
				</td>
				<td class="text-right">
					{{!empty($mem->accounts->where('loan_id',7)->first()->balance) ? number_format($mem->accounts->where('loan_id',7)->first()->balance,2) : number_format(0,2)}}
				</td>
			</tr>
		@endforeach
		<tr>
			<th class="text-center">Total</th>
			@foreach ($totals as $total)
				<th class="text-right">{{number_format($total,2)}}</th>
			@endforeach
		</tr>
	</table>
	@else
		<h3 class="text-danger text-center">None Found.</h3>
	@endif
  </div>
@stop

