@extends('layout')

@section('content')
	<div class="container">
	<h1>Loan Creation</h1>


	@include('partials.errors')


	{!! Form::open(['url'=> 'admin/loans']) !!}
	<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('member_id','Member:') !!}
			{!! Form::select('member_id',$members,null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('loan_id','Loan Type:') !!}
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
		<div class="form-group">
            {!! Form::label('dateGranted','Date:') !!}
            {!! Form::input('date','dateGranted',date('Y-m-d'),['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Submit',['class' => 'form-control btn btn-primary'])!!}
		</div>
		</div>
	</div>
	{!! Form::close() !!}

	</div>
@stop