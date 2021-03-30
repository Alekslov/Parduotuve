@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"> 
                 <h2>List of makers</h2>
                <a href="{{route('maker.index', ['sort' => 'name'])}}"> Sort by name </a>
                <a href="{{route('maker.index')}}"> Default </a>
                </div>

               <div class="card-body">
                <ul class="list-group">
                @foreach ($makers as $maker)
                <li class="list-group-item list-line">
                  <div class="list-line__cars__maker">
                    {{$maker->name}}
                  </div>
                <div class="list-line__buttons">
                <a href="{{route('maker.edit',[$maker])}}" class="btn btn-info">EDIT</a>
                <form method="POST" action="{{route('maker.destroy', [$maker])}}">
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




