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
          <form method="post" class="col-md-6 " action="{{route('storesales' ,$productdetails->id)}}">
            {{ csrf_field() }}
              <div class="form-group ">
                <label>Product Name</label>
                <input name="name" type="text" class="form-control" value="{{$productdetails->name}}" disabled>
              </div>
              <div class="form-group" style=" display: inline-block;">
                <label  style="margin-right:1cm">Category</label>
                  <input value="{{$productdetails->category}}" disabled>

              </div>

                <div class="form-group" style=" display: inline-block;">
                <label style="margin-right:10px">Quantity Available</label>
                  <input name="quantity" class="form-control" style="width:100px" type="text" size="16" placeholder=" Units " value="{{$productdetails->quantity}}" disabled>
              </div>
              <div class="form-group ">
                <label>Purchased From</label>
                <input name="purchased_from" type="text" class="form-control" value="{{$productdetails->purchased_from}}" disabled>
              </div>

              <div class="form-group ">
                <label>Date of Purchase</label>
                <input name="date" type="Date" class="form-control" value="{{$productdetails->date}}" disabled>
              </div>

              <div class="form-group ">
                <label style="margin-right:5px">Price Rs.</label>
                <input name="price" type="text" size="15" value="{{$productdetails->price}}" disabled>
              </div>

              <label >Selling Quantity</label>
              <select name="selling_quantity" class="form-control" style="width:100px">
                <option value=" " >Select</option>
                @for($i=1; $i<=$productdetails->quantity; $i++)
                <option> {{$i}}</option>
                @endfor
              </select>

              <br>
              <button type="submit" class="btn btn-success pull-right">Reduce</button>

          </form>
        </div>
    </div>
</div>
@endsection
