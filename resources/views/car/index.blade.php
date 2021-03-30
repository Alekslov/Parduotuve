@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                  <h2>List of cars</h2>
                  <a href="{{route('car.index', ['sort' => 'name'])}}"> Sort by name </a>
                  <a href="{{route('car.index')}}"> Default </a> 
                </div>

               <div class="card-body">
                @foreach ($cars as $car)
                <a href="{{route('car.edit',[$car])}}">{{$car->name}} {{$car->carMaker->name}}</a>
                <form method="POST" action="{{route('car.destroy', [$car])}}">
                 @csrf
                 <button type="submit">DELETE</button>
                </form>
                <br>
              @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

