@extends('layouts.app')


@section('content')
    <b-container fluid>
        <b-card>
            <b-card-body>
                <h1>{{ $product['fulltitle'] }}</h1>
                <hr>

            </b-card-body>
        </b-card>
    </b-container>
@endsection
