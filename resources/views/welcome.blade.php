@include('layouts.front.head')
<div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
<a href="{{route('mention')}}">Mention legale</a>
                            WELCOME {{ $title }}
                            
        <ul>
   @if(count($Posts) > 0)
       @foreach($Posts as $Post)
           <li>
           <h3>{{ $Post ->id}} {{ $Post->title }}</h3>
           <p>{{$Post->content}}</p>
           </li>
       @endforeach
   @else
       <li>No Items</li>
   @endif
</ul>
</div>
                        </div>
@include('layouts.front.footer')

