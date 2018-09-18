@extends('layouts.custom')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <prop-component :urldata="{{ $categories }}"></prop-component>
            </div>
        </div>
    </div>
@endsection
