@extends('layouts.app')

@section('title', 'Profile filling')

@section('content')
    <!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
	<link href="{{URL::to('css/university-form/material-bootstrap-wizard.css')}}" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{URL::to('css/university-form/demo.css')}}" rel="stylesheet" />

	<link rel="stylesheet" href="{{ URL::to('css/datetime/css/bootstrap-datepicker.css') }}">
	<script src="{{ URL::to('css/datetime/js/bootstrap-datepicker.js') }}"></script>


<div class="image-container set-full-height" style="background-image: url({{URL::to('img/bgg.jpg')}})">

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizard">
		                    <form action="{{Route('student_data_save')}}" method="post">
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->
							{{csrf_field()}}
		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
                                        Filling in the data
		                        	</h3>
									<h5>This information will let us know more about you.</h5>
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#details" data-toggle="tab">Basic information</a></li>
			                            <li><a href="#captain" data-toggle="tab">Basic information</a></li>
			                            <li><a href="#description" data-toggle="tab">Stydy information</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
									<form action="" method="Post">
		                            <div class="tab-pane" id="details">
		                            	<div class="row">
		                                	<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating  {{ $errors->has('name') ? 'has-error' : '' }}">
			                                          	<label class="control-label">Name</label>
			                                          	<input name="name" type="text" class="form-control" value="{{ old('name') }}">
														<span class="text-danger">{{ $errors->first('name') }}</span>
													</div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating {{ $errors->has('surname') ? 'has-error' : '' }}">
			                                          	<label class="control-label">Surname</label>
														  <input name="surname" type="text" class="form-control" value="{{ old('surname') }}">
														  <span class="text-danger">{{ $errors->first('surname') }}</span>
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Middle name</label>
														  <input name="middlename" type="text" class="form-control" value="{{ old('middlename') }}">
														  <span class="text-danger">{{ $errors->first('middlename') }}</span>
			                                        </div>
												</div>

		                                	</div>

		                            	</div>
		                            </div>
		                            <div class="tab-pane" id="captain">
		                                
		                                <div class="row">
		                                    <div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
			                                          	<div class="form-group label-floating {{ $errors->has('place_of_birth') ? 'has-error' : '' }}">
															<label class="control-label">Place of birth (in accourdance with the passport)</label>
															<select name="place_of_birth" id="" class="form-control">
																<option value=""></option>
																@foreach($stud_data as $stud_data)
																	<option value="{{$stud_data->id}}">{{$stud_data->country_name}}</option>
																@endforeach
															</select>
															<span class="text-danger">{{ $errors->first('place_of_birth') }}</span>
														</div>
			                                        
												</div>
													<br>
												<div class="input-group">
													<span class="input-group-addon"></span>
													<div class="row col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-bottom:-20px">
														<label for="">Birth Date</label>
													</div>
													<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 row">
														<div class="form-group label-floating {{ $errors->has('day') ? 'has-error' : '' }}">
															<label class="control-label">Day</label>
															<input name="day" type="number" max="31" min="1" class="form-control" value="{{ old('day') }}">
															<span class="text-danger">{{ $errors->first('day') }}</span>
														</div>
													</div>
													<div class=" col-md-4 col-lg-4 col-sm-4 col-xs-12">
														<div class="form-group label-floating {{ $errors->has('month') ? 'has-error' : '' }}">
															<label class="control-label">Months</label>
															<input name="month" type="number" max="12" min="1" class="form-control" value="{{ old('month') }}">
															<span class="text-danger">{{ $errors->first('month') }}</span>
														</div>
													</div>
													
													<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
														<div class="form-group label-floating {{ $errors->has('year') ? 'has-error' : '' }}">
															<label class="control-label">Year</label>
															<input name="year" type="number" class="form-control" value="{{ old('year') }}">
															<span class="text-danger">{{ $errors->first('year') }}</span>
														</div>		
													</div>
													
												</div>
													<br>
												<div class="input-group text-left">
													<span class="input-group-addon"></span>
													<label for="">Gender</label><br>
													<input type="radio" id="radio" name="gender" value="1" ><label for="radio"> Male <span class="fa fa-male" style="color:black; font-size:20px"></span></label><br>
													<input type="radio" id="radio2" name="gender" value="0" ><label for="radio2"> FeMale  <span class="fa fa-female" style="color:black; font-size:20px"></span></label>
												</div>
												<br>
												<div class="input-group">
														<span class="input-group-addon">
															
														</span>
															  <div class="form-group label-floating {{ $errors->has('citizenship') ? 'has-error' : '' }}">
																<label class="control-label">Citizenship</label>
																<select name="citizenship" id="" class="form-control">
																	<option value=""></option>
																	@foreach($country as $country)
																		<option value="{{$country->id}}">{{$country->country_name}}</option>
																	@endforeach
																</select>
																<span class="text-danger">{{ $errors->first('citizenship') }}</span>
															</div>
													</div>
													<br>
													<div class="input-group">
														<span class="input-group-addon">
															
														</span>
														<div class="form-group label-floating {{ $errors->has('per_country') ? 'has-error' : '' }}">
																<label class="control-label">Country of permanent residence</label>
																<select name="per_country" id="" class="form-control">
																	<option value=""></option>
																	@foreach($per_country as $per_country)
																		<option value="{{$per_country->id}}">{{$per_country->country_name}}</option>
																	@endforeach
																</select>
																<span class="text-danger">{{ $errors->first('per_country') }}</span>
														</div>
													</div>
													
													<div class="input-group">
														<span class="input-group-addon"></span>
														<div class="form-group label-floating {{ $errors->has('postal_code') ? 'has-error' : '' }}">
															<label class="control-label">Zip/Postal code</label>
															<input name="postal_code" type="text" class="form-control" value="{{ old('postal_code') }}">
															<span class="text-danger">{{ $errors->first('postal_code') }}</span>
														</div>
													</div>
													
													<div class="input-group">
														<span class="input-group-addon"></span>
														<div class="form-group label-floating {{ $errors->has('region') ? 'has-error' : '' }}">
															<label class="control-label">Region</label>
															<input name="region" type="text" class="form-control" value="{{ old('region') }}">
															<span class="text-danger">{{ $errors->first('region') }}</span>
														</div>
													</div>
													
													<div class="input-group">
														<span class="input-group-addon"></span>
														<div class="form-group label-floating {{ $errors->has('city') ? 'has-error' : '' }}">
																<label class="control-label">City</label>
																<input name="city" type="text" class="form-control" value="{{ old('city') }}">
																<span class="text-danger">{{ $errors->first('city') }}</span>
															</div>
													</div>

													<div class="input-group">
														<span class="input-group-addon"></span>
														<div class="form-group label-floating {{ $errors->has('address') ? 'has-error' : '' }}">
																<label class="control-label">Address of permanent residence</label>
																<input name="address" type="text" class="form-control" value="{{ old('address') }}">
																<span class="text-danger">{{ $errors->first('address') }}</span>
															</div>
													</div>
													
													<div class="input-group">
														<span class="input-group-addon"></span>
														<div class="form-group label-floating {{ $errors->has('email') ? 'has-error' : '' }}">
															<label class="control-label">Email</label>
															<input name="email" type="text" class="form-control" value="{{ old('email') }}">
															<span class="text-danger">{{ $errors->first('email') }}</span>
														</div>
													</div>

													<div class="input-group">
														<span class="input-group-addon"></span>
														<div class="form-group label-floating {{ $errors->has('phone_number') ? 'has-error' : '' }}">
															<label class="control-label">Phone Number</label>
															<input name="phone_number" type="text" class="form-control" value="{{ old('phone_number') }}">
															<span class="text-danger">{{ $errors->first('phone_number') }}</span>
														</div>
													</div>
													<br>

		                                	</div>
											
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="description">
		                                <div class="row">
		                                    <div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating {{ $errors->has('level') ? 'has-error' : '' }}" >
			                                          	<label class="control-label">Level of education</label>
														<select name="level" id="" class="form-control" required>
															<option selected disabled></option>
															@foreach($level as $level)
																<option value="{{$level->id}}">{{$level->level}}</option>
															@endforeach
														</select>
														<span class="text-danger">{{ $errors->first('level') }}</span>
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon"></span>
													<div class="form-group label-floating {{ $errors->has('name_of_the_school') ? 'has-error' : '' }}">
			                                          	<label class="control-label">Name of the school</label>
			                                          	<input name="name_of_the_school" type="text" class="form-control" value="{{ old('name_of_the_school') }}">
														  <span class="text-danger">{{ $errors->first('name_of_the_school') }}</span>
													</div>
												</div>
												<br>
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
			                                          	<div class="form-group label-floating {{ $errors->has('school_location') ? 'has-error' : '' }}">
															<label class="control-label">Location of the School</label>
															<select name="school_location" id="" class="form-control">
																<option value=""></option>
																@foreach($school_loc as $school_loc)
																	<option value="{{$school_loc->id}}">{{$school_loc->country_name}}</option>
																@endforeach
															</select>
															<span class="text-danger">{{ $errors->first('school_location') }}</span>
														</div>
												</div>

												<div class="input-group">
													<span class="input-group-addon"></span>
													<div class="form-group label-floating {{ $errors->has('school_city') ? 'has-error' : '' }}">
															<label class="control-label">City</label>
															<input name="school_city" type="text" class="form-control" value="{{ old('school_city') }}">
															<span class="text-danger">{{ $errors->first('school_city') }}</span>
														</div>
												</div>
												
												<div class="input-group">
													<span class="input-group-addon"></span>
													<div class="form-group label-floating {{ $errors->has('school_street') ? 'has-error' : '' }}">
														<label class="control-label">Street, House, Building, structure</label>
														<input name="school_street" type="text" class="form-control" value="{{ old('school_street') }}">
														<span class="text-danger">{{ $errors->first('school_street') }}</span>
													</div>
												</div>

												<div class="input-group">
													<span class="input-group-addon"></span>
													<div class="form-group label-floating {{ $errors->has('year_of_starting') ? 'has-error' : '' }}">
														<label class="control-label">What year are you in ?</label>
														<input name="year_of_starting" type="number" class="form-control" value="{{ old('year_of_starting') }}">
														<span class="text-danger">{{ $errors->first('year_of_starting') }}</span>
													</div>
												</div>

												<div class="input-group">
													<span class="input-group-addon"></span>
													<div class="form-group label-floating {{ $errors->has('year_of_ending') ? 'has-error' : '' }}">
														<label class="control-label">Year of ending</label>
														<input name="year_of_ending" type="number" class="form-control" value="{{ old('year_of_ending') }}">
														<span class="text-danger">{{ $errors->first('year_of_ending') }}</span>
													</div>
												</div>

												<div class="input-group">
													<span class="input-group-addon"></span>
													<div class="form-group label-floating {{ $errors->has('level_of_english') ? 'has-error' : '' }}">
														<label class="control-label">Level of English</label>
														<input name="level_of_english" type="text" class="form-control" value="">
														<span class="text-danger">{{ $errors->first('level_of_english') }}</span>
													</div>
												</div>


		                                	</div>
		                             
		                                </div>
									</div>
								
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <a href="#"><input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' /></a>
	                                    <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Save' />
	                                </div>
	                                <div class="pull-left">
	                                    <a href="#"><input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' /></a>
	                                </div>
	                                <div class="clearfix"></div>
	                        	</div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
		</div> <!--  big container -->
	</div>

    <script src="{{URL::to('js/university-form/jquery.bootstrap.js')}}" type="text/javascript"></script>
    	<!--  Plugin for the Wizard -->
	<script src="{{URL::to('js/university-form/material-bootstrap-wizard.js')}}"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="{{URL::to('js/university-form/jquery.validate.min.js')}}"></script>

	<script type="text/javascript">

		(function ($){
			$(function (){
				$('.btn-file').each(function (){
					var self = this;
					$('input[type=file]', this).change(function (){
						// remove existing file info
						$(self).next().remove();
						// get value
						var value = $(this).val();
						// get file name
						var fileName = value.substring(value.lastIndexOf('/')+1);
						// get file extension
						var fileExt = fileName.split('.').pop().toLowerCase();
						// append file info
						$('<span><i class="icon-file icon-' + fileExt + '"></i> ' + fileName + '</span>').insertAfter(self);
					});
				});
			});
		})(jQuery);
	</script>
@endsection