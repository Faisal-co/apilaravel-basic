<?php
// php artisan make:request StorePostRequest(To make seprate file for Validation Rules for database requests).
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return 
            [
            'title'=>'required|string|min:3',
            'body'=>['required','string','min:2'],
            // 'tags'=>'array', // if some value has validation in array
            // 'tags.*'=>'string|min:2'
            
            ];
    }
    public function messages(){
        return [
            'title.required' => 'messege Title is required from message function',
            'title.string' => 'string is required for title from message function',
            'title.min' => 'for Title at least :min chars characters required from message function'
        ];
    }
}
