@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">List of makers</div>

               <div class="card-body">
                @foreach ($makers as $maker)
                <a href="{{route('maker.edit',[$maker])}}">{{$maker->name}}</a>
                <form method="POST" action="{{route('maker.destroy', [$maker])}}">
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




