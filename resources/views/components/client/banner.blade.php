 @if (isset($images))
     @foreach ($images as $image)
         <div class="swiper-slide">
             <img class="owl-lazy d-block w-100" src="{{ url($image->image) }}" />
         </div>
    
     @endforeach
 @endif

