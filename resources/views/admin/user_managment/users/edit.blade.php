@extends('blogs.layout')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Редагування користувача @endslot
            @slot('parent') Головна @endslot
            @slot('active') Користувачі @endslot
        @endcomponent

        <hr />

        <form class="form-horizontal" action="{{route('admin.user.managment.user.update', $user)}}" method="post">
            {{ method_field('PUT')}}
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.user_managment.users.partials.form')
        </form>
    </div>

@endsection
