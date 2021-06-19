@php
    use App\Models\Home;
      
      $homeData=Home::latest()->take(1)->get();
@endphp


<div class="background-container">
    @foreach ($homeData as $item)
   
      <img src="{{asset('images/background')}}/{{$item->image}}" alt="">
    @endforeach

   {{-- <img src="Images\Australia-carousel.jpg">  --}}
      <div class="front-content">
        <div class="front-text">
         <h2 class="headline-class">{{$item->title}}</h2>
          <p>{{$item->description}}</p>
        </div>
        <button type="submit">Book a Consulation</button>
      </div>
</div>