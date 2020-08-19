<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

class ProfileController extends Controller
{
   public function add()
   {
       return view('admin.profile.create');
   }
   
   public function edit()
   {
       return view('admin.profile.edit');
   }
   public function update()
   {
       return redirect('admin/profile/edit');
   }
    public function create(Request $request)
   {
       
       
       $this->validate($request, Profile::$rules);
       
       $profile = new Profile;
       $form = $request->all();
              // フォームから送信されてきた_tokenを削除する
       unset($form['_token']);
      
       
       $profile->fill($form);
       $profile->save();
       
       
      
      
      return redirect('admin/profile/create');
   }
   
   public function index(Request $request)
   {
       $cond_name = $request->cond_name;
       if ($cond_name != '') {
           $posts = Profile::where('name', $cond_name)->get();
       }else {
           $posts = Profile::all();
       }
       return view('admin.news.index', ['posts' => $posts,
       'cond_name' => $cond_name]);
   }
}


