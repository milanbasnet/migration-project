@php
    use App\Models\About;
      
      $aboutData=About::latest()->take(1)->get();
@endphp

<section id="about">
    <div class="container ">
      <h3 class="about-text"> About Us</h3>
      <div class="about-image1">
        @foreach ($aboutData as $item)

             <div class="aboutimg">
                <img src="{{asset('images/about')}}/{{$item->image}}" alt="">
              </div>
              <div class="about-content" >
                  {{-- style="margin-left:600px; margin-top:-200px"> --}}
                  <p class="imagepara">
                    {{$item->content}}
                    {{-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem aliquid reiciendis nam
                  expedita dolore hic
                  minus inventore, id omnis minima voluptates at labore commodi obcaecati exercitationem. Iusto corporis
                  suscipit deleniti. --}}
                </p>
                    <a href="{{route('moreabout')}}">
                      <button  type="submit">Read More...</button>
                    </a>
              </div>
              @endforeach
      </div>
    </div>
  </section>