@extends('layouts.custom')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <prop-component :urldata="{{ $categories }}"></prop-component>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ajax-component></ajax-component>
            </div>
        </div>
        <div class="row">
            <chartline-component></chartline-component>
        </div>
        <div class="row">
            <div id="example"></div>
        </div>
    </div>
@endsection
