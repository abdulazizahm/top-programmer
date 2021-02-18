<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontEnd\Comments\Store;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(
            'commentUpdate','commentStore','profileUpdate'
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos=Video::orderBy('id','desc');
        if(request()->has('search')&&request()->get('search')!='')
        {
            $videos=Video::where('name','like','%'.request()->get('search')."%");
        }
        $videos=$videos->paginate(30);
        return view('home',compact('videos'));
    }

    public function category($id)
    {
        $cat=Category::findOrfail($id);
        $videos=Video::where('cat_id',$cat->id)->orderBy('id','desc')->paginate(30);
        return view('front-end.categories.index',compact('videos','cat'));
    }
    public function video($id)
    {
        $video=Video::with('skills','tags','cat','user','comments.user')->findOrfail($id);
        return view('front-end.video.index',compact('video'));
    }
    public function skill($id)
    {
        $skill=Skill::findOrfail($id);
        $videos=Video::whereHas('skills',function($query) use($id) {
            $query->where('skill_id',$id);
        })->orderBy('id','desc')->paginate(30);

        return view('front-end.skills.index',compact('videos','skill'));
    }
    public function tag($id)
    {
        $tag=Tag::findOrfail($id);
        $videos=Video::whereHas('tags',function($query) use($id) {
            $query->where('tag_id',$id);
        })->orderBy('id','desc')->paginate(30);
        return view('front-end.tags.index',compact('videos','tag'));
    }
    public function commentUpdate($id,Store $data)
    {
        $comment=Comment::findOrfail($id);
        if((auth()->user()->group=='admin')||(auth()->user()->id==$comment->user_id))
        {
            $comment->update(['comment'=>$data->comment]);
        }
        return redirect()->route('frontend.video',[$comment->video_id,"#comments"]);
    }
    public function commentStore($id,Store $data)
    {
        $video=Video::findOrfail($id);
        Comment::create([
            'user_id'=>auth()->user()->id,
            'video_id'=>$video->id,
            "comment"=>$data->comment
        ]);
        return redirect()->route('frontend.video',[$video->id,"#comments"]);
    }
    // error in validate in Store request
    public function messageStore(\App\Http\Requests\FrontEnd\Messages\Store $request)
    {
        //dd($request->all());
        Message::create($request->all());
        return redirect()->route('frontent.landing');
    }
    public function welcome()
    {
        $videos =Video::orderBy('id','desc')->paginate(9);
        $videos_count=Video::count();
        $comments_count=Comment::count();
        $tags_count=Tag::count();
        return view('welcome', compact('videos','videos_count','comments_count','tags_count'));
    }
    public function page($id, $slug = null)
    {
        $page=Page::findOrfail($id);
        return view('front-end.pages.index',compact('page'));
    }
    public function profile($id, $slug = null)
    {
        $user=User::findOrfail($id);
        return view('front-end.profile.index',compact('user'));
    }
    public function profileUpdate(\App\Http\Requests\FrontEnd\Users\Store $data)
    {
        $user=User::findOrfail(auth()->user()->id);
        $array=[];
        if($data->email!=$user->email)
            {
                $email=User::where('email',$data->email)->first();
                if($email==null)
                {
                    $array['email']=$data->email;
                }
            }
        if($data->name!=$user->name)
            {
                $array['name']=$data->name;
            }
        if($data->password!='')
            {
                $array['password']=Hash::make($data['password']);
            }
        if(!empty($data))
        {
            $user->update($array);
        }
        return redirect()->route('front.profile',['id'=>$user->id,'slug'=>slug($user->name)]);
    }
}
