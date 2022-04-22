@if (!empty($slide))
<section class="home-banner">
    <div id="banner-slider" class="carousel slide" data-ride="carousel">
        @php
           $number = count($slide);
        @endphp

        <div class="container"><ol class="carousel-indicators">
            @for ($i = 0; $i < $number; $i++)
                <li data-target="#banner-slider" data-slide-to="{{$i}}" {!!$i==0 ? 'class="active"' : null!!}></li>
            @endfor
        </ol></div>

        <div class="carousel-inner">
            @foreach ($slide as $key => $item)
                <div class="carousel-item {{$key==0 ? 'active' : null}}" data-src="{{$item->thumb}}">
                    <img class="d-block w-100" src="{{$item->thumb}}">
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

