@extends('layout')

@section('content')
  <div class="container">
    <table class="table table-bordered table-condensed">
		<tr>
			<th>Member</th>
			<th>Loan</th>
			<th>Terms</th>
			<th>Amount Granted</th>
			<th>Date Granted</th>
			<th>Due</th>
			<th>Co-maker</th>
			<th>Balance</th>
			<th></th>
		</tr>
		@foreach($accs as $acc)
			<tr>
			<td>
				{{$acc->member->name()}}
			</td>
			<td>
				{{$acc->loan->name}}
			</td>
			<td>
				{{$acc->terms}}
			</td>
			<td>
				{{$acc->amountGranted}}
			</td>
			<td>
				{{$acc->dateGranted->toDateString()}}
			</td>
			<td>
				{{Carbon\Carbon::now()->diffForHumans($acc->dueDate)}}//TODO
			</td>
			<td>
				{{$acc->comaker}}
			</td>
			<td>
				{{$acc->balance}}
			</td>
			<td>
				<a href="/admin/loans/{{$acc->id}}" class="btn btn-primary">View</a>
			</td>
		</tr>
		@endforeach
	</table>
  </div>
@stop