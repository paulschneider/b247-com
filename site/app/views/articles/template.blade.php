@extends('layouts.default')

@include('layouts.header')

@section('content')

@include("articles.partials.{$channelType}.index")

@endsection

@include('layouts.footer')