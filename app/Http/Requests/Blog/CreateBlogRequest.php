<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => ['string', 'min:3', 'max:64'],
            'text' => ['string', 'min:3', 'max:64'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'slug' => ['string', 'min:3', 'max:64'],
        ];
    }
}
