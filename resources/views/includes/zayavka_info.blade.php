@extends('includes.user_info')

@section('title', 'Profile info')

@section('user_content')
@foreach($data as $data)

@endforeach

@foreach($candidate as $candidate)
            <div class="profile-content">

			   <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				   <h3></h3>
                    <table class="table">
                        <tr>
                            <td></td>
                        </tr>
                    </table>
			   </div>
			</div>
			@endforeach

@endsection