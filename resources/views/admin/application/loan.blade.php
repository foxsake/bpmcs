@extends('layout')

@section('content')
  <div class="container-fluid">
    @foreach($appli as $app)
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">{{$app->Member->name()}}</h2>
            <span>Filed: {{$app->created_at->toDateString()}}</span>
          </div>
          <div class="panel-body">
            Application Details
          </div>
          <table class="table table-striped">
          <tr>
            <th>Field</th>
            <th>Data</th>
          </tr>
          <tr>
            <td>Loan Type</td>
            <td>{{$app->loan->name}}</td>
          </tr>
          <tr>
            <td>Terms</td>
            <td>{{$app->terms}}</td>
          </tr>
          <tr>
            <td>Amount</td>
            <td>{{$app->amountGranted}}</td>
          </tr>
          <tr>
            <td>Co-maker</td>
            <td>{{$app->comaker}}</td>
          </tr>
          </table>
          <div class="panel-footer">
          
            {!! Form::open(['class'=>'form-inline']) !!}
              <input name="id" type="hidden" value="{{$app->id}}">
              <div class="form-group">
                {!! Form::label('dateGranted','Date:') !!}
                {!! Form::input('date','dateGranted',date('Y-m-d'),['class' => 'form-control'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('accept','Verdict: ') !!}
                <div class="radio">
                    <label>
                      {!! Form::radio('accept','true',true)!!}
                      Accept
                    </label>
                </div>
                <div class="radio">
                    <label>
                      {!! Form::radio('accept','false',false)!!}
                      Reject
                    </label>
                </div>
                <div class="form-group">
                  {!! Form::submit('Submit',['class' => 'form-control btn btn-primary'])!!}
                </div>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@stop