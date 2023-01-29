@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('Message'))
<div class = "alert alert-success alert dismissible" role = "alert";>
    {{ Session::get('Message') }}
<button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
    <span aria-hidden = "true"> &times; </span>
</button>
</div>
 @endif


<a href = "{{ url('product/create') }}" class = " btn btn-success "> Register a new product </a>
<br>
<br>
<table class = "table table-light">
    <thead class = "thead-light">
        <tr>
            <th>#</th>
            <th>Name of the product</th>
            <th>Trade mark</th>
            <th>Model</th>
            <th>Provider</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->Name_of_the_product }}</td>
            <td>{{ $product->Trade_mark }}</td>
            <td>{{ $product->Model }}</td>
            <td>{{ $product->Provider }}</td>
            <td>
                
            <a href = "{{ url('/product/'.$product->id.'/edit') }}" class = "btn btn-warning">
                Edit
            </a>
            
            | 
                
            <form action = "{{ url('/product/'.$product->id) }}" class = "d-inline" method = "post">
            @csrf
            {{method_field('Delete')}}
            <input class = "btn btn-danger" type = "submit" onclick = "return confirm('Are you sure?')" value = "Delete">

            </form>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection