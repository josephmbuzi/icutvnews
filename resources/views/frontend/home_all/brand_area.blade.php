@php
    $allMultiImage = App\Models\MultiImage::all();
@endphp



<!-- tp-barnd-area-start -->
<div class="tp-brand-area brand-space-bottom pb-110">
    <div class="container">
       <div class="row">
          <div class="col-12">
             <div class="tp-brand-title-box pb-60">
                <h4 class="tp-brand-title"><span>Over 180+</span> business growing with us</h4>
             </div>
          </div>
       </div>

    </div>
 </div>
 <!-- tp-barnd-area-end -->

 <!-- tp-marque-area-start -->
 <div class="tp-marque-area fix">
    <div class="tp-marque-wrapper">
        <div class="marque-slider-active carousel-rtl" dir="rtl">

                @foreach ($allMultiImage as $item)
                <div class="brand-item">
                    <div class="marque-item tp-brand-icon">
                        <img style="width: 100%; height: 60px;" src="{{ asset($item->multi_image) }}" alt="Yamfumu Clients">
                    </div>
                </div>
                @endforeach


        </div>
    </div>

 </div>
 <!-- tp-marque-area-end -->
