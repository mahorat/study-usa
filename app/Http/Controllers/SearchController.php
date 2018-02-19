<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class SearchController extends Controller
{
    public function index(Request $request){
        $post = $request->all();
        $arr = array($post['school'], $post['level'], $post['spec']);

        $degree = new \App\DegreeLevel;
        $speciality = new \App\Speciality;
        $states = new \App\State;
        $school = new \App\school;
      
      if (Auth::user()){
            $get_fav = DB::table('favorites')
            ->join('programs', 'favorites.id_program', '=', 'programs.id')
            ->join('specialities','programs.id_specialities', '=','specialities.id' )
            ->join('university_datas','programs.id_univer','=', 'university_datas.id')
            ->where('favorites.id_user', Auth::user()->id)
            ->select('favorites.id', 'programs.id as prog_id', 'favorites.id_user', 'specialities.specialities', 'university_datas.university_name')
            ->get();
        }else{
            $get_fav = null;
        }

        return view('includes.search',[
            'DegreeLevel' => $degree->all(),
            'speciality' => $speciality->all(),
            'states' => $states->all(),
            'school' => $school->where('status', 1)->get(),
            'arr' => $arr,
            'get_fav'=> $get_fav,
        ]);
    }

    public function info(){
        $info = new \App\university_data;
        
        return view('includes.university_info', ['info' => $info->all()]);
    }

    public function search(Request $request)
    {
        $post = $request->all();

        $state = new \App\State;

        $post['level'] == 0 ? $level_if = '<>' : $level_if = '=';
        $post['spec'] == 0 ? $spec_if = '<>' : $spec_if = '=';
        $post['school_location'] == 0 ? $school_location = '<>' : $school_location = '=';

        //$pri = preg_split("/[,]/",$post['pri']);
        $pri = explode(",", $post['pri']);
        $pri2 = trim($pri[1]);

        if ($post['spec_id'] > 0){
            $spec_id = $post['spec_id'];
            $spec_i = '=';
        }else{
            $spec_i = '>';
            $spec_id = 0;
        }
        
        $programs = DB::table('programs')
        ->join('university_datas', 'programs.id_univer', '=', 'university_datas.id')
        //->join('degree_levels', 'programs.id_degree_level', '=', 'degree_levels.id')
        ->join('specialities', 'programs.id_specialities', '=', 'specialities.id')
        ->orderBy('programs.id', 'desc')
        ->where('programs.id_degree_level', $level_if, $post['level'])
        ->where('programs.id_specialities', $spec_if, $post['spec'])
        ->where('university_datas.id_state', $school_location, $post['school_location'])
        ->where('programs.id_school_name', $spec_i, $spec_id)
        ->whereBetween('programs.price', [$pri[0], $pri2])
        ->select(
                'programs.id',
                'programs.price',
                'programs.duration',
                
                //'degree_levels.degreeLevel',
                
                'specialities.specialities',

                'university_datas.id as uni_id',
          		'university_datas.user_id',
                'university_datas.university_name',
                'university_datas.short_description',
                'university_datas.id_state',
                'university_datas.city',
                'university_datas.logo'
        )
        ->get();

    	return response()->json(['programs'=>$programs, 'pri' => $pri, 'state' => $state->all()]);
    }

    public function getSpec(Request $request){
        $post = $request->all();
        $level = new \App\DegreeLevel;

        return response()->json($level->all());
    }

    public function favorite(Request $request){
    $post = $request->all();
    if (Auth::user()){
        $fav = new \App\Favorite;
        $fav_count = $fav::where('id_user', Auth::user()->id)->count();
        $this->addToFavorite($post['id_program']);
        $get_fav = DB::table('favorites')
        ->join('programs', 'favorites.id_program', '=', 'programs.id')
        ->join('specialities','programs.id_specialities', '=','specialities.id' )
        ->join('university_datas','programs.id_univer','=', 'university_datas.id')
        ->where('favorites.id_user', Auth::user()->id)
        ->select('favorites.id', 'programs.id as prog_id', 'favorites.id_user', 'specialities.specialities', 'university_datas.university_name')
        ->get();

        return response()->json($get_fav);
    }
    else return response()->json('login');
}

    public function addToFavorite($id)
    {
        $user_id   = Auth::id();
        $favorite  = new \App\Favorite;
        $favorites = $favorite->where('id_user', $user_id)
                              ->count();
        $found     = $favorite->where('id_user', $user_id)
                              ->where('id_program', $id)
                              ->count();
        if($found < 1 AND $favorites < 6)
        {
            $favorite->id_user = $user_id;
            $favorite->id_program = $id; 
            $favorite->save();
        }
    }
  
      public function delFavorite(Request $request){
        $post = $request->all();

            if (Auth::user()){
            $fav =\App\Favorite::destroy($post['id']);
            //$fav->delete();

            $get_fav = DB::table('favorites')
            ->join('programs', 'favorites.id_program', '=', 'programs.id')
            ->join('specialities','programs.id_specialities', '=','specialities.id' )
            ->join('university_datas','programs.id_univer','=', 'university_datas.id')
            ->where('favorites.id_user', Auth::user()->id)
            ->select('favorites.id', 'programs.id as prog_id', 'favorites.id_user', 'specialities.specialities', 'university_datas.university_name')
            ->get();

            return response()->json($get_fav);
        }

    }
}
