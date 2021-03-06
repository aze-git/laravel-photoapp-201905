<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Model\Like;
use App\Model\Post;
use App\Model\User;


class ProfileController extends Controller
{
    public function index($user_id)
    {
        //投稿の一覧を取得
        $posts = Post::where('user_id', $user_id)->orderBy('id', 'desc')->get();
        //ユーザ名を取得
        $social_id = User::where('id', $user_id)->first()->social_id;
        //プロフィール画像のpathを取得
        $image_path = User::where('id', $user_id)->first()->image_path;
        //総Like数（likeに紐付く、postのuser_idの合計）を取得する
        $likes_count = Like::join('posts', 'likes.post_id', '=', 'posts.id')
                                ->where('posts.user_id', $user_id)
                                ->count();

        return view('profile', ['posts' => $posts, 'nickname' => $social_id, 'image_path' => $image_path, 'likes_count' => $likes_count]);
    }
}