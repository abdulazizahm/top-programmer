<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Tags\Store;
use App\Models\Tag;


class Tags extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function store(Store $data)
    {
        $this->model::create($data->all());
        return redirect()->route('tags.index');
    }


    public function update($id,Store $data)
    {
        $row=$this->model::findOrFail($id);
        $row->update($data->all());
        return redirect()->route('tags.index');
    }
}
