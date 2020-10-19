<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreContactForm;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\User_Post;
use App\Message;
use App\Message2;
use App\Reply;


class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        //
        $contact = DB::table('users')->find($id);
        $user_id = $id;
        $post = DB::table('users_post')->where('user_id',$user_id)->first();
                
        return view('contact.myprofile',compact('contact','post'));
        
        
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
        
        
        $comments = Message::where('recieve','=',$id)->get();
        $replycomments = Message2::where('recieve','=',$id)->get();

        $replys = Reply::where('recieve_id','=',$id)->get();
        // dd($id);
                
   
        return view('contact.profilechat',compact('comments','replycomments','replys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function save(Request $request,$recieve)
    {
        
        $user = Auth::user();
        
        $comment = $request->input('comment');
        // dd($recieve);
        Reply::create([
            'recieve_name' => $user->name,
            'recieve_id' => $user->id,
            'send_id' => $recieve,
            'message' => $comment
        ]);

        Message2::create([
            'send_name' => $user->name,
            'send' => $user->id,
            'recieve' => $recieve,
            'message' => $comment
        ]);
        
        
        return redirect()->route('donemail');
    }
    

    public function edit($id)
    {
        //
        
        
        $contact = $id;
        // Message::where('id','=',$id)->get();

        // dd($contact);

        return view('contact.send',compact('contact'));
        
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
