<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car_age;
use App\Models\Car;
use App\Models\Servicebook;
use Carbon\Carbon;

class CarController extends Controller
{
    public function showAll() {
        $servicebooks = Servicebook::all();
        return view('cars', ['servicebooks' => $servicebooks]);
    }

    public function newCar() {
        $ages = Car_age::all();
        $cars = Car::all();
        return view('new-car', ['ages' => $ages], ['cars' => $cars]);
    }

    public function storeNewCar(Request $request) {
        $data = $request->validate([
            'ownerName' => 'required|max:50',
            'startOfService' => 'required',
            'car_id' => 'required',
        ]);
        $data['car_age_id'] = $request->input('car_age_id');
        $data['guarantee'] = filter_var($request->input('guarantee'), FILTER_VALIDATE_BOOLEAN);
        $data['created_at'] =  Carbon::now()->format('Y-m-d H:i:s');
        $data['updated_at'] =  Carbon::now()->format('Y-m-d H:i:s');
        print_r($data);
        $servicebook = Servicebook::create($data);
        return redirect()->route('cars')->with('car_added', true);
    }
}
