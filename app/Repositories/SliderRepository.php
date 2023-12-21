<?php

namespace App\Repositories;

use App\Interfaces\CrudInterface;
use App\Models\admin\Slider;
use Illuminate\Contracts\Pagination\Paginator;
use App\DataTransferObjects\SliderDto;
use App\Helpers\AppHelper;

class SliderRepository implements CrudInterface{

    public $filepath;

    public function __construct(){
        $this->filepath = "uploads/sliders/";
    }

    

    public function getAll():Paginator
    {
        return Slider::paginate(10);
    }

    public function getById(int $id)
    {
        return Slider::find($id);
    }

    public function createData($request)
    {
        $filename="";
        $postername="";
        $mp4videoname="";
        $webvideoname="";
        $ogvvideoname="";

        $sliderdto = new SliderDto($request);
        $slider = new Slider();

        $slider->title = ($sliderdto->title) ? $sliderdto->title : NULL;
        $slider->show_title = ($sliderdto->show_title) ? $sliderdto->show_title : 1;
        $slider->subtitle = ($sliderdto->subtitle)? $sliderdto->subtitle : NULL;
        $slider->details = ($sliderdto->details)? $sliderdto->details : NULL;
        $slider->link = ($sliderdto->link)? $sliderdto->link : NULL;
        $slider->type = ($sliderdto->type)? $sliderdto->type : NULL;
        $slider->serial = ($sliderdto->serial)? $sliderdto->serial : NULL;
        if($sliderdto->image){
            $filename = AppHelper::uploadFile($sliderdto->image, 'slider', 'sliders');
        }
        if($sliderdto->poster){
            $postername = AppHelper::uploadFile($sliderdto->poster, 'poster', 'sliders');
        }
        if($sliderdto->video){
            $mp4videoname = AppHelper::uploadFile($sliderdto->video, 'video', 'sliders');
        }
        if($sliderdto->webmvideo){
            $webvideoname = AppHelper::uploadFile($sliderdto->webmvideo, 'webmvideo', 'sliders');
        }
        if($sliderdto->ogvvideo){
            $ogvvideoname = AppHelper::uploadFile($sliderdto->ogvvideo, 'ogvvideo', 'sliders');
        }
        $slider->image = ($filename)? $filename : NULL ;
        $slider->poster = ($postername)? $postername : NULL ;
        $slider->mp4video = ($mp4videoname)? $mp4videoname : NULL ;
        $slider->webmvideo = ($webvideoname)? $webvideoname : NULL ;
        $slider->ogvvideo = ($ogvvideoname)? $ogvvideoname : NULL ;

        return $slider->save();
    }

    public function updateById($request, int $id){
        $slider = Slider::find($id);
        return $slider->fill($request->all())->save();
    }

    public function deleteById(int $id){
        $slider = Slider::find($id);
        if($slider){
            if($slider->image && file_exists($this->filepath.$slider->image)){
                unlink($this->filepath.$slider->image);
            }
            if($slider->poster && file_exists($this->filepath.$slider->poster)){
                unlink($this->filepath.$slider->poster);
            }
            if($slider->mp4video && file_exists($this->filepath.$slider->mp4video)){
                unlink($this->filepath.$slider->mp4video);
            }
            if($slider->webmvideo && file_exists($this->filepath.$slider->webmvideo)){
                unlink($this->filepath.$slider->webmvideo);
            }
            if($slider->ogvvideo && file_exists($this->filepath.$slider->ogvvideo)){
                unlink($this->filepath.$slider->ogvvideo);
            }
            return $slider->delete();
        }
        return false;
    }


}