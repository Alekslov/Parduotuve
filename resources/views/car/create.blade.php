@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Add new car</div>

               <div class="card-body">
                <form method="POST" action="{{route('car.store')}}">

                    <div class="form-group">
                        <label class="list-line__cars__maker">Name</label>
                        <input type="text" class="form-control" name="car_name" value="{{old('car_name')}}">
                        <small class="form-text text-muted">Input cars model name</small>
                      </div>

                      <div class="form-group">
                        <label class="list-line__cars__maker">Plate</label>
                        <input type="text" class="form-control" name="car_plate" value="{{old('car_plate')}}">
                        <small class="form-text text-muted">Input cars plate</small>
                      </div>

                      <div class="form-group">
                        <label class="list-line__cars__maker">About</label>
                        <textarea name="car_about" id="summernote"></textarea>
                        <small class="form-text text-muted">Write about car</small>
                      </div>

                    <select name="maker_id">
                        @foreach ($makers as $maker)
                            <option value="{{$maker->id}}">{{$maker->name}}</option>
                        @endforeach
                 </select>
                    @csrf
                    <div class="list-line__buttons">
                    <button type="submit" class="btn btn-info">ADD</button>
                    </div>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
  window.addEventListener('DOMContentLoaded', (event) => {
      $('#summernote').summernote();
  });
  </script>
  
@endsection










{{-- <form method="POST" action="{{route('car.store')}}">
    Name: <input type="text" name="car_name">
    Plate: <input type="text" name="car_plate">
    About: <textarea name="car_about"></textarea>
    <select name="maker_id">
        @foreach ($makers as $maker)
            <option value="{{$maker->id}}">{{$maker->name}}</option>
        @endforeach
 </select>
    @csrf
    <button type="submit">ADD</button>
 </form> --}}
 