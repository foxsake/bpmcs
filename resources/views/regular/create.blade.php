@extends('layout')

@section('content')
	<div class="container">
	<h1>Loan Application</h1>


	@include('partials.errors')



	{!! Form::open(['url'=> 'account']) !!}
	<div class="row">
		<div class="col-md-6">

		<div class="form-group">
			{!! Form::label('loan_id','Amount:') !!}
			{!! Form::select('loan_id',$ltypes,null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('amount','Amount:') !!}
			{!! Form::text('amount',null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('terms','Terms:') !!}
			{!! Form::text('terms',null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('comaker','Co-maker:') !!}
			{!! Form::text('comaker',null,['class' => 'form-control'])!!}
		</div>

		</div>

		<div class="form-group">
			{!! Form::submit('Submit',['class' => 'form-control btn btn-primary'])!!}
		</div>
	</div>
	{!! Form::close() !!}

	</div>
@stop