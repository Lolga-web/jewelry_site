<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

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
        $tableNameCategory = (new Category())->getTable();
        return [
            'article' => 'required|unique:products,article',
            'img' => 'required|mimes:jpeg,png,bmp|max:1000',
            'priority' => 'integer',
            'category_id' => "required|exists:{$tableNameCategory},id",
        ];
    }

    public function messages()
    {
        return [
            'article.required' => 'Не заполнено поле :attribute',
            'article.unique' => 'Позиция с таким артикулом уже существует',
            'img.required' => 'Не добавлено :attribute',
            'img.mimes' => ':attribute должен быть в формате jpeg, png или bmp',
            'img.max' => ':attribute не должно быть больше 1Мб',
            'priority.integer' => 'В поле :attribute должно быть число',
            'category_id.required' => 'Не заполнено поле :attribute',
            'category_id.exists' => 'Не найдено такой категории',
        ];
    }

    public function attributes()
    {
        return [
            'article' => 'Артикул',
            'img' => 'Изображение',
            'priority' => 'Приоритет',
            'category_id' => 'Категория',
        ];
    }
}
