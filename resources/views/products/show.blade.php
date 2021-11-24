@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <button class="btn btn-info">
                <a href="{{ url()->previous() }}">Back</a>
            </button>
            <div class="row mb-3">
                <div class="grid">
                    <div>
                        <div class="image">
                            <div>
                                <img src="{{ 'data:image/png;base64, ' . $product['cover'] }}"
                                    alt="{{ $product['title'] }}">
                            </div>
                        </div>
                        <div class="title">
                            <div>
                                <h1>{{ $product['title'] }}</h1>
                            </div>
                        </div>
                        <div>
                            <ul>
                                <li>{{ $product['tagline'] }}</li>
                                <li>{{ $product['pages'] }} pages</li>
                                <li>{{ $product['length'] }}</li>
                                <li>{{ $product['concept'] }}</li>
                            </ul>
                        </div>
                        <div>
                            <div>
                                @foreach ($product['authors'] as $author)
                                    <span title="{!! $author['about'] !!}">
                                        {{ $author['name'] }}
                                        <br>
                                    </span>
                                @endforeach
                            </div>
                            <div>
                                @foreach ($product['prices'] as $key => $price)
                                    <span>
                                        @php($elementKey = array_key_first($price))
                                            {{ ucfirst($key) }} : <b>{{ $price[$elementKey] . ' ' . $elementKey }}</b>
                                        </span>
                                        <br>
                                    @endforeach
                                </div>
                                <div>
                                    {!! $product['learn'] !!}
                                    {!! $product['features'] !!}
                                    {!! $product['description'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
