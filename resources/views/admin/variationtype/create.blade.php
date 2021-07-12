@extends('layouts.master')


@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" style="width: auto;">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            <div class="col-md-6">
                <div class="statbox widget box box-shadow">
                <h4>Variation Type</h4>
                    <form method="post" action="{{url('/variationtype')}}">
                    @csrf
                        <div class="form-group mb-4">
                            <input type="text" class="form-control" name="name" placeholder="Enter Variation Type name" required >
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection