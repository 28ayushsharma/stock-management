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

<h1 class="text-center">Product</h1>
<table class="table table-striped">
        <tr>
          <th>Name</th>
          <td>{{$productdetails->name}}</td>
        </tr>
        <tr>
          <th>Category</th>
          <td>{{$productdetails->category}}</td>
        </tr>
        <tr>
          <th>Quantity left</th>
          <td>{{$productdetails->quantity}}</td>
        </tr>
        <tr>
          <th>Purchased From</th>
          <td>{{$productdetails->purchased_from}}</td>
        </tr>
        <tr>
          <th>Date</th>
          <td>{{$productdetails->date}}</td>
        </tr>
        <tr>
          <th>Price</th>
          <td>{{$productdetails->price}}</td>
        </tr>
        <tr>
          <th>Reorder Quantity</th>
          <td>{{$productdetails->reorder_quantity}}</td>
        </tr>
  <table>

    <a href="{{route('editproduct',$productdetails->id)}}"><button class="btn btn-info">Edit</button></a>
</div>
@endsection
