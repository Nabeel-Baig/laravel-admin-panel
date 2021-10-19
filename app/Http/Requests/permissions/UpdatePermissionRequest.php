<?php

namespace App\Http\Requests\permissions;

use Illuminate\Foundation\Http\FormRequest;
use App\Permission;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class updatePermissionRequest extends FormRequest
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
            'title' => [
                'required',
            ],
        ];
    }
}
