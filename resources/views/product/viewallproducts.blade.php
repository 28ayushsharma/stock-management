@extends('layouts.app')

@section('content')
<div class="container">

@if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <h1 class="text-center">All Products</h1>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Date</th>
        <th>Name</th>
        <th>Stock Left</th>
        <th>Price(per unit)</th>
        <th>Reorder Quantity</th>
        <th colspan="2">Options</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
        <tr>
          <td>{{date('d F Y' , strtotime($product->date))}}</td>
          <td>{{$product->name}}</td>
          @if($product->quantity <= 0 )
          <td><font color="red">Out of stock</font></td>
          @else
          <td>{{$product->quantity}}</td>
          @endif
          <td>{{$product->price}}</td>
          <td>{{$product->reorder_quantity}}</td>
          <td><a href="{{route('viewproduct',$product->id)}}"><button class="btn btn-info">View</button></a></td>
          @if($product->quantity != 0 )
          <td><a href="{{route('sellproduct',$product->id)}}"><button class="btn btn-success ">Sell</button></a></td>
          @else
          <td><a href="{{route('delete',$product->id)}}"><button class="btn btn-danger">Delete</button></a></td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>


</div>
@endsection
