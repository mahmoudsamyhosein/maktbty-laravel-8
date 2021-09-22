@extends("layouts.main")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تصنيفات الكتب </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <form class="form-inline my-2 my-lg-0" action="{{ route("gallery.categories.search") }}" method="GET" >
                            <input class="form-control mr-sm-2" type="search" placeholder="بحث عن تصنيف" name="term">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">بحث</button>
                        </form>
                    </div>
                    <hr>
                    <br>
                    <h3>{{ $title }}</h3>
                    @if($categories->count())
                        <ul class="list-group">
                            @foreach ($categories as $category)
                                <a style="color:grey"href="{{ route("gallery.categories.show" , $category) }}">
                                    <li class="list-group-item">
                                        {{ $category->name}} ({{ $category->books->count()}})
                                    </li>
                                </a>                                
                            @endforeach
                        </ul>
                    @else
                        <h4>لا نتائج</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection