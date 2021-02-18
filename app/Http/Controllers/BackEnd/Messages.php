<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Messages\Store;
use App\Mail\ReplayContact;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;


class Messages extends BackEndController
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }
    public function Massage($id,Store $request)
    {
        $message=$this->model->findOrfail($id);
        Mail::send(new ReplayContact($message,$request->message));
        return redirect()->route('messages.edit',$message->id);
        //dd($request->message,$id);
    }
}
