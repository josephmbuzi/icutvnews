<aside class="col-md-4 sidebar sidebar--right">

    <!-- Widget Popular Posts -->
    @php
        $popularBlogs = App\Models\Blog::with('editorChoice') // Include editor's choice relationship if you have one
        ->orderBy('views_count', 'desc') // Order by views_count in descending order
        ->take(5) // Get the top 5 popular blogs
        ->get();

        $allreviews = App\Models\Review::latest()->limit(2)->get();

        $advert = App\Models\Advert::latest()->get();
        $allfooter = App\Models\Footer::find(1);
    @endphp

    @php($i = 1)
        <div class="widget widget-popular-posts">
          <h4 class="widget-title">Popular Posts</h4>
          <ul class="widget-popular-posts__list">
              @foreach ($popularBlogs as $popularItem)
                  <li>
                      <article class="clearfix">
                      <div class="widget-popular-posts__img-holder">
                          <span class="widget-popular-posts__number">{{  $i++ }}</span>
                          <div class="thumb-container">
                          <a href="{{ route('blog.details',$popularItem->id)}}">
                              <img data-src="{{ asset($popularItem->blog_thumb)}}" src="{{ asset($popularItem->blog_thumb)}}" alt="" class="lazyload">
                          </a>
                          </div>
                      </div>
                      <div class="widget-popular-posts__entry">
                          <h3 class="widget-popular-posts__entry-title">
                              <a href="{{ route('blog.details',$popularItem->id)}}">{{$popularItem->blog_title}}</a>
                          </h3>
                      </div>
                      </article>
                  </li>
              @endforeach


          </ul>
        </div> <!-- end widget popular posts --><!-- end widget popular posts -->

    <!-- Widget Newsletter -->
    <div class="widget widget_mc4wp_form_widget">
      <h4 class="widget-title">Subscribe for Evolve & Explore Hub news and receive daily updates</h4>
      <form id="mc4wp-form-1" class="mc4wp-form" method="post" action="{{ route('store.subscriber') }}">
          @csrf
        <div class="mc4wp-form-fields">
          <p>
            <i class="mc4wp-form-icon ui-email"></i>
            <input type="email" name="EMAIL" placeholder="Your email" required="">
          </p>
          <p>
            <input type="submit" class="btn btn-md btn-color" value="Subscribe">
          </p>
        </div>
      </form>
    </div> <!-- end widget newsletter -->

    <!-- Widget socials -->

    <div class="widget widget-socials">
      <h4 class="widget-title">Keep up with Evolve & Explore Hub</h4>
      <ul class="socials">
        <li>
          <a class="social-facebook" href="{{ $allfooter->facebook }}" title="facebook" target="_blank">
              <i class="fa-brands fa-facebook"></i>
            <span class="socials__text">Facebook</span>
          </a>
        </li>
        <li>
          <a class="social-twitter" href="{{ $allfooter->twitter }}" title="twitter" target="_blank">
              <i class="fa-brands fa-x-twitter"></i>
            <span class="socials__text">Twitter</span>
          </a>
        </li>
        <li>
          <a class="social-google-plus" href="{{ $allfooter->youtube }}" title="Youtube" target="_blank">
              <i class="fa-brands fa-youtube"></i>
            <span class="socials__text">Youtube</span>
          </a>
        </li>

      </ul>
    </div> <!-- end widget socials -->

    <!-- Widget Banner -->


    <div class="widget widget_media_image">
      @foreach ($advert as $advert)
          <a href="{{ $advert->advert_link }}">
              <img src="{{ asset($advert->advert_side_img) }}" alt="">
          </a>
      @endforeach
  </div>
  <!-- end widget banner -->

    <!-- Widget Facebook -->
    <div class="widget widget-facebook">
      <div class="fb-page" data-href="https://www.facebook.com/dannymulyansalu1/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
    </div> <!-- end widget facebook -->

    <!-- Widget Latest Reviews -->
    <div class="widget widget-latest-reviews">

      <h4 class="widget-title">Latest Reviews</h4>
      @foreach ($allreviews as $review)
          <article class="entry">
              <div class="entry__img-holder">
              <a href="{{ route('review.details', $review->id)}}">
                  <div class="thumb-container">
                  <img data-src="{{ asset($review->review_thumb)}}" src="{{ asset($review->review_thumb)}}" class="entry__img lazyload" alt="">
                  </div>
              </a>
              </div>

              <div class="entry__body">
              <div class="entry__header">
                  <a href="{{ route('category.review', $review->id) }}" class="entry__meta-category">{{$review['category']['review_category']}}</a>
                  <h2 class="entry__title">
                  <a href="{{ route('review.details', $review->id)}}">{{ $review->review_title }}</a>
                  </h2>
              </div>
              <ul class="entry__meta">
                  <li class="entry__meta-rating">
                      @for ($i = 1; $i <= 5; $i++)
                          @if ($i <= $review->review_rating)
                              <i class="fas fa-star"></i> <!-- Filled star -->
                          @else
                              <i class="far fa-star"></i> <!-- Empty star -->
                          @endif
                      @endfor
                  </li>
              </ul>
              </div>
          </article>
      @endforeach




      <ul class="post-list-small">

              <li class="post-list-small__item">
                  @foreach ($allreviews as $item)
                      <article class="post-list-small__entry">
                      <a href="{{ route('review.details',$item->id)}}" class="clearfix">
                          <div class="post-list-small__img-holder">
                          <div class="thumb-container">
                              <img src="{{ asset($item->review_thumb)}}" class="post-list-small__img" alt="">
                          </div>
                          </div>
                          <div class="post-list-small__body">
                          <h3 class="post-list-small__entry-title">
                              {{ $item->review_title }}
                          </h3>
                          <ul class="entry__meta">
                              <li class="entry__meta-rating">
                                  @for ($i = 1; $i <= 5; $i++)
                                  @if ($i <= $item->review_rating)
                                      <i class="fas fa-star"></i> <!-- Filled star -->
                                  @else
                                      <i class="far fa-star"></i> <!-- Empty star -->
                                  @endif
                              @endfor
                              </li>
                          </ul>
                          </div>
                      </a>
                      </article>
                  @endforeach
              </li>



      </ul>
    </div> <!-- end widget latest reviews -->

</aside>
