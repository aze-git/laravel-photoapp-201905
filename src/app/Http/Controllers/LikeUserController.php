<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Model\Like;
use App\Model\Post;

class LikeUserController extends Controller
{
    public function index($post_id)
    {
        //postに紐付く、likeした人(id, social_id)の一覧を取得する
        $like_users = Like::join('users', 'likes.user_id', '=', 'users.id')
                                ->select('users.id', 'users.social_id', 'users.image_path')
                                ->where('likes.post_id', $post_id)
                                ->get();
        return view('likeuser', ['like_users' => $like_users]);
    }
}