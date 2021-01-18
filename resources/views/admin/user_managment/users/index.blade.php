
@extends('blogs.layout')
@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Список користувачів @endslot
            @slot('parent') Головна @endslot
            @slot('active') Корисувачі @endslot
        @endcomponent

        <hr>

        <a href="{{route('admin.user.managment.user.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Створити користувача</a>
        <table class="table table-striped">
            <thead>
            <th>Імя</th>
            <th>Email</th>
            <th class="text-right">Дії</th>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-right">
                        <form onsubmit="if (confirm('Удалити?')){ return true } else {return false}" action="{{route('admin.user.managment.user.destroy', $user)}}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}


                            <a class="btn btn-default" href="{{route('admin.user.managment.user.edit', $user)}}">
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
            <tfoot>
                <tr>
                    <td colspan="3">
                        <ul class="pagination pull-right">
                            {{$users ->links()}}
                        </ul>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection
