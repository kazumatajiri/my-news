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
       
       $profile->fill($form);
       $profile->save();
       
        // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      
      return redirect('admin/profile/create');
   }
}


