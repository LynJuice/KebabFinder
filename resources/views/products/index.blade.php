@foreach ($products as $product)
<p>{{ $product }}</p>
<h3>Atsiliepimai</h3>
<p>{{ $product->reviews }}</p>
<h3>Vartotojas</h3>
<p>{{ $product->user }}</p>
<h3>Kebabines</h3>
<p>{{ $product->kebabShops }}</p>
<hr>

@endforeach