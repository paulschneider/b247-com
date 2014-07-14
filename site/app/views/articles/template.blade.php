@extends('layouts.default')

@include('layouts.header')

@section('content')

@include("partials.tpl{$channelType}Article")

@endsection

@include('layouts.footer')