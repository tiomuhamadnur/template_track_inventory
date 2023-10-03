
<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
      <link rel="stylesheet" href="{{ asset('assets_transisi/css/swiper-bundle.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets_transisi/css/styles_pc.css') }}">
      <link rel="shortcut icon" href="{{ asset('assets/images/mm.png') }}" />
      <title>Dashboard Transition | P&C</title>
   </head>
   <body>
        <div class="bg-area-civil"></div>
        <div class="bg-area-civil layer-2"></div>
        <div class="bg-area-civil layer-3"></div>
      <section class="container">
         <div class="card__container swiper">
            <div class="card__content">
               <div class="swiper-wrapper">
                  <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="{{ asset('assets_transisi/img/mainline0.png') }}" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                     </div>

                     <div class="card__data">
                        <h3 class="card__name">Mainline</h3>
                        <p class="card__description">
                           Dashboard Activity Civil
                        </p>

                        <a href="{{ route('logout') }}" class="card__button">Explore</a>
                     </div>
                  </article>

                  <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="{{ asset('assets_transisi/img/depo0.png') }}" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                     </div>

                     <div class="card__data">
                        <h3 class="card__name">Lorem Ipsum</h3>
                        <p class="card__description">
                           Lorem ipsum dolor sit amet.
                        </p>

                        <a href="#" class="card__button">Explore</a>
                     </div>
                  </article>

                  {{-- <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="{{ asset('assets_transisi/img/jadwal0.png') }}" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                     </div>

                     <div class="card__data">
                        <h3 class="card__name">Lorem Ipsum</h3>
                        <p class="card__description">
                           Lorem ipsum dolor sit amet.
                        </p>

                        <a href="#" class="card__button">Explore</a>
                     </div>
                  </article> --}}

                  {{-- <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="{{ asset('assets_transisi/img/masterdata0.png') }}" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                     </div>

                     <div class="card__data">
                        <h3 class="card__name">Lorem Ipsum</h3>
                        <p class="card__description">
                           Lorem ipsum dolor sit amet.
                        </p>

                        <a href="#" class="card__button">Explore</a>
                     </div>
                  </article> --}}
               </div>
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next">
               <i class="ri-arrow-right-s-line"></i>
            </div>

            <div class="swiper-button-prev">
               <i class="ri-arrow-left-s-line"></i>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
         </div>
      </section>

      <!--=============== SWIPER JS ===============-->
      <script src="{{ asset('assets_transisi/js/swiper-bundle.min.js') }}"></script>

      <!--=============== MAIN JS ===============-->
      <script src="{{ asset('assets_transisi/js/main_user.js') }}"></script>
   </body>
</html>
