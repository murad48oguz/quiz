<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question'=>'required|min:3',
            'image'=>'image|nullable|max:1024|mimes:jpg,jpeg,png',
            'answer1'=>'required|min:3',
            'answer2'=>'required|min:3',
            'answer3'=>'required|min:3',
            'answer4'=>'required|min:3',
            'correct_answer'=>'required',



        ];
    }
}
