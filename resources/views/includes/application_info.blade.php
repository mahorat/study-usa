@extends('includes.user_info')

@section('title', 'Profile info')

@section('user_content')

@foreach($data as $data)
@endforeach


@foreach($candidate as $candidate)
    <div class="profile-content">
            <h4>EDUCATION IMFORMATION</h4>
            <table class="table">
                <tr>
                    <td>School/University name</td>
                    <td>{{$data->name_of_the_school}}</td>
                </tr>
                <tr>
                    <td>School's address</td>
                    <td>{{$data->school_street}}</td>
                </tr>
                <tr>
                    <td>School's city</td>
                    <td>{{$data->school_city}}</td>
                </tr>
                <tr>
                    <td>School's Region</td>
                    <td>{{$data->region}}</td>
                </tr>
                <tr>
                    <td>School's location</td>
                    <td>
                        <?php $school_country = $country ?>
                        @foreach($school_country as $school_country)
                            @if($school_country->id == $data->school_location)
                                {{$school_country->country_name}}
                            @else
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Phone number</td>
                    <td>{{$candidate->school_phone}}</td>
                </tr>
                <tr>
                    <td>Other contact</td>
                    <td>{{$candidate->other_contact}}</td>
                </tr>
                <tr>
                    <td>Year of starting</td>
                    <td>{{$candidate->year_of_starting}}</td>
                </tr>
                <tr>
                    <td>Year of Ending</td>
                    <td>{{$candidate->year_of_ending}}</td>
                </tr>
                <tr>
                    <td>Level of English</td>
                    <td>{{$candidate->level_of_english}}</td>
                </tr>
                <tr>
                    <td><h4>SPONSOR INFORMATION </h4></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Your sponsor</td>
                    <td>{{$candidate->sponsor}}</td>
                </tr>
                <tr>
                    <td>Sponsor full Name</td>
                    <td>{{$candidate->sponsor_name}} {{$candidate->sponsor_middlename}}  {{$candidate->sponsor_lastname}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$candidate->sponsor_email}}</td>
                </tr>
                <tr>
                    <td>Phone number</td>
                    <td>{{$candidate->sponsor_phone}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{$candidate->sponsor_address}}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{$candidate->sponsor_city}}</td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td>{{$candidate->sponsor_region}}</td>
                </tr>
                <tr>
                    <td>Postal / Zip Code</td>
                    <td>{{$candidate->sponsor_zip}}</td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>
                        <?php $school_country = $country ?>
                        @foreach($school_country as $school_country)
                            @if($school_country->id == $candidate->sponsor_country)
                                {{$school_country->country_name}}
                            @else
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td><h4>PARENT INFORMATION</h4></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Father's Full name</td>
                    <td>{{$candidate->father_name}}</td>
                </tr>
                <tr>
                    <td>Father Occupation</td>
                    <td>{{$candidate->father_occupation}}</td>
                </tr>
                <tr>
                    <td>Mather's Full name</td>
                    <td>{{$candidate->mother_name}}</td>
                </tr>
                <tr>
                    <td>Mather Occupation</td>
                    <td>{{$candidate->mather_occupation}}</td>
                </tr>
                <tr>
                    <td>Gross annual income of your family</td>
                    <td>{{$candidate->indicate_your_family}}</td>
                </tr>
                <tr>
                    <td>Address </td>
                    <td>{{$candidate->parent_address}}</td>
                </tr>
                <tr>
                    <td>Address 2</td>
                    <td>{{$candidate->parent_address2}}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{$candidate->parent_city}}</td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td>{{$candidate->region}}</td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>
                        <?php $school_country = $country ?>
                        @foreach($school_country as $school_country)
                            @if($school_country->id == $candidate->sponsor_country)
                                {{$school_country->country_name}}
                            @else
                            @endif
                        @endforeach
                    </td>
                </tr>
            </table>
    </div>
@endforeach

@endsection