@extends('layouts.base')

@section('title', 'New Car')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h2 class="card-title text-center mt-3">Add Car</h2>
            
            <div class="card-body">
                <form action="{{ route('store-new-car') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="ownerName">Owner name: </label>
                        <input type="text" class="form-control @error('ownerName') is-invalid @enderror" id="ownerName" name="ownerName" placeholder="John Doe"> 
                        @error('ownerName')
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('ownerName') }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="car_id">Car type: </label>
                        <select class="form-control @error('car_id') is-invalid @enderror" id="car_id" id="car_id" name="car_id">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($cars as $car)
                                <option value="{{$car->id}}"> {{$car->type}}</option>
                            @endforeach
                            
                        </select>
                        @error('car_id')
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('car_id') }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input"  type="checkbox"  id="guarantee" name="guarantee" value='0'>
                            <label class="form-check-label" for="guarantee">
                                Guarantee
                            </label>
                        </div>
                    </div>
                    <script>
                
                        checkbox = document.getElementById('guarantee')
                        checkbox.addEventListener("click", function (e) {
                            if (checkbox.checked == true){
                                e.target.value = 1
                            } else {
                                e.target.value = 0
                            }
                        })
                        
                        
                    </script>
                    <div class="form-group" >
                        <label for="car_age_id">Age: </label>  
                            @foreach ($ages as $age)
                                <div class="form-check ">
                                    <input class="form-check-input" checked type="radio" name="car_age_id" id="car_age_id" value="{{$age->id}}">
                                    <label class="form-check-label" for="age" >{{$age->age}}</label>
                                </div>
                            @endforeach
                        </div>
                         
                    </div>
                    
                    <div class="form-group mr-3 ml-3">
                        <label for="startOfService">Start of service: </label>
                        <input class="date form-control @error('startOfService') is-invalid @enderror" type="text" id="startOfService" name="startOfService" value="">
                        @error('startOfService')
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('startOfService') }}</strong>
                            </div>
                        @enderror
                    </div>
                    <script type="text/javascript">
                        $('.date').datepicker({  
                        format: 'yyyy-mm-dd'
                        });  
                    </script> 
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection