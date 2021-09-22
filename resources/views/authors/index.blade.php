@extends("layouts.main")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">المؤلفين </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <form class="form-inline my-2 my-lg-0" action="{{ route("gallery.authors.search") }}" method="GET" >
                            <input class="form-control mr-sm-2" type="search" placeholder="بحث عن مؤلف" name="term">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">بحث</button>
                        </form>
                    </div>
                    <hr>
                    <br>
                    <h3>{{ $title }}</h3>
                    @if($authors->count())
                        <ul class="list-group">
                            @foreach ($authors as $author)
                                <a style="color:grey"href="{{ route("gallery.authors.show" , $author) }}">
                                    <li class="list-group-item">
                                        {{ $author->name}} ({{ $author->books->count()}})
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