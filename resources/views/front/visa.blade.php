@php
    use App\Models\Visa;
    $visaone= Visa::where('boxnumber','1')->latest()->take(1)->get();
        $visatwo= Visa::where('boxnumber','2')->latest()->take(1)->get();
        $visathree= Visa::where('boxnumber','3')->latest()->take(1)->get();
        $visafour= Visa::where('boxnumber','4')->latest()->take(1)->get();
        $visafive= Visa::where('boxnumber','5')->latest()->take(1)->get();
        $visasix= Visa::where('boxnumber','6')->latest()->take(1)->get();
      
@endphp

<section id="visas">
    <h3 class="visa-text">Visas</h3>
    <div class="visas container">
      <div class="row">
                <div class="col-md-4">
                  @foreach ($visaone as $item)
                  <a href="{{route('family')}}">
                    <img src="{{asset('images/visas')}}/{{$item->image}}" alt=""
                    {{-- <img src="images\familyvisa.jpg" --}}
                     class="img-fluid" alt="Responsive image" style="height: 320px; width: 440px;">
                  <div class="student-content">
                    <h4 class="student-text">{{$item->title}}</h4>
                    <p>{{$item->content}}</p>
                  </div>
                  </a>
                  @endforeach
                </div>
                <div class="col-md-4">
                  @foreach ($visatwo as $item)
                  <a href="{{route('student')}}">
                    <img src="{{asset('images/visas')}}/{{$item->image}}" alt=""
                    {{-- <img src="images\familyvisa.jpg" --}}
                     class="img-fluid" alt="Responsive image" style="height: 320px; width: 440px;">
                  <div class="student-content">
                    <h4 class="student-text">{{$item->title}}</h4>
                    <p>{{$item->content}}</p>
                  </div>
                  </a>
                  @endforeach
                </div>
                <div class="col-md-4">
                  @foreach ($visathree as $item)
                  <a href="{{route('business')}}">
                    <img src="{{asset('images/visas')}}/{{$item->image}}" alt=""
                    {{-- <img src="images\familyvisa.jpg" --}}
                     class="img-fluid" alt="Responsive image" style="height: 320px; width: 440px;">
                  <div class="student-content">
                    <h4 class="student-text">{{$item->title}}</h4>
                    <p>{{$item->content}}</p>
                  </div>
                  </a>
                  @endforeach
                </div>
                <div class="col-md-4">
                  @foreach ($visafour as $item)
                  <a href="{{route('working')}}">
                    <img src="{{asset('images/visas')}}/{{$item->image}}" alt=""
                    {{-- <img src="images\familyvisa.jpg" --}}
                     class="img-fluid" alt="Responsive image" style="height: 320px; width: 440px;">
                  <div class="student-content">
                    <h4 class="student-text">{{$item->title}}</h4>
                    <p>{{$item->content}}</p>
                  </div>
                  </a>
                  @endforeach
                </div>
                <div class="col-md-4">
                  @foreach ($visafive as $item)
                  <a href="{{route('travel')}}">
                    <img src="{{asset('images/visas')}}/{{$item->image}}" alt=""
                    {{-- <img src="images\familyvisa.jpg" --}}
                     class="img-fluid" alt="Responsive image" style="height: 320px; width: 440px;">
                  <div class="student-content">
                    <h4 class="student-text">{{$item->title}}</h4>
                    <p>{{$item->content}}</p>
                  </div>
                  </a>
                  @endforeach
                </div>
                <div class="col-md-4">
                  @foreach ($visasix as $item)
                  <a href="{{route('dependent')}}">
                    <img src="{{asset('images/visas')}}/{{$item->image}}" alt=""
                    {{-- <img src="images\familyvisa.jpg" --}}
                     class="img-fluid" alt="Responsive image" style="height: 320px; width: 440px;">
                  <div class="student-content">
                    <h4 class="student-text">{{$item->title}}</h4>
                    <p>{{$item->content}}</p>
                  </div>
                  </a>
                  @endforeach
                </div>
        
        </div>
      </div>
</section>