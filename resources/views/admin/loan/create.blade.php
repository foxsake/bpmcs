@extends('layout')

@section('content')
	<div class="container">
	<h1>Create Loan</h1>

	@include('partials.errors')

	{!! Form::open(['url'=> 'admin/loans']) !!}

	<div class="row">
		<div class="col-md-6">

		<div class="form-group">
			{!! Form::label('name','Name:') !!}
			{!! Form::text('name',null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('intRate','Interest Rate:') !!}
			{!! Form::text('intRate',null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('sFee','Service Fee:') !!}
			{!! Form::text('sFee',null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('penalty','Penalty:') !!}
			{!! Form::text('penalty',null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('advinterest','Advance Interest: ') !!}
			<div class="radio">
  				<label>
    				{!! Form::radio('advinterest','true',true)!!}
    				On
  				</label>
			</div>
			<div class="radio">
  				<label>
    				{!! Form::radio('advinterest','false',false)!!}
    				OFF
  				</label>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('amortization','Amortization: ') !!}
			<div class="radio">
  				<label>
    				{!! Form::radio('amortization','true',true)!!}
    				ON
  				</label>
			</div>
			<div class="radio">
  				<label>
    				{!! Form::radio('amortization','false',false)!!}
    				OFF
  				</label>
			</div>
		</div>


		</div>

		<div class="form-group">
			{!! Form::submit('Submit',['class' => 'form-control btn btn-primary'])!!}
		</div>
	</div>
	{!! Form::close() !!}

	</div>
@stop