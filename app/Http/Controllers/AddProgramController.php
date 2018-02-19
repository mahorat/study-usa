<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class AddProgramController extends Controller
{

    public function index(){

        $degree = new \App\DegreeLevel;
        $speciality = new \App\Speciality;
        $univer = DB::table('university_datas')->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first();
        $id_univer = $univer->id;

        $programs = DB::table('programs')
            ->join('degree_levels', 'programs.id_degree_level', '=', 'degree_levels.id')
            ->join('specialities', 'programs.id_specialities', '=', 'specialities.id')
            ->where('id_univer', $id_univer)
            ->select('programs.*', 'degree_levels.degreeLevel','specialities.specialities')
            ->get();

        return view('includes.add_program', 
            [
                'DegreeLevel' => $degree->all(),
                'speciality'  => $speciality->all(),
                'data'        => $programs,
                'data2'       => $programs,
                'data3'       => $programs,
                'data4'       => $programs,
                'data5'       => $programs,
                'data6'       => $programs,
                'data7'       => $programs,
                'data8'       => $programs,
                'data9'       => $programs,
                'data10'      => $programs,
                'data11'      => $programs,
                'data12'      => $programs,
                'data13'      => $programs,
            ]);
    }

    public function add(Request $request){
        $post = $request->all();

        $univer = DB::table('university_datas')->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first();
        $id_univer = $univer->id;
        //$id_school = $univer->

        $program = new \App\programs;

        if (empty($post['language'])){
            $lang = null;
            $spec = $post['specialities'];
        }else{
            $lang = $post['language'];
            $spec = null;
        }

        

        if (empty($post['education_price'])){
            $price = null;
        }else{
            $price = $post['education_price'];
        }

        $program->id_univer = $id_univer;
      	$program->id_school_name = \Illuminate\Support\Facades\Auth::user()->id_school_name;
        $program->id_degree_level = $post['level'];
        $program->spec = $lang;
        $program->id_specialities = $spec;
        $program->budget = $post['budget'];
        $program->price = $price;
        $program->duration = $post['duration'];
        $program->seats = $post['place'];
        $program->year = $post['year'];

        if($program->Save()){
            return redirect('add_program');
        }

    }

    public function editIndex(Request $request){
        $post = $request->all();

        //if (\Illuminate\Support\Facades\Hash::check($post['id'], $post['token'])){
            $degree = new \App\DegreeLevel;
            $speciality = new \App\Speciality;

            $program = DB::table('programs')->where('id', $post['id'])->first();

            return view('includes.edit_program',
                [
                    'DegreeLevel' => $degree->all(), 
                    'speciality'  => $speciality->all(),
                    'data'        => $program 
                ]);
       // }else{
          //  return redirect()->back();
       // }
    }

        

    public function edit(Request $request)
    {
        $post = $request->all();

        // Проверка идентификатора программы
        if (\Illuminate\Support\Facades\Hash::check($post['id'], $post['token'])){

            $univer = DB::table('university_datas')->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first();
            $id_univer = $univer->id;

            $program = new \App\programs;

            if (empty($post['language'])){
                $lang = null;
                $spec = $post['specialities'];
            }else{
                $lang = $post['language'];
                $spec = null;
            }

            if (empty($post['education_price'])){
                $price = null;
            }else{
                $price = $post['education_price'];
            }

            $data = array(
                'id_univer'       => $id_univer,
              	'id_school_name' => \Illuminate\Support\Facades\Auth::user()->id_school_name,
                'id_degree_level' => $post['level'],
                'spec'            => $lang,
                'id_specialities' => $spec,
                'budget'          => $post['budget'],
                'price'           => $price,
                'duration'        => $post['duration'],
                'seats'           => $post['place'],
                'year'            => $post['year']
            );

            if($program->where('id', $post['id'])->update($data)){
                return redirect('add_program');
            }
        
        }else{
            return redirect()->back();
        }
    }





    //ajax post
    public function myformPost(Request $request)
    {

    	$validator = \Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        if ($validator->passes()) {

			return response()->json(['success'=>'Added new records.']);
        }

    	return response()->json(['error'=>$validator->errors()->all()]);
    }

}
