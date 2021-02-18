<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Pages\Store;
use App\Models\Page;
use Illuminate\Http\Request;

class Pages extends BackEndController
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function store(Store $data)
    {
        $this->model::create($data->all());
        return redirect()->route('pages.index');
    }


    public function update($id,Store $data)
    {
        $row=$this->model::findOrFail($id);
        $row->update($data->all());
        return redirect()->route('pages.index');
    }
}
