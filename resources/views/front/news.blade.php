@php
    use App\Models\News;

    $newsData=News::latest()->take(3)->get();
@endphp



<section id="news">
    <h3 class="news-text">Latest Immigration News</h3>
    <div class="container">
      <div class="row">
          @foreach ($newsData as $item)
              
          <div class="col-md-4"> 
                <div class="card">
             <a  href="{{route('newsPage')}}#news1"> 
                  <img class="card-img-top" src="{{'images/news'}}/{{$item->image}}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
              </a>
                    <p class="card-text">{{$item->content}} </p>
                  </div>
                </div>
             </a>
          </div>
          @endforeach
       
         
       </div>
       </div>
   </div>
  </section>