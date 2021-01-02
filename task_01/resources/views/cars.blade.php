@extends('layouts.base')

@section('title', 'Cars list')

@section('content')
<div class="container mt-5 ">
    @if (session()->has('car_added'))
        @if (session()->has('car_added') == true)    
            <div class="alert alert-success" role="alert">
                Car save success!
            </div>
        @endif
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Owner</th>
            <th scope="col">Car</th>
            <th scope="col">Guarantee</th>
            <th scope="col">Car age</th>
            <th scope="col">Start of service</th>
            <th scope="col">End of service</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
            @foreach($servicebooks as $servicebook)
                <tr value="{{ $servicebook['id'] }}">
                    <th>{{ $servicebook['id'] }}</th>
                    <td>{{ $servicebook['ownerName'] }}</td>
                    <td>{{ $servicebook['car_id'] }}</td>
                    <td>{{ $servicebook['guarantee'] }}</td>
                    <td>{{ $servicebook['car_age_id'] }}</td>
                    <td>{{ $servicebook['startOfService'] }}</td>
                    <td>{{ $servicebook['stopOfService'] }}</td>
                    <td>
                        <button>Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection