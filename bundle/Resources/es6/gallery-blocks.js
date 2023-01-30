/* global Swiper, PhotoSwipe, PhotoSwipeLightbox */

window.addEventListener('load', () => {
  document.querySelectorAll('.ngl-gallery .js-lightbox-enabled').forEach((element) => {
    const lightbox = new PhotoSwipeLightbox({
      gallery: element,
      children: '.js-lightbox-item',
      pswpModule: PhotoSwipe,
    });
    lightbox.init();
  });

  // Sushi swiper
  [...document.getElementsByClassName('sushi-swiper')].forEach((swiper, i) => {
    const swiperId = `sushiSwiper-${i + 1}`;
    const data = swiper.dataset;
    swiper.setAttribute('id', swiperId);
    return new Swiper(swiper, {
      navigation: {
        nextEl: `#${swiperId} .swiper-button-next`,
        prevEl: `#${swiperId} .swiper-button-prev`,
      },
      pagination: {
        el: `#${swiperId} .swiper-pagination`,
        clickable: true,
      },
      loop: data.loop,
      loopFillGroupWithBlank: true,
      effect: data.effect,
      watchSlidesVisibility: true,
      autoplay: data.autoplay ? { delay: data.autoplay * 1000 } : false,
      slidesPerView: parseInt(data.slidesPerView, 10),
      slidesPerGroup: data.slidesPerGroup ? parseInt(data.slidesPerGroup, 10) : parseInt(data.slidesPerView, 10),
      spaceBetween: 30,
      breakpoints: {
        991: {
          slidesPerView: 2,
        },
        480: {
          slidesPerView: 1,
        },
      },
    });
  });

  // Default swiper
  [...document.getElementsByClassName('default-swiper')].forEach((swiper, i) => {
    const swiperId = `defaultSwiper-${i + 1}`;
    const data = swiper.dataset;
    swiper.setAttribute('id', swiperId);
    return new Swiper(swiper, {
      navigation: {
        nextEl: `#${swiperId} .swiper-button-next`,
        prevEl: `#${swiperId} .swiper-button-prev`,
      },
      pagination: {
        el: `#${swiperId} .swiper-pagination`,
        clickable: true,
      },
      preloadImages: false,
      loop: data.loop,
      effect: data.effect,
      watchSlidesVisibility: true,
      autoplay: data.autoplay ? { delay: data.autoplay * 1000 } : false,
      lazy: {
        loadPrevNext: true,
        loadPrevNextAmount: 1,
        loadOnTransitionStart: true,
      },
      keyboard: {
        enabled: true,
      },
      autoHeight: true,
      on: {
        init() {
          this.update();
        },
        lazyImageReady() {
          this.updateAutoHeight();
        },
      },
    });
  });

  // Thumb gallery
  [...document.getElementsByClassName('thumb-swiper')].forEach((swiper) => {
    const top = swiper.querySelectorAll('.gallery-top')[0];
    const thumbs = swiper.querySelectorAll('.gallery-thumbs')[0];
    const data = top.dataset;
    const galleryTop = new Swiper(top, {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      spaceBetween: 10,
      preloadImages: false,
      loop: data.loop,
      effect: data.effect,
      watchSlidesVisibility: true,
      autoplay: data.autoplay ? { delay: data.autoplay * 1000 } : false,
      lazy: {
        loadPrevNext: true,
        loadPrevNextAmount: 1,
        loadOnTransitionStart: true,
      },
      loopedSlides: data.loop ? data.length : null,
      autoHeight: true,
      on: {
        lazyImageReady() {
          this.updateAutoHeight();
        },
      },
    });
    const galleryThumbs = new Swiper(thumbs, {
      spaceBetween: 10,
      centeredSlides: true,
      slidesPerView: 'auto',
      touchRatio: 0.2,
      slideToClickedSlide: true,
      loop: data.loop,
    });
    galleryTop.controller.control = galleryThumbs;
    galleryThumbs.controller.control = galleryTop;
  });
});
