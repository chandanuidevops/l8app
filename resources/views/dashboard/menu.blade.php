@extends('dashboard.layout')
@section('content')
{!! Menu::render() !!}
@endsection
@push('scripts')
{!! Menu::scripts() !!}
@endpush