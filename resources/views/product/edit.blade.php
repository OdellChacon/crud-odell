@extends('layouts.app')
@section('content')
<div class="container"><br>
<form action = "{{  url('/product/'.$product->id) }}" method = "post" enctype = "multipart/form-data">
    @csrf
    {{method_field('Patch')}}
@include('product.form',['mode'=>'Edit'])
</form>
</div>
@endsection