@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('products.list')
        </div>
    </div>
@endsection
