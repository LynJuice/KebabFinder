 @foreach ($reviews as $review)
    <h3>Atsiliepimo informacija</h3>
    <p>{{ $review }}</p>
    <h3>Vartotojo informacija</h3>
    <p>{{ $review->user }}</p>
    <h3>Kebabinės produkto informacija</h3>
    <p>{{ $review->product }}</p>
    <h3>Kebabinės  informacija</h3>
    <p>{{ $review->shop }}</p> 
    {{-- 
    --}}
    <hr>
    
    


    @endforeach