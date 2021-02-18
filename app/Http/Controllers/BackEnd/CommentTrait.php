<?php
namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\BackEnd\Comments\Store;
use App\Models\Comment;

trait CommentTrait
{
    public function commentStore(Store $data)
    {
        $resultArray=$data->all()+["user_id"=>auth()->user()->id];
        Comment::create($resultArray);
        //dd($resultArray);
        return redirect()->route('videos.edit',[$resultArray['video_id'],'#comments']);
    }
    public function commentDelete($id)
    {
        $row=Comment::findOrfail($id);
        $row->delete($row);
        return redirect()->route('videos.edit',[$row->video_id,'#comments']);
    }
    public function commentUpdate($id,Store $data)
    {
        $row=Comment::findOrfail($id);
        $row->update($data->all());
        return redirect()->route('videos.edit',[$row->video_id,'#comments']);
    }
}
