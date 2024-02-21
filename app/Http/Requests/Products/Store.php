<?php

namespace App\Http\Requests\Products;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
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
            'name' => [ 'required' , 'min:10' ],
            'article' => $this->ruleArticle(),
            'status' => [ 'nullable' ],
            'date' => [ 'nullable', 'json' ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Наименование',
            'article' => 'Артикул',
            'status' => 'Статус',
            'date' => 'Данные',
        ];
    }


    protected function artUniqueRule(){
        return Rule::unique(Product::class, 'article')->whereNull('deleted_at');
    }

    protected function ruleArticle(){
        return [ 'required' , 'regex:/^[a-zA-Z0-9]+$/', $this->artUniqueRule() ];
    }
}
