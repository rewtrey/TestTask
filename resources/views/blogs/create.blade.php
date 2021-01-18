@extends('blogs.layout')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Створити пост</h3></div>
                </div>
            </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check your input code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.store') }}" method="POST" class="form-group" enctype="multipart/form-data">


        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="form-group">
                    <strong>Заголовок: </strong>
                    <input type="text" name="title" class="form-control" placeholder="Заголовок">
                </div>
            </div>

            <div class="col-md-10 col-md-offset-1">
                <div class="form-group">
                    <strong>Тескт: </strong>
                    <input type="text" name="text" class="form-control" placeholder="text">
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="form-group">
                    <strong>Slug: </strong>
                    <input type="text" name="slug" class="form-control" placeholder="slug">
                </div>
            </div>
                <div class="col-md-10 col-md-offset-1">
                    <div class="form-group">
                        <strong>Зображення: </strong>
                            <input type="file" class="form-control" name="file"><br>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <input type="submit" value="Створити" class="btn btn-success">
                                </div>
                    </div>
                </div>
@endsection
