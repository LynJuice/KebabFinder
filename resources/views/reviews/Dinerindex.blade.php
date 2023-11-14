@foreach ($reviews as $review)
    <h3>Atsiliepimo informacija</h3>
    <p>{{ $review }}</p>
    <h3>Vartotojo informacija</h3>
    <p>{{ $review->user }}</p>
    <h3>Kebabinės  informacija</h3>
    <p>{{ $review->diner }}</p> 
    <hr>
    
    


    @endforeach