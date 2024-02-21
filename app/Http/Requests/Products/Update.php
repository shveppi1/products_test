<?php

namespace App\Http\Requests\Products;

use Illuminate\Validation\Rule;

class Update extends Store
{
    protected function artUniqueRule()
    {
        return parent::artUniqueRule()->ignore($this->product->id);
    }

    protected function ruleArticle(){
        return [ 'regex:/^[a-zA-Z0-9]+$/', $this->artUniqueRule(), Rule::can('article') ];
    }
}
