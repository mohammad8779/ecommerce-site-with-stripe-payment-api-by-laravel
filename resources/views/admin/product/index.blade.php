@extends('admin.layout.admin')



@section('content')

    <h3>Products</h3>

  @forelse($products as $product)
    
       <h4>Name of product:{{$product->name}}</h4>
       <h4>Category:{{$product->category->name}}</h4>

        <form action="{{route('product.destroy',$product->id)}}"  method="POST">
           {{csrf_field()}}
           {{method_field('DELETE')}}
           <input class="btn btn-sm btn-danger" type="submit" value="Delete">
        </form>
       
   @empty

     <h3>No products</h3>

    @endforelse
    
@endsection
