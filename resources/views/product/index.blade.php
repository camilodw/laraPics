@extends('layouts.app')
@section('content')
<div class="container justify-content-center">
    
   <div class="row justify-content-center gap-2">
    @forelse ($products as $p)
    <div class="card" style="width: 18rem;">
      <img src="{{ $p->urlImage }}" class="card-img-top" alt="..." style="max-height: 174px">
      <div class="card-body">
        <h5 class="card-title">{{ $p->name }}</h5>
        <p class="card-text">{{ $p->description }}</p>
        <p class="card-text">Price:{{$p->price }} </p>
        <a href="#" class="btn btn-primary form-control">View</a>
        <div class="text-center">
            <a class="btn btn-secondary"></a>
            <a href="" class="btn btn-danger"></a>
        </div>
       
      </div>
    </div>
    @empty
        <p class="text text-danger">Data not found</p>
    @endforelse  
   </div>
         

</div>
@endsection