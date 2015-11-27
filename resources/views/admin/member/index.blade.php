@extends('layout')

@section('content')
  <div class="container-fluid">
    @foreach($appli as $app)
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">{{$app->name()}}</h2>
            <span>Applied: {{$app->created_at->toDateString()}}</span>
          </div>
          <div class="panel-body">

            Member Details
          </div>
          <table class="table table-striped">
          <tr>
            <th>Field</th>
            <th>Data</th>
          </tr>
          <tr>
            <td>Gender</td>
            <td>{{$app->gender = 'm'? 'Male' : 'Female'}}</td>
          </tr>
          <tr>
            <td>Address</td>
            <td>{{$app->addr}}</td>
          </tr>
          <tr>
            <td>Birthday</td>
            <td>{{$app->bDay}}</td>
          </tr>
          <tr>
            <td>Religion</td>
            <td>{{$app->religion}}</td>
          </tr>
          <tr>
            <td>Civil Status</td>
            <td>{{$app->civilStatus}}</td>
          </tr>
          <tr>
            <td>Spouce</td>
            <td>{{$app->spouce}}</td>
          </tr>
          <tr>
            <td>Highest Education</td>
            <td>{{$app->highestEd}}</td>
          </tr>
          <tr>
            <td>Occupation</td>
            <td>{{$app->occupation}}</td>
          </tr>
          <tr>
            <td>Beneficiary</td>
            <td>{{$app->beneficiary}}</td>
          </tr>
          <tr>
            <td>Relationship to Member</td>
            <td>{{$app->relToMem}}</td>
          </tr>
          <tr>
            <td>Contact Number</td>
            <td>{{$app->contact}}</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>{{$app->user->email}}</td>
          </tr>
          <tr>
            <td>Initial Share</td>
            <td>{{$app->initShare}}</td>
          </tr>
          <tr>
            <td>Amount Share</td>
            <td>{{$app->amntShare}}</td>
          </tr>
          <tr>
            <td>Initial CBU</td>
            <td>{{$app->initCBU}}</td>
          </tr>
          <tr>
            <td>Land Area</td>
            <td>{{$app->landArea}}</td>
          </tr>
          <tr>
            <td>Credit Line</td>
            <td>{{$app->credLine}}</td>
          </tr>
          <tr>
            <td>Municipality</td>
            <td>{{$app->municipality}}</td>
          </tr>
          <tr>
            <td>Barangay</td>
            <td>{{$app->barangay}}</td>
          </tr>
          <tr>
            <td>Ownership Type</td>
            <td>{{$app->ownType}}</td>
          </tr>
          </table>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@stop