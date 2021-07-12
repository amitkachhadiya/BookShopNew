@extends('layouts.master')


@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" style="width: auto;">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            <div class="col-md-6">
                <div class="statbox widget box box-shadow">
                    <h4 style="color: #888ea8;">City</h4>
                    <hr style="border-top: 1px solid #888ea8;">
                    <form method="post" action="{{url('/city')}}">
                        @csrf
                        <div class="form-group mb-4">
                            <label>State name</label>
                            <select class="form-control  basic" name="state_id">
                                <option selected="selected">Select Your State</option>
                                @foreach($states as $key => $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label>City name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter City name" required>
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection