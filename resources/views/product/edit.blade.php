@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 bg-white">
            <form action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    @error('name')
                    <p class="text text-danger">{{ $message }}</p>
                    @enderror
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    @error('description')
                    <p class="text text-danger">{{ $message }}</p>
                    @enderror
                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    @error('price')
                    <p class="text text-danger">{{ $message }}</p>
                    @enderror
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" value="{{$product->price}}" name="price" id="price">
                </div>
                <div class="form-group">
                    @error('urlImage')
                    <p class="text text-danger">{{ $message }}</p>
                    @enderror
                    <label for="urlImage" class="form-label">Image</label>
                 <input type="file" id="urlImage"
                        accept="image/*" name="urlImage" class="form-control">
                </div>
                <button class="btn btn-success form-control" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
