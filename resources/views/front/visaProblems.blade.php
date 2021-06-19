@php
    use App\Models\Problem;

    $problemData=Problem::latest()->take(1)->get();
@endphp

<section id="problems">
    <div class="container">
        @foreach ($problemData as $item)
            
      <h3 class="problem-text">Visa Problems</h3>
      <div class="problem-image">
        <div class="problemimgimg">
        <img src="{{'images/visaProblem'}}/{{$item->image}}" alt="...">
        </div>
        <div class="problem-content">
          <p class="imagepara">{{$item->content}}</p>
              <a href="{{route('problemPage')}}">
                <button type="submit">Read More...</button>
              </a>
        </div>
      </div>
      @endforeach

    </div>
  </section>