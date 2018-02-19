@extends('layouts.app')

@section('content')
<?php
		$info = DB::table('university_datas')->where('user_id', Auth::user()->id)->first();
		
		$state = DB::table('states')->select('state', 'id')->get();

    ?>
    <!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
	<link href="{{URL::to('css/university-form/material-bootstrap-wizard.css')}}" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{URL::to('css/university-form/demo.css')}}" rel="stylesheet" />


<div class="image-container set-full-height" style="background-image: url({{URL::to('img/bgg.jpg')}});">

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizard">
		                    <form action="{{ Route('editUniverInfo') }}" method="POST" enctype="multipart/form-data">
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
			                            <li><a href="#captain" data-toggle="tab">Data</a></li>
			                            <li><a href="#description" data-toggle="tab">Employees</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="details">
		                            	<div class="row">
			                          
		                                	<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating {{ $errors->has('university_name') ? 'has-error' : '' }}">
														<label class="control-label">Full name of the educational institution</label>
														<input name="university_name" type="text" value="{{ $info->university_name }}" class="form-control" required>
														<span class="text-danger">{{ $errors->first('university_name') }}</span>
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating {{ $errors->has('abbreviated') ? 'has-error' : '' }}">
			                                          	<label class="control-label">Abbreviated name of the university</label>
														  <input name="abbreviated" type="text" value="{{ $info->abbreviated }}" class="form-control" required>
														  <span class="text-danger">{{ $errors->first('abbreviated') }}</span>
			                                        </div>
												</div>

		                                	</div>
		                                	<div class="col-sm-6">
		                                    	<div class="form-group label-floating {{ $errors->has('short_description') ? 'has-error' : '' }}">
		                                        	<label class="control-label">Short description</label>
													<textarea class="form-control" name="short_description"  placeholder="" rows="5" required>{{ $info->short_description }}</textarea>
													<span class="text-danger">{{ $errors->first('short_description') }}</span>
		                                    	</div>
											</div>
		                            	</div>
		                            </div>
		                            <div class="tab-pane" id="captain">
		                                
		                                <div class="row">
		                                    <div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating">
			                                          	<div class="form-group label-floating">
															<label class="control-label">State</label>
															<select class="form-control" name="state" required>
																@foreach($state as $state)
																	@if($state->id == $info->id_state)
																		<option value="{{$state->id}}" selected>{{$state->state}}</option>
																	@else
																		<option value="{{$state->id}}">{{$state->state}}</option>
																	@endif
																@endforeach
															</select>
														</div>
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating {{ $errors->has('city') ? 'has-error' : '' }}">
			                                          	<label class="control-label">City</label>
														  <input name="city" type="text" class="form-control" value="{{ $info->city }}" required>
														  <span class="text-danger">{{ $errors->first('city') }}</span>
			                                        </div>
												</div>

		                                	</div>
		                                	<div class="col-sm-6">
		                                    	<div class="form-group label-floating {{ $errors->has('street') ? 'has-error' : '' }}">
		                                        	<label class="control-label">Street, house of a building</label>
													<input name="street" type="text" class="form-control" value="{{ $info->street }}" required>
													<span class="text-danger">{{ $errors->first('street') }}</span>
												</div>
												
												<div class="form-group label-floating {{ $errors->has('university_website') ? 'has-error' : '' }}">
		                                        	<label class="control-label">University website</label>
													<input name="university_website" type="text" class="form-control" value="{{ $info->university_website }}">
													<span class="text-danger">{{ $errors->first('university_website') }}</span>
												</div>

											</div>
											
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="description">
		                                <div class="row">
		                                    <div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating {{ $errors->has('emp_fullname') ? 'has-error' : '' }}">
			                                          	<label class="control-label">Full name</label>
														  <input name="emp_fullname" type="text" class="form-control" value="{{ $info->emp_fullname }}" required>
														  <span class="text-danger">{{ $errors->first('emp_fullname') }}</span>
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														
													</span>
													<div class="form-group label-floating {{ $errors->has('emp_position') ? 'has-error' : '' }}">
			                                          	<label class="control-label">Position</label>
														  <input name="emp_position" type="text" class="form-control" value="{{ $info->emp_position }}">
														  <span class="text-danger">{{ $errors->first('emp_position') }}</span>
			                                        </div>
												</div>

		                                	</div>
		                                	<div class="col-sm-6">
		                                    
												<div class="form-group label-floating {{ $errors->has('emp_email') ? 'has-error' : '' }}">
		                                        	<label class="control-label">E-mail</label>
													<input name="emp_email" type="text" class="form-control" value="{{ $info->emp_email }}">
													<span class="text-danger">{{ $errors->first('emp_email') }}</span>
												</div>

												<div class="form-group label-floating {{ $errors->has('emp_phone') ? 'has-error' : '' }}">
		                                        	<label class="control-label">Work phone</label>
													<input name="emp_phone" type="text" class="form-control" value="{{ $info->emp_phone }}">
													<span class="text-danger">{{ $errors->first('emp_phone') }}</span>
												</div>
											</div>
		                                </div>
		                            </div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
	                                    <input type='submit'class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Save' />
	                                </div>
	                                <div class="pull-left">
	                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
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