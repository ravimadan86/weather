@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>Weather info </h3>
        <a href="/next24" >Next 24 hours</a> | <a href="/next5days" >Next 5 days</a>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <form action="/home" method="POST" role="search">
              {{ csrf_field() }}
              <div class="input-group">
                  <input type="text" class="form-control" name="city"
                      placeholder="Search cities"> <span class="input-group-btn">
                      <button type="submit" class="btn btn-default">
                          <span class="glyphicon glyphicon-search"></span>
                      </button>
                  </span>
              </div>
          </form>
        </div>
      </div>
      <div class="panel-body">
        @if ($forecast && $forecast->cod == 200)
          <strong>Country : {{ $forecast->name }}</strong>
          <br>
          <strong>Current Weather : {{ $forecast->weather[0]->description }}</strong>
          <br>
          <strong>Weather Description : {{ $forecast->weather[0]->main }}</strong>
          <br>
          <strong>Current Temperature : {{ $forecast->main->temp }} &deg;C</strong>
          <br>
          <strong>Feels Like : {{ $forecast->main->feels_like }} &deg;C</strong>
          <br>
          <strong>Humidity : {{ $forecast->main->humidity }} %</strong>
          <br>
          
        @else
          @if( !empty($exceptionMessage) )
            <strong>Error : {{ $exceptionMessage }}</strong>
          @else
            <strong>No forecast available. Search city to show result</strong>
          @endif
        @endif

      </div>
    </div>
  </div>
</div>

@endsection

