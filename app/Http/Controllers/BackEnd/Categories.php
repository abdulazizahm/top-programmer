<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Categories\Store;
use App\Models\Category;
use Illuminate\Http\Request;


class Categories extends BackEndController
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function store(Store $data)
    {
        $this->model::create($data->all());
        return redirect()->route('categories.index');
    }


    public function update($id,Store $data)
    {
        $row=$this->model::findOrFail($id);
        $row->update($data->all());
        return redirect()->route('categories.index');
    }



}
