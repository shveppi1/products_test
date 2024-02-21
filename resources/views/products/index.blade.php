@php

use App\Enums\Products\Status;

@endphp

@extends('layout.main')

@section('h1', 'Продукты')

@section('content')

    <div class="top-panel flex justify-end">
        <a href="" id="btn_open_form" class="bg-blue-400 text-white py-2 px-4 rounded text-sm">Добавить</a>
    </div>


    <table class="border-collapse table-fixed w-full text-sm">
        <thead>
        <tr>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Артикул</font></font></th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Название</font></font></th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Статус</font></font></th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Атрибуты</font></font></th>
            <th></th>
        </tr>
        </thead>
        <tbody class="products bg-white dark:bg-slate-800" id="content-table">
            @foreach($products as $product)
                <tr data-id="{{$product->id}}">
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$product->article}}</font></font>
                    </td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$product->name}}</font></font>
                    </td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$product->status->text()}}</font></font>
                    </td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$product->date}}</font></font>
                    </td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                        <form action="{{route('products.destroy', [$product->id])}}"
                              method="post"
                              onsubmit="return confirm('Уверены в удалении?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="удалить">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>




@endsection

@section('modals_form')

    <div class="popupsWrapper bg-slate-500">
        <div class="popupsWrapper__form bg-slate-500">
            <div class="popupFormAdd" id="product_add_form">

                <div class="form_wrapp">
                <form method="post" action="{{ route('products.store') }}">

                    @csrf

                    <div class="form-group">
                        <label for="exampleInputName">Наименование</label>
                        <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="Наименование">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputArt">Артикул</label>
                        <input type="text" class="form-control" name="article" id="exampleInputArt" placeholder="Артикул">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputStatus">Статус</label>
                        <select class="form-control" name="status" id="exampleInputStatus">
                            @foreach(Status::select() as $key=>$value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group-btn">
                        <input type="submit" value="Добавить" />
                    </div>

                </form>
                </div>


            </div>
        </div>
    </div>



    <div class="popupsWrapper bg-slate-500">
        <div class="popupsWrapper__form bg-slate-500">
            <div class="popupFormAdd" id="product_detail">
                <div class="detail_wrapp">

                </div>
            </div>
        </div>
    </div>

    <div class="popupsWrapper bg-slate-500">
        <div class="popupsWrapper__form bg-slate-500">
            <div class="popupFormAdd" id="product_edit">
                <div class="detail_wrapp">

                </div>
            </div>
        </div>
    </div>


@endsection


