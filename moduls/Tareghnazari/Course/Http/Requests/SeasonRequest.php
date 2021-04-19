<?php
namespace Tareghnazari\Course\Http\Requests;

use Tareghnazari\Course\Models\Course;
use Tareghnazari\Course\Rules\ValidTeacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SeasonRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            "title" => 'required|min:3|max:190',
            "number" => 'nullable|numeric|min:0|max:250',
        ];
    }

    public function attributes()
    {
        return [
            "title" => "عنوان فصل",
            "number" => "شماره فصل",
        ];
    }
}
