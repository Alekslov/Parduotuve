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
                <ul class="list-group">
                @foreach ($cars as $car)
                <li class="list-group-item list-line">
                 <div class="list-line__cars__maker">
                {{$car->carMaker->name}}
                <div class="list-line__cars__name">
                    {{$car->name}} 
                    </div>
                </div>
                    <div class="list-line__buttons">
                <a href="{{route('car.edit',[$car])}}" class="btn btn-info">EDIT</a>
                <form method="POST" action="{{route('car.destroy', [$car])}}">
                 @csrf
                 <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
            </div>
            </li>
              @endforeach
            </ul>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

