@php

    use App\Enums\Products\Status;

@endphp

<form action="{{route('products.update', [$product->id])}}" method="post">

    @csrf
    @method('put')

    <div class="form-group">
        <label for="exampleInputArticle">Наименование</label>
        <input type="text" name="name" value="{{ $errors->any() ? old('name') : $product->name }}">
    </div>

    @can('article')
        <div class="form-group">
            <label for="exampleInputArticle">Артикул</label>
            <input type="text" name="article" value="{{ $errors->any() ? old('article') : $product->article }}">
        </div>
    @endcan

    <div class="form-group">
        <label for="exampleInputStatus">Статус</label>
        <select class="form-control" name="status" id="exampleInputStatus">
            @foreach(Status::select() as $key=>$value)
                <option value="{{ $key }}" @if($key == $product->status) selected @endif>{{ $value }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group-btn">
        <input type="submit" value="Изменить" />
    </div>

</form>
