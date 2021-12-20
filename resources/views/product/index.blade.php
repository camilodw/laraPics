@extends('layouts.app')
@section('content')
    <div class="container justify-content-center">
        <div class="row justify-content-center gap-2">
            <div class="col-12 text-center">
                <a class="btn btn-primary rounded-circle" href="{{ route('products.create') }}"><i class="fas fa-plus"></i></a>
            </div>
            @forelse ($products as $p)
                <div class="card" style="width: 18rem;">
                    <img src="/image/{{ $p->urlImage }}" class="card-img-top" alt="{{$p->name}}" style="max-height: 174px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $p->name }}</h5>
                        <p class="card-text">{{ $p->description }}</p>
                        <p class="card-text">Price:{{ $p->price }} </p>
                        <a href="{{ route('products.show', $p->id) }}" class="btn btn-primary form-control">View</a>

                           <div class="d-flex justify-content-center">
                            <a class="btn btn-secondary" href="{{route('products.edit',$p->id)}}"><i class="far fa-edit"></i></a>
                                <form action="{{ route('products.destroy', $p->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class=" btn btn-danger"><i
                                            class="fas fa-trash"></i></button>
                                 </form>

                        </div>
                    </div>
                </div>
            @empty
                <p class="text text-danger">Data not found</p>
            @endforelse
        </div>
        <div class="row">
            <div class="col-12 justify-content-center d-flex">
                {{ $products->links() }}
            </div>

        </div>

    </div>
@endsection
