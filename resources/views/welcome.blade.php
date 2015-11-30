
@extends('layout')
@section('content')
    <div class="container">
    @include('flash::message')
        <div class="content">
            <div class="title">Bantug Primary Multi-Purpose Cooperative</div>
            <div class="subtitle">Purok Centro, Bantug, Science City of Munoz, N.E.</div>
            <p>{!! Html::link('/apply','Apply Now!') !!}</p>
        </div>
    </div>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
@stop
