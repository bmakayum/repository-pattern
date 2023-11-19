<?php

namespace App\Http\Controllers\admin;

use App\Traits\ResponseTrait;
use App\Repositories\SliderRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\StoreSliderRequest;


class SliderController extends Controller
{
    use ResponseTrait;
    public $sliderRepository;

    public function __construct(SliderRepository $sliderRepository){
        $this->sliderRepository = $sliderRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return $this->responseSuccess($this->sliderRepository->getAll(), 'Data fetch successfully');
        }catch(Exception $e){
            return $this->responseError([], $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        try{
            return $this->responseSuccess($this->sliderRepository->createData($request), 'Data insert successfully');
        }catch(Exception $e){
            return $this->responseError([], $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            return $this->responseSuccess($this->sliderRepository->getById($id), 'Data fetch successfully');
        }catch(Exception $e){
            return $this->responseError([], $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSliderRequest $request, $id)
    {
        try{
            return $this->responseSuccess($this->sliderRepository->updateById($request, $id), 'Data update successfully');
        }catch(Exception $e){
            return $this->responseError([], $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            return $this->responseSuccess($this->sliderRepository->deleteById($id), 'Data delete successfully');
        }catch(Exception $e){
            return $this->responseError([], $e->getMessage());
        }
    }
}
