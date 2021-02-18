<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Skills\Store;
use App\Models\Skill;


class Skills extends BackEndController
{
    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }

    public function store(Store $data)
    {
        $this->model::create($data->all());
        return redirect()->route('skills.index');
    }


    public function update($id,Store $data)
    {
        $row=$this->model::findOrFail($id);
        $row->update($data->all());
        return redirect()->route('skills.index');
    }
}
