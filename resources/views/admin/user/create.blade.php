@extends('layouts.master')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" style="width: auto;">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-md-9">
                <div class="statbox widget box box-shadow">
                    <form method="POST" action="{{url('/user')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Name" name="name">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="text" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Enter Email">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput2">Password</label>
                            <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Enter Password">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput2">Gender</label>
                            <div class="n-chk">
                                <label class="new-control new-radio new-radio-text radio-classic-primary">
                                    <input type="radio" class="new-control-input" name="gender" value="male">
                                    <span class="new-control-indicator"></span><span class="new-radio-content">Male</span>
                                    <input type="radio" class="new-control-input" name="gender" value="female">
                                    <span class="new-control-indicator"></span><span class="new-radio-content">Female</span>
                                    <input type="radio" class="new-control-input" name="gender" value="other">
                                    <span class="new-control-indicator"></span><span class="new-radio-content">Other</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput2">Hobby</label>
                            <div class="n-chk">
                                <label class="new-control new-checkbox checkbox-outline-primary">
                                    <input type="checkbox" class="new-control-input" name="hobby[]" value="driving">
                                    <span class="new-control-indicator"></span>Driving
                                    <input type="checkbox" class="new-control-input" name="hobby[]" value="playing">
                                    <span class="new-control-indicator"></span>Playing
                                    <input type="checkbox" class="new-control-input" name="hobby[]" value="singing">
                                    <span class="new-control-indicator"></span>Singing
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Date Of Birth</label>
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Enter Name" name="dob">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">City</label>
                            <select class="form-control  basic" name="city_id">
                                <option>Select Your City</option>
                                @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">State</label>
                            <select class="form-control  basic" name="state_id">
                                <option>Select Your State</option>
                                @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Phone</label>
                            <div class="row">
                                <div class="col-sm-2 col-12">
                                    <div class="form-group">
                                        <select class="form-control basic" name="country_id">
                                            <option>Code</option>
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->country_code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-12">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" id="formGroupExampleInput" placeholder="Enter Phone number" name="phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Role</label>
                            <select class="form-control basic selectpicker" multiple data-live-search="true" name="role_id[]">
                                <option disabled>Select Role</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->role}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Profile</label>
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <input type="file" class="form-control" id="formGroupExampleInput" name="profile">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">User Images</label>
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <input type="file" class="form-control" id="formGroupExampleInput" name="userImages[]" multiple>
                                    <!-- <input type="checkbox" name="remove_image[]" > -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Address</label>
                            <textarea name="address" class="form-control" cols="30" rows="5" placeholder="Enter Address"></textarea>
                        </div>

                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection