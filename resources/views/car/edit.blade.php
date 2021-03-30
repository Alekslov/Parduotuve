
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit information about car</div>

               <div class="card-body">
                <form method="POST" action="{{route('car.update',[$car])}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="car_name" value="{{old('car_name',$car->name)}}">
                        <small class="form-text text-muted">Input cars model name</small>
                      </div>

                      <div class="form-group">
                        <label>Plate</label>
                        <input type="text" class="form-control" name="car_plate" value="{{old('car_plate',$car->plate)}}">
                        <small class="form-text text-muted">Input cars plate</small>
                      </div>

                      <div class="form-group">
                        <label>About</label>
                        <textarea name="car_about" id="summernote">{{$car->about}}</textarea>
                        <small class="form-text text-muted">Write about car</small>
                      </div>

                    <select name="maker_id">
                        @foreach ($makers as $maker)
                            <option value="{{$maker->id}}" @if($maker->id == $car->maker_id) selected @endif>
                                {{$maker->name}}
                            </option>
                        @endforeach
                </select>
                    @csrf
                    <button type="submit">EDIT</button>
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





{{-- <form method="POST" action="{{route('car.update',[$car])}}">
    Name: <input type="text" name="car_name" value="{{$car->name}}">
    Plate: <input type="text" name="car_plate" value="{{$car->plate}}">
    About: <textarea name="car_about">{{$car->about}}</textarea>
    <select name="maker_id">
        @foreach ($makers as $maker)
            <option value="{{$maker->id}}" @if($maker->id == $car->maker_id) selected @endif>
                {{$maker->name}}
            </option>
        @endforeach
</select>
    @csrf
    <button type="submit">EDIT</button>
</form> --}}
