<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProgramDetailController extends Controller
{
    public function index($id = null){

        // Programs

        $degree = new \App\DegreeLevel;
                
        //
            $program = DB::table('programs')
            ->join('university_datas', 'programs.id_univer', '=', 'university_datas.id')
            //->join('degree_levels', 'programs.id_degree_level', '=', 'degree_levels.id')
            ->join('specialities', 'programs.id_specialities', '=', 'specialities.id')
            ->where('programs.id', $id)
            ->select(
                    'programs.id',
                    'programs.price',
              		'programs.id_univer',
                    'programs.duration',
                    'programs.id_degree_level',
                    
                    'specialities.specialities',
    
                    'university_datas.university_name',
                    'university_datas.university_website',
                    'university_datas.user_id',
                    'university_datas.short_description',
                    'university_datas.id_state',
                    'university_datas.city',
                    'university_datas.street',
                    'university_datas.logo',
                    'university_datas.emp_phone'
            )
            ->get();

            $id_univer = DB::table('programs')->select('id_univer')->where('id', $id)->first();

            //foreach($id_univer as $id_univer){
            //    $idd = $id_univer->
            //}

            $programs = DB::table('programs')
            ->join('degree_levels', 'programs.id_degree_level', '=', 'degree_levels.id')
            ->join('specialities', 'programs.id_specialities', '=', 'specialities.id')
            ->where('id_univer', $id_univer->id_univer)
            ->select('programs.*', 'degree_levels.degreeLevel','specialities.specialities')
            ->get();

            if(count($program)>0){
                $status = 'true';
                $statusText = 'APPLY NOW';
                if(\Illuminate\Support\Facades\Auth::check()){
                    $sdd = DB::table('candidates')->where('id_user', \Illuminate\Support\Facades\Auth::user()->id)->where('id_program', $id)->get();

                    if(count($sdd) > 0){
                        $status = 'false';
                        $statusText = 'SUBMITTED';
                    }else{
                        $status = 'true';
                        $statusText = 'APPLY NOW';
                    }
                }
                // если данные правильны то переход рарещено
                return view('includes.program_detail', [
                    'programs' => $program,

                    'status' => $status,
                    'statusText' => $statusText,
                    
                    //ptograms
                    'levels'      => $degree->all(),

                    'prog'        => $programs,
                  	'prog1'        => $programs,
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
            }else{
                return redirect('/');
            }
    }
}
