<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Maker;
use Validator;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $cars = Car::all();
        if ('name' == $request->sort) {
            $cars = Car::orderBy('name')->get();
        }
        elseif ('plate' == $request->sort){
            $cars = Car::orderBy('plate')->get();
        }
        else {
            $cars = Car::all();
        }
       return view('car.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makers = Maker::all();
       return view('car.create', ['makers' => $makers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'car_name' => ['required', 'min:3', 'max:64'],
            'car_plate' => ['required', 'min:6', 'max:6'],
        ],
        [
        'car_name.min' => 'Name too short or too long (3-64)',
        'car_plate.min' => 'Plate number should include 6 simbols',

        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        
        $car = new Car;
        $car->name = $request->car_name;
        $car->plate = $request->car_plate;
        $car->about = $request->car_about;
        $car->maker_id = $request->maker_id;
        $car->save();
        return redirect()->route('car.index')->with('success_message', 'New cars model was added');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $makers = Maker::all();
        return view('car.edit', ['car' => $car, 'makers' => $makers]);
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $validator = Validator::make($request->all(),
        [
            'car_name' => ['required', 'min:3', 'max:64'],
            'car_plate' => ['required', 'min:6', 'max:6'],
        ],
        [
        'car_name.min' => 'Name too short or too long (3-64)',
        'car_plate.min' => 'Plate number should include 6 simbols',

        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

       $car->name = $request->car_name;
       $car->plate = $request->car_plate;
       $car->about = $request->car_about;
       $car->maker_id = $request->maker_id;
       $car->save();
       return redirect()->route('car.index')->with('success_message', 'Cars model was edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('car.index')->with('success_message', 'Cars model was deleted');
    }
}
