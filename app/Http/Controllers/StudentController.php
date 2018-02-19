<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
     public function get_fav(){
       return $get_fav = DB::table('favorites')
            ->join('programs', 'favorites.id_program', '=', 'programs.id')
            ->join('specialities','programs.id_specialities', '=','specialities.id' )
            ->join('university_datas','programs.id_univer','=', 'university_datas.id')
            ->where('favorites.id_user', Auth::user()->id)
            ->select('favorites.id', 'programs.id as prog_id', 'favorites.id_user', 'specialities.specialities', 'university_datas.university_name')
            ->get();
    }

    public function index(){

        $stud_data = $country = $per_country = $school_loc = new \App\Country;
        $level = new \App\Level;

        return view('includes.profile-filling', [
            'level' =>$level->all(),
            'stud_data' => $stud_data->all(),
            'country'   => $country->all(),
            'per_country' => $per_country->all(),
            'school_loc' => $school_loc->all()
        ]);
    }

    public function save(Request $request){
        $post = $request->all();

        $validator=\Validator::make($request->all(),
        [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'place_of_birth' => 'required',
            'month' => 'required|numeric',
            'day' => 'required|numeric',
            'year' => 'required|numeric|min:4',
            'citizenship' => 'required',
            'per_country'=> 'required',
            'postal_code' => 'required|min:2',
            'region' => 'required|min:2',
            'city' => 'required|min:2',
            'address' => 'required|min:2',
            'email' => 'required|min:5',
            'phone_number' => 'required|min:5',
            'level' => 'required',
            'name_of_the_school' => 'required|min:3',
            'school_location' => 'required',
            'school_city' => 'required|min:3',
            'school_street' => 'required|min:3',
            //'year_of_starting' => 'require|numeric|min:3',
            'year_of_ending' => 'required|numeric|min:4',
            //'level_of_english' => 'require|min:3'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            $data = new \App\StudentData;

            $data->id_user = \Illuminate\Support\Facades\Auth::user()->id;
            $data->name = $post['name'];
            $data->surname = $post['surname'];
            $data->middlename = $post['middlename'];
            $data->place_of_the_birth = $post['place_of_birth'];
            $data->month = $post['month'];
            $data->day = $post['day'];
            $data->year = $post['year'];
            $data->gender = $post['gender'];
            $data->citizenship = $post['citizenship'];
            $data->per_country = $post['per_country'];
            $data->postal_code = $post['postal_code'];
            $data->region = $post['region'];
            $data->city = $post['city'];
            $data->address = $post['address'];
            $data->email = $post['email'];
            $data->phone_number = $post['phone_number'];
            $data->id_level = $post['level'];
            $data->name_of_the_school = $post['name_of_the_school'];
            $data->school_location = $post['school_location'];
            $data->school_city = $post['school_city'];
            $data->school_street = $post['school_street'];
            $data->year_of_starting = $post['year_of_starting'];
            $data->year_of_ending = $post['year_of_ending'];
            $data->level_of_english = $post['level_of_english'];

            if($data->Save()){
                return redirect('profile-info');
            }
        }
    }


    public function info() {

        $data = DB::table('student_datas')->where('id_user', Auth::user()->id)->get();

        foreach ($data as $users) {
            $place = $users->place_of_the_birth;
            $citizen = $users->citizenship;
            $per = $users->per_country;
            $school = $users->school_location;
            $level = $users->id_level;
        }

        $place_of_the_b = DB::table('countries')->select('country_name')->where('id', $place)->get();
        $citizenship = DB::table('countries')->select('country_name')->where('id', $citizen)->get();
        $per_country = DB::table('countries')->select('country_name')->where('id', $per)->get();
        $school_loc = DB::table('countries')->select('country_name')->where('id', $school)->get();
        $levell = DB::table('levels')->select('level')->where('id', $level)->get();

        $id_stud = \Illuminate\Support\Facades\Auth::user();
        $cc = DB::table('countries')->select('country_code')->where('id', $citizen)->first();

        foreach ($cc as $cc) {
            $cc = $cc;
        }

        $id_stud = 'IJUNIOR-'.$cc.'-'.$id_stud->id.'-'.substr($id_stud->created_at,2,2);

        return view('includes.profile-info', [
            'id_stud' => $id_stud,
            'data' => $data,
            'place' => $place_of_the_b,
            'citizenship' => $citizenship,
            'per_country' => $per_country,
            'school_loc' => $school_loc,
            'level' => $levell,
            'overview' => 'active',
            'get_fav' => $this->get_fav(),
        ]);
    }

    // Изменение данных студента
    public function editIndex(){

        $stud_data = $country = $per_country = $school_loc = new \App\Country;
        $level = new \App\Level;
        $data = DB::table('student_datas')->where('id_user', Auth::user()->id)->get();
        
            return view('includes.profile-edit', [
                'stud_data' => $stud_data->all(),
                'country'   => $country->all(),
                'per_country' => $per_country->all(),
                'school_loc' => $school_loc->all(),
                'data' => $data,
                'level' => $level->all()
            ]);
    }

    public function edit(Request $request) {
        $post = $request->all();
        
        $validator=\Validator::make($request->all(),
        [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'place_of_birth' => 'required',
            'month' => 'required|numeric',
            'day' => 'required|numeric',
            'year' => 'required|numeric|min:4',
            'citizenship' => 'required',
            'per_country'=> 'required',
            'postal_code' => 'required|min:2',
            'region' => 'required|min:2',
            'city' => 'required|min:2',
            'address' => 'required|min:2',
            'email' => 'required|min:5',
            'phone_number' => 'required|min:5',
            'level' => 'required',
            'name_of_the_school' => 'required|min:3',
            'school_location' => 'required',
            'school_city' => 'required|min:3',
            'school_street' => 'required|min:3',
            'year_of_ending' => 'required|numeric|min:4',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            
            $stud_data = new \App\StudentData;

            $data = array(
                'id_user' => \Illuminate\Support\Facades\Auth::user()->id,
                'name'  => $post['name'],
                'surname'  => $post['surname'] ,
                'middlename'  => $post['middlename'] ,
                'place_of_the_birth'  => $post['place_of_birth'] ,
                'month'  => $post['month'] ,
                'day'  => $post['day'] ,
                'year'  => $post['year'] ,
                'gender'  => $post['gender'] ,
                'citizenship'  => $post['citizenship'] ,
                'per_country'  => $post['per_country'] ,
                'postal_code'  => $post['postal_code'] ,
                'region'  => $post['region'] ,
                'city'  => $post['city'] ,
                'address'  => $post['address'] ,
                'email'  => $post['email'] ,
                'phone_number'  => $post['phone_number'] ,
                'id_level'  => $post['level'] ,
                'name_of_the_school'  => $post['name_of_the_school'] ,
                'school_location'  => $post['school_location'] ,
                'school_city'  => $post['school_city'] ,
                'school_street'  => $post['school_street'],
                'year_of_starting' => $post['year_of_starting'],
                'year_of_ending'  => $post['year_of_ending'],
                'level_of_english' => $post['level_of_english'],
            );

            if($stud_data->where('id_user', Auth::user()->id)->update($data)){
                return redirect('profile-info');
            }else{
                return redirect('profile-info');
            };
        }
    }   

    public function ajaxImageUpload()
    {
    	return view('includes.profile-info');
    }

    public function ajaxImageUploadPost(Request $request)
    {
      $validator = \Validator::make($request->all(), [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
      ]);

      if ($validator->passes()) {

        $input = $request->all();
        $path = time().'.'.$request->image->getClientOriginalExtension();
        $input['image'] = $path;
        $request->image->move(public_path('../storage/app/documents/'.\Illuminate\Support\Facades\Auth::user()->id.'/'), $input['image']);

        \App\StudentData::where('id_user', \Illuminate\Support\Facades\Auth::user()->id)
        ->update(['photo' => $path]);

        return response()->json(['success'=>'done']);
      }

      return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function application_info(){
        $data = DB::table('student_datas')->where('id_user', Auth::user()->id)->get();
        $candidate = new \App\CandidateData;

        foreach ($data as $users) {
            $citizen = $users->citizenship;
        }

        $id_stud = \Illuminate\Support\Facades\Auth::user();
        $cc = DB::table('countries')->select('country_code')->where('id', $citizen)->first();

        $country = new \App\Country;

        foreach ($cc as $cc) {
            $cc = $cc;
        }

        $id_stud = 'IJUNIOR-'.$cc.'-'.$id_stud->id.'-'.substr($id_stud->created_at,2,2);

        return view('includes.application_info',
            [
                'id_stud' => $id_stud,
                'zayavka' => 'active',
                'data' => $data,
                'candidate' => $candidate->all(),
                'country' => $country->all(),
                'get_fav' => $this->get_fav()
            ]
        );
    }
}
