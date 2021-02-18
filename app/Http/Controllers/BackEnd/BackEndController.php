<?php
namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class BackEndController extends Controller
{
    protected $model;


    public function __construct(Model $model)
    {
        $this->model=$model;
    }
    public function index()
    {
        $rows=$this->model;
        $rows=$this->filter($rows);
        $with=$this->with();
        if(!empty($with))
        {
            $rows=$rows->with($with);
        }
        $rows=$rows->paginate(10);
        //dd($this->getClassNameFromModel());
        $modelName=$this->pluralModelName();
        $smodelName=$this->getModelName();
        $routeName=$this->getClassNameFromModel();
        $pageTitle=' Control '.$modelName;
        $pageDes="here you can add / edit / delete ".$modelName;
        return view('back-end.'.$this->getClassNameFromModel().'.index',compact('rows','modelName'
        ,'smodelName','pageTitle','pageDes','routeName'));
    }
    public function create()
    {
        $modelName=$this->getModelName();
        $pageTitle=' create '.$modelName;
        $pageDes="here you can  create ".$modelName;
        $folderName=$this->getClassNameFromModel();
        $routeName=$folderName;
        $append=$this->append();
        return view('back-end.'.$folderName.'.create',compact('modelName'
            ,'pageTitle','pageDes','folderName','routeName'))->with($append);

    }
    public function edit($id)
    {
        $row=$this->model::findOrFail($id);
        $modelName=$this->getModelName();
        $pageTitle=' edit '.$modelName;
        $pageDes="here you can  edit ".$modelName;
        $folderName=$this->getClassNameFromModel();
        $routeName=$folderName;
        $append=$this->append();
        return view('back-end.'.$folderName.'.edit',compact('row','modelName'
            ,'pageTitle','pageDes','folderName','routeName'))->with($append);
    }
    public function destroy($id)
    {
        $this->model::findOrFail($id)->delete();
        return redirect()->route($this->getClassNameFromModel().'.index');
    }
    protected function filter($rows)
    {
        return $rows;
    }
    protected function with()
    {
        return [];
    }
    protected function getClassNameFromModel()
    {
        return strtolower($this->pluralModelName());
    }
    protected function pluralModelName()
    {
        return Str::plural($this->getModelName());
    }
    protected function getModelName()
    {
        return class_basename($this->model);
    }
    protected function append()
    {
        return [];
    }

}
