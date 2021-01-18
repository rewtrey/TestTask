
@extends('blogs.layout')
@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Список категорій @endslot
            @slot('parent') Головна @endslot
            @slot('active') Категорії @endslot
        @endcomponent

        <hr>

        <a href="{{route('category.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Створити категорії</a>
        <table class="table table-striped">
            <thead>
            <th>Назва</th>
            <th>Пост</th>
            <th class="text-right">Дії</th>
            </thead>
            <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>{{$category->published}}</td>
                    <td class="text-right">
                        <form onsubmit="if (confirm('Удалити?')){ return true } else {return false}" action="{{route('category.destroy', $category)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}

                            <a class="btn btn-default" href="{{route('category.edit', $category)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                        <button type="submit" class="btn"><i class="fa fa-trash-o"></i>Видалити</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Дані відсутні</h2></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
