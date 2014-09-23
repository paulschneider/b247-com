@extends('layouts.default')

@include('layouts.header')

@section('content')

@include("articles.partials.{$channelType}.index")

@include('channels.partials.sub-nav')

@endsection

@include('layouts.footer')