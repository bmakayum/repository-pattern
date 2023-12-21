<?php 

namespace App\DataTransferObjects;

use Illuminate\Http\Request;


class SliderDto 
{
    public $title;
    public $show_title;
    public $subtitle;
    public $details;
    public $link;
    public $type;
    public $image;
    public $poster;
    public $video;
    public $webmvideo;
    public $ogvvideo;
    public $serial;
    
    public function __construct(Request $request){
        $this->title = $request->title;
        $this->show_title = $request->show_title;
        $this->subtitle = $request->subtitle;
        $this->details = $request->details;
        $this->link = $request->link;
        $this->type = $request->type;
        $this->image = $request->image;
        $this->poster = $request->poster;
        $this->video = $request->video;
        //$this->video = $request->file('video');
        $this->webmvideo = $request->webmvideo;
        $this->ogvvideo = $request->ogvvideo;
        $this->serial = $request->serial;
    }
        
    

    // public static function fromRequest(Request $request) : self
    // {
    //     return new self(
    //         $request->input('title');
    //     );

    // }




}

