<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreContactForm;
use App\User;
use App\User_Post;

class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');
        $query = DB::table('users');
        // もしキーワードがあったら
        if($search !== null){
            //全角スペースを半角に
            $search_split = mb_convert_kana($search,'s');

            //空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split,-1,PREG_SPLIT_NO_EMPTY);

            //単語をループで回す
            foreach($search_split2 as $value)
            {
            $query->where('favorite_genre','like','%'.$value.'%');
            }
        };
        $query->join('users_post','users.id','=','users_post.user_id')
        ->select('users.id','users.name','users.address','users.user_field','users.favorite_genre','users_post.user_image')
        ->where('user_field','歌手');
        $contacts = $query->paginate(10);
        
        


        return view('search.singer',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $contact = DB::table('users')->find($id);
        $user_id = $id;
        $post = DB::table('users_post')->where('user_id',$user_id)->first();
                
        return view('search.singershow',compact('contact','post'));
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
