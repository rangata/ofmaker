@extends('layouts.app')

@section('content')
    <customers-details :customer="{{ json_encode($customers) }}"></customers-details>
@endsection
