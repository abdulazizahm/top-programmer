<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Videos\Update;
use App\Http\Requests\BackEnd\Videos\Store;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Support\Str;


class Videos extends BackEndController
{
    use CommentTrait;
    public function __construct(Video $model)
    {
        parent::__construct($model);
    }
    protected function with()
    {
        return['user','cat'];
    }
    protected function append()
    {
        $array=[
            'categories'=>Category::get(),
            'skills'=>Skill::get(),
            'tags'=>Tag::get(),
            'selectedskills'=>[],
            'selectedtags'=>[],
            'comments'=>[]
            ];
        if(request()->route()->parameter('video'))
        {
            $array['selectedskills']=$this->model->find(request()->route()->parameter('video'))
                ->skills()->get()->pluck('id')->toArray();
            //dd($array['selectedskills']);
            $array['selectedtags']=$this->model->find(request()->route()->parameter('video'))
                ->tags()->pluck('tags.id')->toArray();
            $array['comments']=$this->model->find(request()->route()->parameter('video'))
                ->comments()->orderBy('id','desc')->with('user')->get();
            //dd($array['comments'])=$this->model->find(request()->route()->parameter('video')->comments(); get object
            //to solve this problem
            //dd($array['comments'])->get(); get values

        }
        return $array;
    }
    public function store(Store $data)
    {
        $fileName=$this->uploadImage($data);
        $resultArray=['user_id'=>auth()->user()->id,'image'=>$fileName]+$data->all();
        $row=$this->model::create($resultArray);
        $this->getSyncresultArrayrow($row,$resultArray);
        return redirect()->route('videos.index');
    }


    public function update($id,Update $data)
    {
        $resultArray=$data->all();
        if($data->hasFile('image'))
        {
            $fileName=$this->uploadImage($data);
            $resultArray=['image'=>$fileName]+$resultArray;
        }
        $row=$this->model::findOrFail($id);
        $row->update($resultArray);
        $this->getSyncresultArrayrow($row,$resultArray);
        //return redirect()->route('videos.index');
        return redirect()->route('videos.edit', $row->id);
    }
    protected function getSyncresultArrayrow($row,$resultArray=array())
    {
        if(isset($resultArray['skills'])&&!empty($resultArray))
        {
            $row->skills()->sync($resultArray['skills']);
        }
        if(isset($resultArray['tags'])&&!empty($resultArray))
        {
            $row->tags()->sync($resultArray['tags']);
        }
    }
    protected function uploadImage($data)
    {
        $file=$data->file('image');
        $fileName=time().Str::random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'),$fileName);
        return $fileName;
    }
}
