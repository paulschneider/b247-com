@extends('layouts.default')

@include('layouts.header')

@section('content')

@include("articles.partials.{$channelType}")

@endsection

@include('layouts.footer')