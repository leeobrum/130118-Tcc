<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PapelRequest extends Request
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
        if ($this->method() == 'PUT') {
            return [
                'nome' => 'required|min:2|max:30|unique:papels,nome,'. $this->id . ',id',                        
                'descricao' => 'required|min:5|max:50'                
            ];
        }else{
            return [            
                'name' => 'required|min:2|max:30|unique:papels',                        
                'descricao' => 'required|min:5|max:50'            
            ];
        }
    }
}
