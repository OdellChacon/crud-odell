
<h1>{{ $mode }} Product</h1>

@if(count($errors)>0)
    <div class = "alert alert-danger" role = "alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach 
    </ul>
    </div>

@endif

<div class = "form-group">
<label for = "Name_of_the_product"> Name of the product </label>
    <input type = "text" class= "form-control" name = "Name_of_the_product" 
    value = "{{ isset($product->Name_of_the_product)?$product->Name_of_the_product:old('Name_of_the_product') }}" id = Name_of_the_product>
</div>

<div class = "form-group">
<label for = "Trade mark"> Trade mark </label>
    <input type = "text" class= "form-control" name = "Trade_mark" 
    value = "{{ isset($product->Trade_mark)?$product->Trade_mark:old('Trade_mark') }}" id = Trade_mark>
</div>

<div class = "form-group">
<label for = "Model"> Model </label>
    <input type = "text" class= "form-control" name = "Model" 
    value = "{{ isset($product->Model)?$product->Model:old('Model') }}" id = Model>
</div>

<div class = "form-group">
<label for = "Provider"> Provider </label>
    <input type = "text" class= "form-control" name = "Provider" 
    value = "{{ isset($product->Provider)?$product->Provider:old('Provider') }}" id = Provider>
</div>

<input class = "btn btn-success" type = "submit" value = "{{ $mode }}">
<a class= "btn btn-primary" href = "{{ url('product/') }}"> Back </a>
    <br>