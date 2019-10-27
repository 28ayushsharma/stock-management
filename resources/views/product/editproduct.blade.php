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
    <div class="row">

      <div class="col-md-10 col-md-offset-3 ">
          <form method="post" class="col-md-6 " action="{{route('updateproduct' ,$productdetails->id)}}">
            {{ csrf_field() }}
              <div class="form-group ">
                <label>Product Name</label>
                <input name="name" type="text" class="form-control" value="{{$productdetails->name}}">
              </div>
              <div class="form-group" style=" display: inline-block;">
                <label  style="margin-right:1cm">Category</label>
                <select name="category" class="form-control" style="width:100px" >
                  <option value="{{$productdetails->category}}" >{{$productdetails->category}}</option>
                  @if(count($allcategory))
                    @foreach($allcategory as $category)
                      <option>{{$category->category}}</option>
                    @endforeach
                  @endif
                </select>
              </div>

                <div class="form-group" style=" display: inline-block;">
                <label style="margin-right:10px">Quantity</label>
                  <input name="quantity" class="form-control" style="width:100px" type="text" size="16" placeholder=" Units " value="{{$productdetails->quantity}}">
              </div>
              <div class="form-group ">
                <label>Purchased From</label>
                <input name="purchased_from" type="text" class="form-control" value="{{$productdetails->purchased_from}}">
              </div>

              <div class="form-group ">
                <label>Date of Purchase</label>
                <input name="date" type="Date" class="form-control" value="{{$productdetails->date}}">
              </div>

              <div class="form-group ">
                <label style="margin-right:10px">Price Rs.</label>
                <input name="price" type="text" size="15" value="{{$productdetails->price}}">

                <label  style="margin-right:10px; margin-left:5px">Reorder Quantity</label>
                <select name="reorder_quantity" >

                    <option value="{{$productdetails->reorder_quantity}}" >{{$productdetails->reorder_quantity}}</option>
                    @for ($i=1; $i <= 100; $i++)
                      <option> {{$i}}</option>
                    @endfor
                </select
              </div>
              <br>
              <button type="submit" class="btn btn-success pull-right">Update</button>

          </form>
        </div>
    </div>
</div>
@endsection
