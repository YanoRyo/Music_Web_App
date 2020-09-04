<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Comment;
// use Illuminate\Support\Facades\Auth;

use App\Mail\SampleNotification;
use Illuminate\Http\Request;
use App\Events\ChatMessageRecieved;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChatController extends Controller
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

    // public function index(Request $request , $recieve)
    // {
    //     // チャットの画面
        
    //     $loginId = Auth::id();
        
    //     $param = [
    //       'send' => $loginId,
    //       'recieve' => $recieve,
    //     ];
    //     // dd($param);
 
    //     // 送信 / 受信のメッセージを取得する
    //     $query = Message::where('send' , $loginId)->where('recieve' , $recieve);;
    //     $query->orWhere(function($query) use($loginId , $recieve){
    //         $query->where('send' , $recieve);
    //         $query->where('recieve' , $loginId);
 
    //     });
 
    //     $comments = $query->get();
    //     // dd($messages);
    //     return view('chat1' ,['comments' => $comments]);
    // }
 
    /**
     * メッセージの保存をする
     */
    // public function store(Request $request)
    // {
 
    //     dd($request);
    //     // リクエストパラメータ取得
    //     $insertParam = [
    //         'send' => $request->input('send'),
    //         'recieve' => $request->input('recieve'),
    //         'message' => $request->input('message'),
    //     ];
 
 
    //     // メッセージデータ保存
    //     try{
    //         Message::insert($insertParam);
    //     }catch (\Exception $e){
    //         return false;
 
    //     }
 
 
    //     // イベント発火
    //     event(new ChatMessageRecieved($request->all()));
 
    //     // メール送信
    //     $mailSendUser = User::where('id' , $request->input('recieve'))->first();
    //     $to = $mailSendUser->email;
    //     Mail::to($to)->send(new SampleNotification());
 
    //     return true;
 
    // }


    public function index()
    {
        //
        $comments = Message::get();
        // dd($comments);
        return view('chat1', ['comments' => $comments]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */

    public function add(Request $request)
    {
        $user = Auth::user();
        $comment = $request->input('comment');
        // dd($comment);
        Message::create([
            'send_name' => $user->name,
            'send' => $user->id,
            // 'recieve' => $recieve,
            'message' => $comment
        ]);
        // dd($user);
        return redirect()->route('chat1');
    }


    // public function getData()
    // {
    //     $comments = Comment::orderBy('created_at', 'desc')->get();
    //     $json = ["comments" => $comments];
    //     return response()->json($json);
    // }

    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    //     $user = new Chat;
    //     $comment = $request->input('comment');
    //     Comment::create([
    //     'login_id' => $user->id,
    //     'name' => $user->name,
    //     'comment' => $comment
    // ]);
    // return redirect()->route('comments/chat');
    // }

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
