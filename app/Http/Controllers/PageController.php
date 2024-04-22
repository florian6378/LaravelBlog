<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function test()
    {
        $title = "hello";
        return view('test',["title"=>$title]);
    }
    
    public function Mespost()
    {

        $Posts = Post::latest()->take(6)->get();
        $title = "hello";
        return view('Mespost',["title"=>$title, "Posts"=>$Posts]);
    }
    
    
    public function welcome()

    {
        $Posts = Post::latest()->take(6)->get();
        
        
        $title = "hello";
        return view('welcome',["title"=>$title, "Posts"=>$Posts]);
        
    
       
    
    }


        
    public function mentionlegale()
    {

        $title = "abc";
        $items = [123,"dfgdh"];
        return view('mention-legale', ["title"=>$title,"items"=>$items]);
    }


    public function about()
    {
        $title="123";
        $items=[];
        return view('about', ["title"=>$title, "items"=>$items]);
    }
}





