<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        return [
            'title' => ['required'],
            'poster' => ['nullable', 'image'],
            'intro' => ['required'],
            'release_date' => ['required', 'date'],
            'genre_id' => ['required'],
            //
        ];
    }
    public function messages()
    {
        return [

            'title.required' => 'Bạn cần nhập tiêu đề!',
            'poster.image' => 'Bạn cần nhập định dạng ảnh!',
            'intro.required' => 'Bạn cần nhập giới thiệu!',
            'release_date.required' => 'Bạn cần nhập ngày công chiếu!',
            'release_date.date' => 'Ngày công chiếu không hợp lệ!',
            'genre_id.required' => 'Bạn cần chọn thể loại!',
        ];
    }
}
