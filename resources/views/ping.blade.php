@extends('layouts.app')
@section('content')
    <br>
    <h1>Monitoring des différentes ressources</h1>
    @foreach($result as $name => $statut)
    <div class="row">
        <div class="col-8">  <strong>{{strtoupper($name)}}</strong></div>
        <div class="col-1"> </div>
    @if($statut[0] =='online')
            <div class="col-2 btn btn-success"> Online</div>
        @else
            <div class="col-2 btn btn-danger"> Offline</div>
        @endif
    </div>
    <hr>
    @endforeach
@endsection