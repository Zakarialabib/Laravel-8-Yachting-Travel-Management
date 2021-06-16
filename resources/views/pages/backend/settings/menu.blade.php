@extends('layouts.backend')

@section('content')

{!! Menu::render() !!}

@endsection  

@push('scripts')

{!! Menu::scripts() !!}

@endpush