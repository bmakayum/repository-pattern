<?php

namespace App\Repositories;

use App\Models\admin\Slider;
use Illuminate\Contracts\Pagination\Paginator;

class SliderRepository{

    public function getAll(){
        return Slider::paginate(10);
    }

    public function getById(int $id){
        return Slider::find($id);
    }


}