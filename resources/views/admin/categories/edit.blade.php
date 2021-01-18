 @extends('blogs.layout')
 @section('content')

     <div class="container">

         @component('admin.components.breadcrumb')
             @slot('title') Редагування категорії @endslot
             @slot('parent') Головна @endslot
             @slot('active') Категорії @endslot
         @endcomponent

         <hr />

         <form class="form-horizontal" action="{{route('category.update', $category)}}" method="post">
            <input type="hidden" name="_method" value="put">
             {{ csrf_field() }}

             {{-- Form include --}}
             @include('admin.categories.partials.form')

         </form>
     </div>

 @endsection
