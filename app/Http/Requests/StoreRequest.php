<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required|min:5',
            'description'=>'required|min:10',
            'body'=>'required|min:30|max:500',
            'img'=>'required|image',
            'category'=>'required',
            'tags'=>'required|min:4'
        ];
    }

    public function messages(){
        return[
        'title.required'=>'il titolo è obbligatorio',
        'title.min'=>'Il titolo deve essere di almeno 5 caratteri',
        'description.required'=>'La descrizione è obbligatoria',
        'description.min'=>'La descrizione deve essere di almeno 10 caratteri',
        'body.required'=>'La descrizione è obbligatoria',
        'body.min'=>'Il corpo dell\'articolo deve essere di almeno 50 caratteri',
        'body.max'=>'Il corpo dell\'articolo può contenere massimo 500 caratteri',
        'img.required'=>'L\'immagine è obbligatoria',
        'img.image'=>'Il file deve essere un\'immagine',
        'category.required'=>'La categoria è obbligatoria',
        'tags.required'=>'I tags sono obbligatori',
        'tags.min'=>'I tags devono essere di almeno 4 caratteri'
        ];
    }
}
