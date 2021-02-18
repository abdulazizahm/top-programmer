<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Users extends BackEndController
{
        public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function store(Store $data)
    {
        //check
        //dd($data->all());
        //Enhansece
//        User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
        $requestArray=$data->all();
        $requestArray['password']= Hash::make($requestArray['password']);
        $this->model::create($requestArray);

        return redirect()->route('users.index');
    }


    public function update($id,Update $data)
    {
        $row=$this->model::findOrFail($id);
        // Enhanced
        /* $resulatArray=[
             'name' => $data['name'],
             'email' => $data['email']
         ];
         if($data->has('password')&&$data->get('password')!="")
         {
             $resulatArray=$resulatArray+['password' => Hash::make($data['password'])];
         }
         //dd($resulatArray);
        $row->update($resulatArray);
        */
        $requestArray=$data->all();
        if(isset($requestArray['password']) && $requestArray['password']!="")
        {
            $requestArray['password']= Hash::make($requestArray['password']);
        }else{ // becouse $requestArray['password']='';
            unset($requestArray['password']);
        }


        $row->update($requestArray);
        return redirect()->route('users.index');
    }

}
