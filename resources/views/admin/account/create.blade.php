@extends('layout')

@section('content')
	<div class="container">
	<h1>Loan Creation</h1>


	@include('partials.errors')


	{!! Form::open(['url'=> 'admin/accounts']) !!}
	<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('member_id','Member:') !!}
			{!! Form::select('member_id',$members,null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('loan_id','Loan Type:') !!}
			{!! Form::select('loan_id',$ltypes,null,['class' => 'form-control', 'id' => 'ltype'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('amount','Amount:') !!}
			{!! Form::text('amount',null,['class' => 'form-control', 'id' => 'amnt'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('terms','Terms:') !!}
			{!! Form::text('terms',null,['class' => 'form-control', 'id' => 'term'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('comaker','Co-maker:') !!}
			{!! Form::text('comaker',null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
            {!! Form::label('dateGranted','Date:') !!}
            {!! Form::input('date','dateGranted',date('Y-m-d'),['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('amortization','Amortization:') !!}
			{!! Form::text('amortization',null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group form-inline">
			{!! Form::label('payType','Payment Type: ') !!}
			<div class="radio">
  				<label>
    				{!! Form::radio('payType','7',true)!!}
    				W
  				</label>
			</div>
			<div class="radio">
  				<label>
    				{!! Form::radio('payType','15',false)!!}
    				SM
  				</label>
			</div>
			<div class="radio">
  				<label>
    				{!! Form::radio('payType','30',false)!!}
    				M
  				</label>
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit('Submit',['class' => 'form-control btn btn-primary'])!!}
		</div>

		</div>
		<div class="col-md-6">
		<h3 id="amntv"></h3>
		<h4>Less:</h4>
		<table class="table">
			<tr>
				<td>Advance Interest</td>
				<td id="advintv">0.0</td>
			</tr>
			<tr>
				<td>PCIC</td>
				<td id="pcicv">0.0</td>
			</tr>
			<tr>
				<td>Insurance</td>
				<td id="insurancev">0.0</td>
			</tr>
			<tr>
				<td>Service Fee</td>
				<td id="sfeev">0.0</td>
			</tr>
			<tr>
				<td>Saving Deposit</td>
				<td id="sdepositv">0.0</td>
			</tr>
			<tr>
				<td>Mortuary</td>
				<td id="mortuaryv">0.0</td>
			</tr>
			<tr>
				<td>CBU</td>
				<td id="cbuv">0.0</td>
			</tr>
			<tr>
				<td>Balance</td>
				<td id="balancev">0.0</td>
			</tr>
			<tr>
				<td>Penalty</td>
				<td id="penaltyv">0.0</td>
			</tr>
			<tr class="danger">
				<td>Total</td>
				<td id="totalv">0.0</td>
			</tr>
			<tr class="success">
				<td><strong>Net Loan</strong></td>
				<td><strong id="netv">0.0<strong></td>
			</tr>
		</table>
		</div>
	</div>
	{!! Form::close() !!}

	</div>
	<script>
	function format2(n) {
    	return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
	}
	var amount = 0.0;
	var term = 0.0;

	var advint = 0.0;
	var pcic = 0.0;
	var insurance = 0.0;
	var sfee = 0.0;
	var sdeposit = 0.0;
	var mortuary = 0.0;
	var cbu = 0.0;
	var balance = 0.0;
	var penalty = 0.0;
	var total = 0.0;
	var net = 0.0;
	var loans = [

		@foreach($loans as $key=>$loan)
    	{
    		"id":"{{$loan->id}}",
    		"intRate":"{{$loan->intRate}}",
    		"sFee":"{{$loan->sFee}}",
    		"penalty":"{{$loan->penalty}}"
    	}
    	@if($key!=count($loans)-1)
    	,
    	@endif
    	@endforeach
    	
	];
	$(document).ready(function(){
		$('#amnt').on('input propertychange paste', function() {
    		amount = $('#amnt').val();
    		$('#amntv').text(format2(parseFloat(amount)));
    		compute();
		});
		$('#term').on('input propertychange paste', function() {
    		term = $('#amnt').val();
    		compute();
		});
		$('#ltype').on('change', function (e) {
			compute();
		});
	});

	function compute(){
		advint = 0.0;
		pcic = 0.0;
		insurance = 0.0;
		sfee = 0.0;
		sdeposit = 0.0;
		mortuary = 0.0;
		cbu = 0.0;
		balance = 0.0;
		penalty = 0.0;
		//loan_id-1 = l
		var l = $("#ltype option:selected").index();
		switch(l){
			case 0:
				insurance = 0;//todo
				var today = new Date();
				var mm = today.getMonth()+1;
				if(mm==12||mm==1){
					insurance = 0;//todo
				}
				else if(mm>=6&&mm<=8){
					insurance = amount*0.15;
				}
				cbu = 500;
				sfee = amount * loans[l].sFee;
				break;
			case 1:
				cbu = 500;
				sfee = amount * loans[l].sFee;
				break;
			case 2:
			case 3:
			case 4:
			case 5:
				advint = ((amount * loans[l].intRate * parseFloat(term))/360)/2;
				sfee = amount * loans[l].sFee;
				break;
			case 6:
				sfee = amount * loans[l].sFee;
			break;
		}
		total = advint+pcic+insurance+sfee+sdeposit+mortuary+cbu+balance+penalty;
		net = amount-total;
		$('#advintv').text(format2(parseFloat(advint)));
		$('#pcicv').text(format2(parseFloat(pcic)));
		$('#insurancev').text(format2(parseFloat(insurance)));
		$('#sfeev').text(format2(parseFloat(sfee)));
		$('#ssdepositv').text(format2(parseFloat(sdeposit)));
		$('#mortuaryv').text(format2(parseFloat(mortuary)));
		$('#cbuv').text(format2(parseFloat(cbu)));
		$('#balancev').text(format2(parseFloat(balance)));
		$('#penaltyv').text(format2(parseFloat(penalty)));
		$('#totalv').text(format2(parseFloat(total)));
		$('#netv').text(format2(parseFloat(net)));
	}
	</script>
@stop