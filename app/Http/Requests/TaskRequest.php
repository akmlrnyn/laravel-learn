<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
        $rule_task_unique = Rule::unique('Tasks', 'task');
        if($this -> method() !== 'POST'){
            $rule_task_unique -> ignore($this->route()->parameter('id'));
        }

        return [
            // 'task' => ['required', 'unique:Tasks'],
            'task' => ['required', $rule_task_unique],
            'user' => ['required']
        ];
    }

        //default function, for custom message error catch
        public function messages(){
            return[
                'required' => 'isian :attribute diisi dulu woy',
                'user.required' => 'nama pengguna harus diisi'
            ];
        }
}
