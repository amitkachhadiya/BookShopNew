@extends('layouts.master')


@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" style="width: auto;">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            <div class="col-md-6">
                <div class="statbox widget box box-shadow">
                    <h4 style="color: #888ea8;">Variations</h4>
                    <hr style="border-top: 1px solid #888ea8;">
                    <form method="post" action="{{url('/city')}}">
                        @csrf
                        <div class="form-group mb-4">
                            <label>Variation Type name</label>
                            <select class="form-control  basic" name="variation_type_id">
                                <option selected="selected">Select Your Variation Type</option>
                                
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label>Variation name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Variation name" required>
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection