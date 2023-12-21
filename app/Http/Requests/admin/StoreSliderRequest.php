<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    // protected function prepareForValidation()
    // {
    //     $this->merge([
    //         //'title' => $this->title ?? null,
    //         'serial' => $this->serial ?? null,
    //     ]);
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd($this->all());
        return [
            'title' => 'required',
            'serial' => 'integer|required',
            'video' => 'mimes:mp4,pdf|max:10240'
        ];
    }

    // public function messages(){
    //     return [
    //         'title.required' => 'Title field must be required',
    //         'serial.required' => 'Serial field must be required',
    //     ];
    // }
}
