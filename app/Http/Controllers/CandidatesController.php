<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CandidatesController extends Controller
{

    public function index(Request $request){
        $stud_data = new \App\StudentData;
        $country = new \App\Country;


        $sd = DB::table('candidate_datas')->where('id_user', \Illuminate\Support\Facades\Auth::user()->id)->first();

        if(count($sd) > 0){
            $post = $request->all();

            $sdd = DB::table('candidates')->where('id_user', \Illuminate\Support\Facades\Auth::user()->id)->where('id_program', $post['id_program'])->first();

            if(count($sdd) > 0){
                return redirect()->back();
            }else{

                $candidate = new \App\Candidate;

                $candidate->id_user = \Illuminate\Support\Facades\Auth::user()->id;
                $candidate->id_program = $post['id_program'];
                $candidate->id_univer = $post['id_univer'];

                if($candidate->save()){
                    return redirect()->back();
                }                 
            }
            
        }else{
            return view('includes.candidate',
                [
                    'student_datas' => $stud_data::where('id_user', \Illuminate\Support\Facades\Auth::user()->id)->get(),

                    'country' => $country::all(),
                ]
            );
        }
    }

    public function save(Request $request){
        $post = $request->all();
        
        $validator=\Validator::make($request->all(),
        [
            'school_zip' => 'required|min:3',
           'school_phone' => 'required|min:3',
            'year_of_starting' => 'required|min:3',
            'year_of_ending' => 'required|min:3',
            'level_of_english' => 'required|min:3',
            'sponsor_name' => 'required|min:3',
            'sponsor_lastname' => 'required|min:3',
            'sponsor_email' => 'required|min:3',
            'sponsor_phone' => 'required|min:3',
            'sponsor_address' => 'required|min:3',
            'sponsor_city' => 'required|min:3',
            'sponsor_region' => 'required|min:3',
            'sponsor_zip' => 'required|min:3',
            'sponsor_country' => 'required|min:3',
            'father_name' => 'required|min:3',
            'father_occupation' => 'required|min:3',
            'mother_name' => 'required|min:3',
            'mather_occupation' => 'required|min:3',
            'indicate_your_family' => 'required|min:3',
            'parent_address' => 'required|min:3',            
            'parent_city' => 'required|min:3',
            'parent_region' => 'required|min:3',
            'parent_zip' => 'required|min:3',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{

            $data = new \App\CandidateData;

            $data->id_user = \Illuminate\Support\Facades\Auth::user()->id;
            $data->school_phone = $post['school_phone'];
            $data->other_contact = $post['other_contact'];
            $data->year_of_starting = $post['year_of_starting'];
            $data->year_of_ending = $post['year_of_ending'];
            $data->level_of_english = $post['level_of_english'];
            $data->sponsor = $post['sponsor'];
            $data->sponsor_name = $post['sponsor_name'];
            $data->sponsor_middlename = $post['sponsor_middlename'];
            $data->sponsor_lastname = $post['sponsor_lastname'];
            $data->sponsor_email = $post['sponsor_email'];
            $data->sponsor_phone = $post['sponsor_phone'];
            $data->sponsor_address = $post['sponsor_address'];
            $data->sponsor_city = $post['sponsor_city'];
            $data->sponsor_region = $post['sponsor_region'];
            $data->sponsor_zip = $post['sponsor_zip'];
            $data->sponsor_country = $post['sponsor_country'];
            $data->father_name = $post['father_name'];
            $data->father_occupation = $post['father_occupation'];
            $data->mother_name = $post['mother_name'];
            $data->mather_occupation = $post['mather_occupation'];
            $data->indicate_your_family = $post['indicate_your_family'];
            $data->parent_address = $post['parent_address'];
            $data->parent_address2 = $post['parent_address2'];
            $data->parent_city = $post['parent_city'];
            $data->parent_region = $post['parent_region'];
            $data->parent_zip = $post['parent_zip'];
            $data->parent_country = $post['parent_country'];
            $data->how_did_you_find_us = $post['how_did_you_find_us'];
            $data->comment = $post['comment'];
            $data->who_complated_this_app = $post['who_complated_this_app'];
            $data->full_name_of_the_person = $post['full_name_of_the_person'];
           
            if($data->Save()){
                return redirect('profile-info');
            }
        }
    }

    public function upload1(Request $request){
        $post = $request->all();

        $validator=\Validator::make($request->all(),
        [
            'file' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{

            $path ='doc-'.time().'.'.$request->file->getClientOriginalExtension();
            $post['file'] = $path;
            $request->file->move(public_path('../storage/app/documents/'.\Illuminate\Support\Facades\Auth::user()->id.'/'), $post['file']);
            
            $qu = DB::table('candidate_datas')->where('id_user', \Illuminate\Support\Facades\Auth::user()->id)->get();

            if(count($qu) > 0){
                \App\CandidateData::where('id_user', \Illuminate\Support\Facades\Auth::user()->id)
                ->update(['passport' => $path]);
            }else{
                $c = new \App\CandidateData;
                $c->id_user = \Illuminate\Support\Facades\Auth::user()->id;
                $c->passport = $path;
                $c->save();
            }
            
    
            return response()->json(['success'=>'done']);
        }
    }

    public function upload2(Request $request){
        $post = $request->all();

        $validator=\Validator::make($request->all(),
        [
            'file' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{

            $path ='doc-'.time().'.'.$request->file->getClientOriginalExtension();
            $post['file'] = $path;
            $request->file->move(public_path('../storage/app/documents/'.\Illuminate\Support\Facades\Auth::user()->id.'/'), $post['file']);
            
            $qu = DB::table('candidate_datas')->where('id_user', \Illuminate\Support\Facades\Auth::user()->id)->get();

            if(count($qu) > 0){
                \App\CandidateData::where('id_user', \Illuminate\Support\Facades\Auth::user()->id)
                ->update(['transcript' => $path]);
            }else{
                $c = new \App\CandidateData;
                $c->id_user = \Illuminate\Support\Facades\Auth::user()->id;
                $c->transcript = $path;
                $c->save();
            }
            
    
            return response()->json(['success'=>$path]);
        }
    }

    public function upload3(Request $request){
        $post = $request->all();

        $validator=\Validator::make($request->all(),
        [
            'file' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{

            $path ='doc-'.time().'.'.$request->file->getClientOriginalExtension();
            $post['file'] = $path;
            $request->file->move(public_path('../storage/app/documents/'.\Illuminate\Support\Facades\Auth::user()->id.'/'), $post['file']);
            
            $qu = DB::table('candidate_datas')->where('id_user', \Illuminate\Support\Facades\Auth::user()->id)->get();

            if(count($qu) > 0){
                \App\CandidateData::where('id_user', \Illuminate\Support\Facades\Auth::user()->id)
                ->update(['diploma' => $path]);
            }else{
                $c = new \App\CandidateData;
                $c->id_user = \Illuminate\Support\Facades\Auth::user()->id;
                $c->diploma = $path;
                $c->save();
            }
            
    
            return response()->json(['success'=>$path]);
        }
    }

    public function upload4(Request $request){
        $post = $request->all();

        $validator=\Validator::make($request->all(),
        [
            'file' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{

            $path ='doc-'.time().'.'.$request->file->getClientOriginalExtension();
            $post['file'] = $path;
            $request->file->move(public_path('../storage/app/documents/'.\Illuminate\Support\Facades\Auth::user()->id.'/'), $post['file']);
            
            $qu = DB::table('candidate_datas')->where('id_user', \Illuminate\Support\Facades\Auth::user()->id)->get();

            if(count($qu) > 0){
                \App\CandidateData::where('id_user', \Illuminate\Support\Facades\Auth::user()->id)
                ->update(['test_score' => $path]);
            }else{
                $c = new \App\CandidateData;
                $c->id_user = \Illuminate\Support\Facades\Auth::user()->id;
                $c->test_score = $path;
                $c->save();
            }
            
    
            return response()->json(['success'=>$path]);
        }
    }

    public function upload5(Request $request){
        $post = $request->all();

        $validator=\Validator::make($request->all(),
        [
            'file' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{

            $path ='doc-'.time().'.'.$request->file->getClientOriginalExtension();
            $post['file'] = $path;
            $request->file->move(public_path('../storage/app/documents/'.\Illuminate\Support\Facades\Auth::user()->id.'/'), $post['file']);
            
            $qu = DB::table('candidate_datas')->where('id_user', \Illuminate\Support\Facades\Auth::user()->id)->get();

            if(count($qu) > 0){
                \App\CandidateData::where('id_user', \Illuminate\Support\Facades\Auth::user()->id)
                ->update(['other_document' => $path]);
            }else{
                $c = new \App\CandidateData;
                $c->id_user = \Illuminate\Support\Facades\Auth::user()->id;
                $c->other_document = $path;
                $c->save();
            }
            
    
            return response()->json(['success'=>$path]);
        }
    }

    public function upload6(Request $request){
        $post = $request->all();

        $validator=\Validator::make($request->all(),
        [
            'file' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{

            $path ='doc-'.time().'.'.$request->file->getClientOriginalExtension();
            $post['file'] = $path;
            $request->file->move(public_path('../storage/app/documents/'.\Illuminate\Support\Facades\Auth::user()->id.'/'), $post['file']);
            
            $qu = DB::table('candidate_datas')->where('id_user', \Illuminate\Support\Facades\Auth::user()->id)->get();

            if(count($qu) > 0){
                \App\CandidateData::where('id_user', \Illuminate\Support\Facades\Auth::user()->id)
                ->update(['other_document2' => $path]);
            }else{
                $c = new \App\CandidateData;
                $c->id_user = \Illuminate\Support\Facades\Auth::user()->id;
                $c->other_document2 = $path;
                $c->save();
            }
            
    
            return response()->json(['success'=>$path]);
        }
    }

    public function candidates(){
        $info = DB::table('university_datas')->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first();

        $cands = new \App\Candidate;

        $id_univer = \App\university_data::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first();

        return view('includes.candidates',
            [
                'info' => $info,
                'candidates' => $cands->where('id_univer', $id_univer->id)->get(),
            ]
        );
    }

    public function candidateDetail(Request $request){
        $post = $request->all();

        $id_program = DB::table('programs')->where('id', $post['id_app'])->first();



        return view('includes.candidate_detail', [
            'id' => $id_program,
            
        ]);
    }
    
}
