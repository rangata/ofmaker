@extends('layouts.app')

@section('content')
<customers-index :customers="{{ json_encode($customers) }}"></customers-index>
@endsection
