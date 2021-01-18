@extends('blogs.layout')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Створення користувача @endslot
            @slot('parent') Головна @endslot
            @slot('active') Користувач @endslot
        @endcomponent

        <hr />

        <form class="form-horizontal" action="{{route('admin.user.managment.user.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.user_managment.users.partials.form')
        </form>
    </div>

@endsection
