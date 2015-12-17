@extends('layout')

@section('content')
	<div class="container">
	<h1>Loan Payment</h1>


	@include('partials.errors')



	{!! Form::open(['url'=> 'admin/ledger']) !!}
	<input name="id" type="hidden" value="{{$id}}">
	<div class="row">
		<div class="col-md-6">

		<div class="form-group">
			{!! Form::label('particulars','Particular:') !!}
			{!! Form::text('particulars',null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('reference','Reference:') !!}
			{!! Form::text('reference',null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('cash','Cash:') !!}
			{!! Form::text('cash',null,['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('actn','Action: ') !!}
			<div class="radio">
  				<label>
    				{!! Form::radio('actn','true',true)!!}
    				ADD
  				</label>
			</div>
			<div class="radio">
  				<label>
    				{!! Form::radio('actn','false',false)!!}
    				SUBTRACT
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