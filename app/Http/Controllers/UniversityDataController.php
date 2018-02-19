<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\university_data;


class UniversityDataController extends Controller
{
    public function save(Request $request)
    {
        $post = $request->all();

        $user_id = Auth::user()->id;

        $validator=\Validator::make($request->all(),
        [
            'university_name' => 'required|min:3',
            'abbreviated' => 'required|min:2',
            'short_description' => 'required|min:10',
            'city' => 'required',
            'street' => 'required|min:3',
            'university_website' => 'required|min:5',
            'emp_fullname' => 'required',
            'emp_position'=> 'required',
            'emp_email' => 'required',
            'emp_phone' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            $data = new university_data;

            if(isset($post['logo'])){

                $file = $post['logo'];
                $ext = $file->getClientOriginalExtension();
                $path = $file->storeAs('photos/', str_random(40).$ext);
            }else{
                $path = null;
            }
            $data->logo = $path;

            $data->user_id = $user_id;
            $data->university_name = $post['university_name'];
            $data->abbreviated = $post['abbreviated'];
            $data->short_description = $post['short_description'];
            $data->id_state = $post['state'];
            $data->city = $post['city'];
            $data->street = $post['street'];
            $data->university_website = $post['university_website'];
            $data->emp_fullname = $post['emp_fullname'];
            $data->emp_position = $post['emp_position'];
            $data->emp_email = $post['emp_email'];
            $data->emp_phone = $post['emp_phone'];

            if($data->Save()){
                return redirect('university');
            }
        }
        
    }

    public function edit(Request $request){
        $post = $request->all();
    
        $user_id = Auth::user()->id;

        $validator=\Validator::make($request->all(),
        [
            'university_name' => 'required|min:3',
            'abbreviated' => 'required|min:2',
            'short_description' => 'required|min:10',
            'city' => 'required',
            'street' => 'required|min:3',
            'university_website' => 'required|min:5',
            'emp_fullname' => 'required',
            'emp_position'=> 'required',
            'emp_email' => 'required',
            'emp_phone' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            $user = new university_data;

            if(!empty($post['logo'])){
                $file = $post['logo'];
                $ext = $file->getClientOriginalExtension();
                $path = $file->storeAs('photos/', str_random(40).$ext);
            }else{
                $path = $user->logo;
            }

            $data = array(
                'user_id' =>  $user_id,
                'university_name' => $post['university_name'],
                'abbreviated' => $post['abbreviated'],
                'short_description' => $post['short_description'],
                'id_state' => $post['state'],
                'city' => $post['city'],
                'street' => $post['street'],
                'university_website' => $post['university_website'],
                'emp_fullname' => $post['emp_fullname'],
                'emp_position'=> $post['emp_position'],
                'emp_email' => $post['emp_email'],
                'emp_phone' => $post['emp_phone'],
                'logo' => $path
            );

            if($user->where('user_id', $user_id)->update($data)){
                return redirect('university');
            }
        }

    }

    public function uni_edit(){

        return view('includes.university_edit');
    }


    //upload logo
    public function logoUpload(Request $request)
    {
      $validator = \Validator::make($request->all(), [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
      ]);

      if ($validator->passes()) {

        $input = $request->all();
        $path = time().'.'.$request->image->getClientOriginalExtension();
        $input['image'] = $path;
       
        $request->image->move(public_path('../storage/app/UniverDocs/'.\Illuminate\Support\Facades\Auth::user()->id.'/'), $input['image']);

        university_data::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)
        ->update(['logo' => $path]);

        return response()->json(['success'=>'done']);
      }

      return response()->json(['error'=>$validator->errors()->all()]);
    }
}

