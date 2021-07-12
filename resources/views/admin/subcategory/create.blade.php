@extends('layouts.master')


@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" style="width: auto;">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            <div class="col-md-6">
                <div class="statbox widget box box-shadow">
                    <h4 style="color: #888ea8;">Sub Category</h4>
                    <hr style="border-top: 1px solid #888ea8;">
                    <form method="post" action="{{url('/subcategory')}}">
                        @csrf
                        <div class="form-group mb-4">
                            <label>Category name</label>
                            <select class="form-control  basic" name="category_id">
                                <option selected="selected">Select Your Category</option>
                                
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label>Sub Category name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Sub Category name" required>
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection