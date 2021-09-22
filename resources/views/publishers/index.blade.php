@extends("layouts.main")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">الناشرين </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <form class="form-inline my-2 my-lg-0" action="{{ route("gallery.publishers.search") }}" method="GET" >
                            <input class="form-control mr-sm-2" type="search" placeholder="بحث عن ناشر" name="term">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">بحث</button>
                        </form>
                        
                    </div>
                    <hr>
                    <br>
                    <h3>{{ $title }}</h3>
                    @if($publishers->count())
                        <ul class="list-group">
                            @foreach ($publishers as $publisher)
                                <a style="color:grey"href="{{ route("gallery.publishers.show" , $publisher) }}">
                                    <li class="list-group-item">
                                        {{ $publisher->name}} ({{ $publisher->books->count()}})
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