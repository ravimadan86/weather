@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>Forecast Info ( 3 HOUR INTERVAL FOR 5 DAYS ) </h3>
        <a href="/home" >Current</a> | <a href="/next24" >Next 24</a>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <form action="/next5days" method="POST" role="search">
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
      <div>
        @if ($forecast && $forecast->cod == 200)
          <table class="table">
            <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Hour</th>
              <th scope="col">Weather</th>
              <th scope="col">Temperature &deg;C</th>
              <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($forecast->list as $list)
              <tr>
                <th scope="row"></th>
                <td>{{ $list->dt_txt }} </td>
                <td>{{ $list->weather[0]->main }}  ( {{ $list->weather[0]->description }} ) </td>
                <td> {{ $list->main->temp }} </td>
                <td> <img id="wicon" src="{{ 'http://openweathermap.org/img/w/'.$list->weather[0]->icon.'.png' }}" alt="Weather icon"> </td>
              </tr>

            @endforeach
            </tbody>
          </table>
        @else
          @if( !empty($exceptionMessage) )
            <strong>Error : {{ $exceptionMessage }}</strong>
          @else
            <strong>Sorry my dear friend, no forecast here. Search city to show result</strong>
          @endif
        @endif

      </div>
    </div>
  </div>
</div>

@endsection
  
  
