
@extends('layout')
@section('content')
    <div class="container">
    @include('flash::message')
        <div class="content">
            <div class="title">Bantug Primary Multi-Purpose Cooperative</div>
            <div class="subtitle">Purok Centro, Bantug, Science City of Munoz, N.E.</div>
            <p>{!! Html::link('/apply','Apply for Membership Now!') !!}</p>
        </div>
    </div>
<div class="container">
    <div id="myTabs">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#vision" aria-controls="vision" role="tab" data-toggle="tab">Vision</a></li>
    <li role="presentation"><a href="#mission" aria-controls="mission" role="tab" data-toggle="tab">Mission</a></li>
    <li role="presentation"><a href="#goals" aria-controls="goals" role="tab" data-toggle="tab">Goals</a></li>
    <li role="presentation"><a href="#cval" aria-controls="corval" role="tab" data-toggle="tab">Core Values</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="vision">
        A stable and developed cooperative with members that are committed and enjoying the rights and privileges of being a member
    </div>
    <div role="tabpanel" class="tab-pane" id="mission">
        To undertake the programs/acttivities with the cooperation of all members of the cooperative
    </div>
    
    <div role="tabpanel" class="tab-pane" id="goals">
        *Uplift the standard of living of at least 75% of the total membership
    </div>

    <div role="tabpanel" class="tab-pane" id="cval">
        <ul class="list-group">
          <li class="list-group-item"><strong>R</strong>ESPECT TO GOD</li>
          <li class="list-group-item"><strong>E</strong>QUITY</li>
          <li class="list-group-item"><strong>S</strong>OCIAL RESPONSILITY</li>
          <li class="list-group-item"><strong>P</strong>ATRONAGE</li>
          <li class="list-group-item"><strong>E</strong>NDURANCE</li>
          <li class="list-group-item"><strong>C</strong>OOPERATION</li>
          <li class="list-group-item"><strong>T</strong>RUST</li>
        </ul>
    </div>
  </div>

    </div>
    </div>

    <script>
        $('#flash-overlay-modal').modal();
        $('#myTabs a:first').tab('show')
        $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>
@stop
