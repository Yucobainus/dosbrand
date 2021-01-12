<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'collection' => 'required',
            'size' => 'required',
            'color1' => 'required',
            'sheet' => 'required',
            'fill' => 'required',
            'description' => 'required',
            'price' => 'required',
            'mainPhoto' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите название продукта!',
            'collection.required' => 'Введите название коллекции',
            'size.required' => 'Введите доступные размеры',
            'color1.required' => 'Введите доступные цвета',
            'sheet.required' => 'Введите используемую ткань',
            'fill.required' => 'Укажите наполнение',
            'description.required' => 'Добавьте описание продукта',
            'price.required' => 'Укажите цену!',
            'mainPhoto.required' => 'Добавьте главную фотографию!',
        ];
    }

}
