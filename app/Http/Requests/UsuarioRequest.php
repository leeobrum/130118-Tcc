<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioRequest extends Request
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
    public function rules(){   
        if ($this->method() == 'PUT') {
            return [
                'name' => 'required|min:2|max:50',                        
                'password' => 'required|min:6|max:30',
                'email' => 'required|email|max:50|unique:users,email,'. $this->id . ',id'
            ];
        }else{
            return [            
                'name' => 'required|min:2|max:50',                        
                'password' => 'required|min:6|max:30',
                'email' => 'required|email|max:50|unique:users'
            ];
        }
        
    }
}
