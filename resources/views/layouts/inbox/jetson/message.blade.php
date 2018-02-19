@extends('layouts/inbox/jetson/layouts.inbox-app')

@section('styles')
	@include('layouts/inbox/jetson/includes.styles')
@endsection

@section('top-menu')
	@include('layouts/inbox/jetson/includes.top-menu')
@endsection

@section('left-sidebar-menu')
	@include('layouts/inbox/jetson/includes.left-sidebar-menu')
@endsection

@section('title')
	@include('layouts/inbox/jetson/includes.title')
@endsection

@section('left-navbar')
	@include('layouts/inbox/jetson/includes.left-navbar')
@endsection

@section('content')
	@include('layouts/inbox/jetson/includes.message')
@endsection

@section('scripts')
	@include('layouts/inbox/jetson/includes.scripts')
@endsection

