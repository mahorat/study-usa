<?php

namespace App\Helpers;

use App\User as U;
use App\StudentData as Student;
use Illuminate\Support\Facades\Auth;
use App\university_data as University;

class User
{
	public static function json($array){
		return json_decode(json_encode($array));
	}

	public static function user($id){

	    $data = [
	    	'id'      => null, 
	    	'role'    => null, 
	    	'name'    => null, 
	    	'email'   => null, 
	    	'photo'   => null, 
	    	'user_id' => null
	    ];

	    if(U::find($id) != false)
	    {

	        $student    = Student::where('id_user', $id)   ->get();
	        $university = University::where('user_id', $id)->get();
	        
	        if(count($student) == 1)
	        {
	            $student = User::json($student);
	            $student = $student[0];
	            $data = [
	                'id'      => $student->id,
	                'role'    => 'student',
	                'name'    => $student->name,
	                'email'   => $student->email,
	                'photo'   => $student->photo,
	                'user_id' => $student->id_user,
	            ];
	        }

	        elseif (count($university) == 1)
	        {
	            $university = User::json($university);
	            $university = $university[0];
	            $data = [
	                'id'      => $university->id,
	                'role'    => 'university',
	                'name'    => $university->university_name,
	                'email'   => $university->emp_email,
	                'photo'   => $university->logo,
	                'user_id' => $university->user_id,
	            ];
	        }

	        return User::json($data);
	    }

	    return User::json($data);
	}

	public static function is_student($id = false)
	{
		($id) ? $id = $id : $id = Auth::id();
		if(User::user($id)->role == "student") return true;
		return false;
	}

	public static function is_univer($id = false)
	{
		($id) ? $id = $id : $id = Auth::id();
		if(User::user($id)->role == "university") return true;
		return false;
	}

	public static function is_admin($id = false)
	{
		($id) ? $id = $id : $id = Auth::id();

		if(U::find($id) != false)
		{
			$user = U::where('id', $id)->get();
			$user = User::json($user);
			$user = $user[0];
			if($user->superadmin == 1) return true;
		}

		return false;
	}
}