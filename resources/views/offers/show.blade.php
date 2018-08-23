@extends('layouts.app')

@section('content')

   <offers-view :offers=" {{ $offers }}"></offers-view>
@endsection
