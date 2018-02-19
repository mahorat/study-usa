
@extends('includes.user_info')

@section('title', 'Profile info')

@section('user_content')

		@foreach($data as $data)
            <div class="profile-content">

			   <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				   <h3>Personal data</h3>
				   <table class="table">
					   <tr>
						   <td>Name</td>
						   <td>{{$data->name}}</td>
					   </tr>
					   <tr>
						<td>Surname</td>
						<td>{{$data->surname}}</td>
					</tr>
					@if(!empty($data->middlename))
					<tr>
						<td>Middle name</td>
						<td>{{$data->middlename}}</td>
					</tr>
					@endif
					<tr>
						<td>Place of the Birth</td>
						<td>
							@foreach($place as $place)
								{{$place->country_name}}
							@endforeach
						</td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td>{{$data->day}}-{{$data->month}}-{{$data->year}}</td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>
							@if($data->gender == 1)
								Male
							@else
								Female
							@endif
						</td>
					</tr>
					<tr>
						<td>Citizenship</td>
						<td>
							@foreach($citizenship as $citizenship)
								{{$citizenship->country_name}}
							@endforeach
						</td>
					</tr>
					<tr>
						<td><h3>Contact Information</h3></td>
						<td></td>
					</tr>
					<tr>
						<td>Address of permanent residence</td>
						<td>
							@foreach($per_country as $per_country)
								{{$per_country->country_name}}, 
							@endforeach
							{{$data->region}}, {{$data->city}}, {{$data->address}}
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>{{$data->email}}</td>
					</tr>
					<tr>
						<td>Phone number</td>
						<td>{{$data->phone_number}}</td>
					</tr>
					<tr>
						<td><h3>Education</h3></td>
						<td></td>
					</tr>
					<tr>
						<td>Level of education</td>
						<td>@foreach ($level as $level)
								{{$level->level}}
							@endforeach</td>
					</tr>
					<tr>
						<td>Name of the school</td>
						<td>{{$data->name_of_the_school}}</td>
					</tr>
					<tr>
						<td>Location of the school</td>
						<td>
							@foreach ($school_loc as $school_loc)
								{{$school_loc->country_name}}, 
							@endforeach
							{{$data->school_city}}, {{$data->school_street}}
						</td>
					</tr>
					<tr>
						<td>Year of starting</td>
						<td>{{$data->year_of_starting}}</td>
					</tr>
					<tr>
						<td>Year of ending</td>
						<td>{{$data->year_of_ending}}</td>
					</tr>
					<tr>
						<td>Level of english</td>
						<td>{{$data->level_of_english}}</td>
					</tr>

				   </table>
			   </div>
			</div>
			@endforeach





@endsection
