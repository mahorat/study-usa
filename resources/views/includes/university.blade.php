@extends('layouts.app')

@section('content')

    <?php
        $info = DB::table('university_datas')->where('user_id', Auth::user()->id)->first();

    ?>

    @if(count($info) > 0)
        @include('includes.university_info')
    @else
        @include('includes.university_filling')
    @endif

@endsection