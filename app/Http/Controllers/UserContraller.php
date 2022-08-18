<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserContraller extends Controller
{
    public function index() {   
        return view('users.index');
        
     }
     //get بتأنشئ صفحة لادهتا البيانتات
     public function create() {

        return view('users.create');
}
//post ادخال البيانات بشكل فعلي
 public function store(Request $request) {
    //validate from requist
 }
//get 
 public function show($id){
 //return view('users.profile',['user'=>User::findOrFail($id)]);

 }
 //git صفحة يعدل فيها المستخدم البيانات
 public function edit($id) { 
       return view('users.edit');
     } 
      
     //post/patch عم غير بأعمدة قاعدة البيانات
     public function update($id) { 

     }
// 
     public function destroy($id)
      {   

       }
}