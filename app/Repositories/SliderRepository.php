<?php

namespace App\Repositories;

use App\Interfaces\CrudInterface;
use App\Models\admin\Slider;
use Illuminate\Contracts\Pagination\Paginator;

class SliderRepository implements CrudInterface{

    public function getAll():Paginator
    {
        return Slider::paginate(10);
    }

    public function getById(int $id){
        return Slider::find($id);
    }

    public function createData($request){
        return Slider::create($request->all());
    }

    public function updateById($request, int $id){
        $slider = Slider::find($id);
        return $slider->fill($request->all())->save();
    }

    public function deleteById(int $id){
        $slider = Slider::find($id);
        return $slider->delete();
    }


}