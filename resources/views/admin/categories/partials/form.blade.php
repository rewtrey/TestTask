<label for="">Статус</label>
<select class="form-control" name="published">
    @if (isset($category->id))
        <option value="0" @if ($category->published == 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ($category->published == 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Назва категорії</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{$category->title ?? ""}}" required>

<label for="">Slug</label>
<input type="text" class="form-control"  name="slug" placeholder="Slug" value="{{$category->slug ?? ""}}" required>

<label for="">Назва підкатегорії</label>
<select class="form-control" name="parent_id">
    <option value="0">-- Без підкатегорії --</option>
    @include('admin.categories.partials.categories', ['categories' => $categories])
</select>

<hr />

<input class="btn btn-primary" type="submit" value="Зберегти">
