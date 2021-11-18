<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Flash;
use Response;

class PostController extends Controller{
    public $successStatus = 200;

    public function getAllPosts(Request $request) {
        $token = $request['t']; //t = token
        $userid = $request['u']; //u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if($user != null) {
            $post = Posts::all();
            return response()->json($post, $this->successStatus);

        }else{
            return response()->json(['response'=>'Bad Call'],501);


        }
    }

    public function getPosts(Request $request) {
        $id = $request['pid'];//pid = post id
        $token = $request['t']; //t = token
        $userid = $request['u']; //u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if($user != null) {
            $post = Posts::where('id', $id)->first();

            if($post != null){
                return response()->json($post, $this->successStatus);
            }else{
                return response()->json(['response'=>'Post not found'], 404);
            }

        }else{
            return response()->json(['response'=>'Bad Call'],501);
        }
    }

    public function searchPost(Request $request) {
        $params = $request['p'];//p = params
        $token = $request['t']; //t = token
        $userid = $request['u']; //u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if($user != null) {
            $post = Posts::where('description','LIKE', '%' . $params .'%')
            ->orWhere('title','LIKE', '%' . $params .'%')
            ->get();

            //select from post where description Like %params% or title like %params%

            if($post != null){
                return response()->json($post, $this->successStatus);
            }else{
                return response()->json(['response'=>'Post not found!'], 404);
            }
        }else{
            return response()->json(['response'=>'Bad Call'],501);
        }
    }
}