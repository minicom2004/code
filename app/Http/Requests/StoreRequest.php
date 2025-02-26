<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => ['required','unique:movies,title'],
            'poster' => ['nullable', 'image','max:2048'],
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
            'title.unique' => 'Tên phim đã tồn tại !',
            'poster.max' => 'Anh vượt quá 2MB rồi !',
            'poster.image' => 'Bạn cần nhập định dạng ảnh!',
            'intro.required' => 'Bạn cần nhập giới thiệu!',
            'release_date.required' => 'Bạn cần nhập ngày công chiếu!',
            'release_date.date' => 'Ngày công chiếu không hợp lệ!',
            'release_date.after_or_equal' => 'Ngày công chiếu không được nhỏ hơn ngày hiện tại!',
            'genre_id.required' => 'Bạn cần chọn thể loại!',

        ];
    }
    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->release_date && Carbon::parse($this->release_date)->isBefore(Carbon::today())) {
                $validator->errors()->add('release_date', 'Ngày công chiếu không được nhỏ hơn ngày hiện tại!');
            }
        });
    }
}
