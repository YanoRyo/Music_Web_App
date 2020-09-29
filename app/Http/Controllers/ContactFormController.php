<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreContactForm;
use App\User;
use App\User_Post;


class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        // クエリビルダー
        // $contacts = DB::table('contact_forms')->select('id','user_name','address','user_field','favorite_genre','user_image')->paginate(10);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contact.postimage');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        if($request->file('user_image')->isValid()){
            $contact = new User_Post;
            $contact->user_id = $request->user()->id;
            $filename = $request->file('user_image')->store('public/img');
            $contact->user_image = basename($filename);
            
        }
        // dd($contact);
        $contact->save();
        return redirect('contact/index');


        // dd($request);
        // if($request->file('user_image')->isValid()){

        //     $contact = new ContactForm;

        //     $contact->user_name = $request->input('user_name');
        //     $contact->email = $request->input('email');
        //     $contact->address = $request->input('address');
        //     $contact->user_field = $request->input('user_field');
        //     $contact->favorite_genre = $request->input('favorite_genre');
        //     $filename = $request->file('user_image')->store('public/img');
        //     $contact->user_image = basename($filename);
        //     $contact->password = Hash::make($request->password);
            
        // }
        // // dd($user_name);
        // $contact->save();
        // return redirect('contact/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $contact = DB::table('users_post')->find($id);
        // return view('contact.myprofile',compact('contact'));

        $contact = DB::table('users')->find($id);
        $user_id = $id;
        $post = DB::table('users_post')->where('user_id',$user_id)->first();
                
        return view('contact.myprofile',compact('contact','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
