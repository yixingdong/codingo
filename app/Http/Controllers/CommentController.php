<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if(Auth::check()){
            $target_id = $request->get('target_id');
            $target_type = $request->get('target_type');
            $body = $request->get('content');
            if($target_id && $target_type && $body){
                switch ($target_type){
                    case 'post':
                    case 'course':
                    case 'lesson':
                        Comment::create([
                            'user_id'      =>  Auth::user()->id,
                            'target_id'    =>  $target_id,
                            'target_type'  =>  $target_type,
                            'parent_id'    =>  $request->get('parent'),
                            'body'         =>  $body
                        ]);

                        $url_str = url()->previous();
                        $slug = substr($url_str,strrpos($url_str,'/')+1);

                        Cache::forget($target_type.'.'.$slug);
                        Cache::forget($target_type.'.root_comments.'.$target_id);
                        break;

                    default:
                        break;
                }
            }
        }
        return back();
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

