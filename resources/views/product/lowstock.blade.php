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

  <h1 class="text-center">Low Stock</h1>

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
      <?php $i=0 ?>
      @foreach($allproduct as $product)

        @if($product->quantity <= $product->reorder_quantity)
        <?php $i++; ?>
            <tr>
              <td>{{date('d F Y' , strtotime($product->date))}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->quantity}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->reorder_quantity}}</td>
              <td><a href="{{route('viewproduct',$product->id)}}"><button class="btn btn-info">View</button></a></td>
              <td><a href="#"><button class="btn btn-danger">Delete</button></a></td>
            </tr>
        @endif
      @endforeach
      @if($i == 0)
      <h4><font color="Green">No Product Under low Stock</font></h4>
      @endif
    </tbody>
  </table>


</div>
@endsection
