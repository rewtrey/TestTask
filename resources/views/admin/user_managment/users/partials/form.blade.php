
@section('content')



<label for="">Імя</label>
<input type="text" class="form-control" name="name" placeholder="Імя" value="@if(old('name')){{old('name')}}@else{{$user->name ??""}}@endif" required>


<label for="">Email</label>
<input type="email" class="form-control" name="email" placeholder="email" value="@if(old('email')){{old('email')}}@else{{$user->email ??""}}@endif" required>

<label for="">Пароль</label>
<input type="password" class="form-control" name="password">

<hr />

<input class="btn btn-primary" type="submit" value="Зберегти">
