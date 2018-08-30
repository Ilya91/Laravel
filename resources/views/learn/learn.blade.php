@extends('layouts.custom')

@section('content')
<div class="container"  style="margin-bottom: 200px">
    <div class="row">
        <div class="col-md-8">
            <ul class="list-group">
                <a href="#" class="list-group-item active">
                    Categories
                </a>
                @foreach($categories as $category)
                    <a href="#" class="list-group-item">{{ $category->name }}</a>
                @endforeach

            </ul>
        </div>
    </div>
</div>
@endsection
