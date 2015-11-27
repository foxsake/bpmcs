@extends('master')
@section('title')
<title>BPMCS: Apply</title>
@stop
@section('content')
	<div class="container">
	<h1>Application for Membership</h1>


	@include('partials.errors')



	{!! Form::open(['url'=> '/apply']) !!}
	<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('lName','Last Name:') !!}
			{!! Form::text('lName',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('fName','First Name:') !!}
			{!! Form::text('fName',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('mName','Middle Name: ') !!}
			{!! Form::text('mName',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('gender','Gender: ') !!}
			<div class="radio">
  				<label>
    				{!! Form::radio('gender','m',true)!!}
    				Male
  				</label>
			</div>
			<div class="radio">
  				<label>
    				{!! Form::radio('gender','f',false)!!}
    				Female
  				</label>
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('addr','Address:') !!}
			{!! Form::textarea('addr',null,['class' => 'form-control','rows' => '7'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('bDay','Birthday:') !!}
			{!! Form::input('date','bDay',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('religion','Religion:') !!}
			{!! Form::text('religion',null,['class' => 'form-control'])!!}
		</div>


		<div class="form-group">
			{!! Form::label('email','Email Address::') !!}
			{!! Form::text('email',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('contact','Contact Number:') !!}
			{!! Form::text('contact',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('civilStatus','Civil Status:') !!}
			{!! Form::select('civilStatus',['single' => 'Single','married' => 'Married','widowed' => 'Widowed','divorced' => 'Divorced'],'single',['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('spouce','Spouce:') !!}
			{!! Form::text('spouce',null,['class' => 'form-control'])!!}
		</div>

		</div>
		<div class="col-md-6">

		<div class="form-group">
			{!! Form::label('highestEd','Highest Education:') !!}
			{!! Form::text('highestEd',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('occupation','Occupation:') !!}
			{!! Form::text('occupation',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('beneficiary','Beneficiary:') !!}
			{!! Form::text('beneficiary',null,['class' => 'form-control'])!!}
			{!! Form::label('relToMem','Relationship to Member:') !!}
			{!! Form::select('relToMem',['Mother/Father' => 'Mother/Father','Son/Daughter' => 'Son/Daughter','Sibling' => 'Sibling','Others' => 'others'],null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('initShare','Initial Share:') !!}
			<div class="input-group">
				<div class="input-group-addon">&#8369;</div>
				{!! Form::text('initShare',null,['class' => 'form-control'])!!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('amntShare','Amount of Share:') !!}
			<div class="input-group">
				<div class="input-group-addon">&#8369;</div>
				{!! Form::text('amntShare',null,['class' => 'form-control'])!!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('initCBU','Initial CBU:') !!}
			{!! Form::text('initCBU',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('landArea','Land Area:') !!}
			{!! Form::text('landArea',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('credLine','Credit Line') !!}
			{!! Form::text('credLine',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('municipality','Municipality:') !!}
			{!! Form::text('municipality',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('barangay','Barangay:') !!}
			{!! Form::text('barangay',null,['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('ownType','Ownership Type:') !!}
			{!! Form::text('ownType',null,['class' => 'form-control'])!!}
		</div>
		</div>

		<div class="form-group">
			{!! Form::submit('Submit',['class' => 'form-control btn btn-primary'])!!}
		</div>
	</div>
	{!! Form::close() !!}

	</div>
@stop
