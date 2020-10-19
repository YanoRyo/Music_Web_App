<?php

namespace App\Http\Controllers;



use App\Mail\SampleNotification;
use Illuminate\Http\Request;
use App\Events\ChatMessageRecieved;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index($recieve)
    {
        //
        $login = Auth::id();
        $loginId = strval($login);
        // $contact = DB::table('users')->find($recieve);
        $contact = $recieve;
        // $comments = Message::where('recieve','=',$contact)->get();;
        $comments = Message::where('recieve',$loginId)->get();
        // dd($loginId);
        
        return view('chat', compact('comments','contact'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */

    public function add(Request $request,$recieve)
    {
        $user = Auth::user();
        $comment = $request->input('comment');
        // dd($recieve);
        Message::create([
            'send_name' => $user->name,
            'send' => $user->id,
            'recieve' => $recieve,
            'message' => $comment
        ]);
        return redirect()->route('donemail');
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
