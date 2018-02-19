@extends('layouts.app')

@section('content')

@section('title', 'Search Educational Program')

<link rel="stylesheet" href="{{URL::to('css/nouislider.min.css')}}">
<script src="{{URL::to('js/nouislider.min.js')}}"></script>
<script src="{{URL::to('js/md5.js')}}"></script>

<!-- Cart program -->

@if(Auth::check())
    <div class="btn-group cart">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:0px !important">
                <span class="fa fa-shopping-cart fa-lg"></span> <span class="badge">{{count($get_fav)}}</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu list-group cart-group" id="cartt">
                  
                    @foreach($get_fav as $get_fav)
                        <li class="list-group-item">
                            <div class="row">
                            <a href="program_detail/{{$get_fav->prog_id}}">
                                <div class="col-md-10">
                                    {{$get_fav->specialities}}<br>
                                    {{$get_fav->university_name}}
                                </div>
                            </a>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="btn btn-danger btn-xs" 
                                    onclick="delProgram({{$get_fav->prog_id}})">
                                        <span class="fa fa-remove"></span>
                                    </button>
                                </div>                
                            </div>
                        </li>
                    @endforeach
                 
                </ul>
            </div>
 @else
                 
@endif

<div class="menu-bg"></div>
    <div class="search-bg">
        <h2 class="bg-header">Search Educational Program</h2>
    </div>
    <div class="container search-header"><br>
        <div class="c col-md-3">
            <form>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">School Location</label>
                    <select name="school_location" onchange="cchange()" class="form-control">
                        <option value="0">All states</option>
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{ $state->state }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">College/University</label>
                    <select name="spec_id" onchange="selectt()" class="form-control">
                        <option value="0">All school</option>
                        @foreach ($school as $school)
                                <option value="{{$school->id}}" {{$school->id == $arr[0] ? 'selected' : ''}}>{{$school->school}}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="">Degree Level</label>
                    <select id="specId"  name="level" onchange="cchange()" class="form-control">
                        <option value="0">All Levels</option>
                    @foreach ($DegreeLevel as $Degree)
                        <option value="{{ $Degree->id }}" {{$Degree->id == $arr[1] ? 'selected' : ''}}>{{ $Degree->degreeLevel }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Field of Study</label>
                    <select name="spec" onchange="cchange()" class="form-control">
                        <option value="0">All specialities</option>
                    @foreach ($speciality as $spec)
                        <option value="{{ $spec->id }}" {{$spec->id == $arr[2] ? 'selected' : ''}}>{{ $spec->specialities }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <select id="price"  onchange="cchange()" class="form-control">
                        <option value="" selected disabled hidden>Please select</option>
                        <option value="500,5000">$500 - $5,000</option>
                        <option value="5000,15000">$5,000 - $15,000</option>
                        <option value="15000,25000">$15,000 - $25,000</option>
                        <option value="25000,1000000000000000">above $25,000</option>
                    </select><br>
                    <input type="checkbox" id="budget" name="budjet">
                    <label for="budget" style="font-weight:normal">Scholarship</label>
                    <!-- <div id="slider"></div>
                    <br>
                     -->
                </div>
            </form><br><br>
        </div>
        <div class="col-md-9" id="listPrograms">
            
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="text-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class=""><a href="#">2 <span class="sr-only">(current)</span></a></li>
                            <li class=""><a href="#">3 <span class="sr-only">(current)</span></a></li>
                            <li class=""><a href="#">4 <span class="sr-only">(current)</span></a></li>
                            <li class=""><a href="#" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<script src="{{URL::to('js/filter.js?version=10')}}"></script>
@endsection