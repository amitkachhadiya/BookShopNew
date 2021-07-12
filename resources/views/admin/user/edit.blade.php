@extends('layouts.master')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" style="width: auto;">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            <div class="col-md-9">
                <div class="statbox widget box box-shadow">
                    <form method="POST" action="{{url('/user/'.$user->id.'/')}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Name" name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="text" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Enter Email" value="{{$user->email}}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput2">Gender</label>
                            <div class="n-chk">
                                <label class="new-control new-radio new-radio-text radio-classic-primary">
                                    <input type="radio" class="new-control-input" name="gender" value="male" {{( $user->gender == 'male') ? 'checked' : ''}}  >
                                    <span class="new-control-indicator"></span><span class="new-radio-content">Male</span>
                                    <input type="radio" class="new-control-input" name="gender" value="female" {{( $user->gender == 'female') ? 'checked' : ''}}>
                                    <span class="new-control-indicator"></span><span class="new-radio-content">Female</span>
                                    <input type="radio" class="new-control-input" name="gender" value="other" {{( $user->gender == 'other') ? 'checked' : ''}}>
                                    <span class="new-control-indicator"></span><span class="new-radio-content">Other</span>
                                </label>
                            </div>
                        </div>
                        @php $hobby=explode(',',$user->hobby); @endphp
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput2">Hobby</label>
                            <div class="n-chk">
                                <label class="new-control new-checkbox checkbox-outline-primary">
                                    <input type="checkbox" class="new-control-input" name="hobby[]" value="driving" <?php (@in_array('driving' , $hobby))?'checked':''?>>
                                    <span class="new-control-indicator"></span>Driving
                                    <input type="checkbox" class="new-control-input" name="hobby[]" value="playing" {{@in_array('playing' , $hobby)?'checked':''}}>
                                    <span class="new-control-indicator"></span>Playing
                                    <input type="checkbox" class="new-control-input" name="hobby[]" value="singing" {{@in_array('singing' , $hobby)?'checked':''}}>
                                    <span class="new-control-indicator"></span>Singing
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Date Of Birth</label>
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Enter Name" name="dob" value="{{$user->dob}}">
                                </div>
                            </div>
                        </div>
                        @php  @endphp
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">City</label>
                            <select class="form-control  basic" name="city_id">
                                <option value="-1">Select Your City</option>
                                @foreach($cities as $city)
                                <option value="{{$city->id}}" {{($user->city_id == $city->id)?'selected':''}}>{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">State</label>
                            <select class="form-control  basic" name="state_id">
                                <option value="0">Select Your State</option>
                                @foreach($states as $state)
                                <option value="{{$state->id}}" {{($user->cities->state_id == $state->id)?'selected':''}}>{{$state->name}}</option>
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
                                            <option value="{{$country->id}}" {{($user->country_id == $country->id)?'selected':''}}>{{$country->country_code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-12">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" id="formGroupExampleInput" placeholder="Enter Phone number" name="phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Role</label>
                            <select class="form-control basic selectpicker" multiple data-live-search="true" name="role_id">
                                <option disabled>Select Role</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}" >{{$role->role}}</option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Profile</label>
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <input type="file" class="form-control" id="formGroupExampleInput" name="profile">
                                </div>
                                <img src="{{asset($user->profile)}}" alt="Profile" width="200px">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">User Images</label>
                            <div class="row">
                                <div class="col-sm-4 ">
                                    @foreach($user->userImages as $userImage)
                                    <input type="file" class="form-control" id="formGroupExampleInput" name="userImages[]" multiple>
                                    <img src="{{asset($userImage->user_image)}}" alt="">
                                    @endforeach
                                    <input type="checkbox" name="remove_images[]" value="{{$userImage->id}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">Address</label>
                            <textarea name="address" class="form-control" cols="30" rows="5" placeholder="Enter Address">{{$user->address}}</textarea>
                        </div>

                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection