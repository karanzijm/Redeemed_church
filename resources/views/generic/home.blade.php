@extends('generic.nav')

@section('content')

<section class="home-slider js-fullheight owl-carousel">
    <div class="slider-item js-fullheight" style="background-image: url('{{ asset('images/bg_1.jpg')}}');">
        <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 text-center ftco-animate mt-5">
                <div class="text">
                    <div class="subheading">
                        <span>Christian Church</span>
                    </div>
                  <h1 class="mb-4">Following <span>Jesus</span> wherever we are</h1>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p><a href="#" class="btn btn-primary py-2 px-4">Be part of us</a> <a href="#" class="btn btn-primary btn-outline-primary py-2 px-4">Read more</a></p>
              </div>
            </div>
          </div>
      </div>
    </div>

    <div class="slider-item js-fullheight" style="background-image: url('{{ asset('images/bg_2.jpg')}}');">
        <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 text-center ftco-animate mt-5">
                <div class="text">
                    <div class="subheading">
                        <span>Christian Church</span>
                    </div>
                  <h1 class="mb-4">We <span>Love</span> God, We Believe in God</h1>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p><a href="#" class="btn btn-primary py-2 px-4">Be part of us</a> <a href="#" class="btn btn-primary btn-outline-primary py-2 px-4">Read more</a></p>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pt ftco-no-pb ftco-about-section" id="about-section">
    <div class="container-fluid px-0">
        <div class="row d-md-flex text-wrapper">
                <div class="one-half img" style="background-image: url('{{ asset('images/about.jpg')}}');"></div>
                <div class="one-half half-text d-flex justify-content-end align-items-center ftco-animate">
                    <div class="text-inner pl-md-5">
          <h3 class="heading">Welcome to <span>Christian</span> Church</h3>
          <p>Far far away,<strong>creative</strong> behind the word mountains, far from the countries Vokalia and Consonantia, there live the <strong>success</strong> blind texts. Separated they live in Bookmarksgrove</p>
          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          <ul class="my-4">
              <li><span class="ion-ios-checkmark-circle mr-2"></span> Even the all-powerful Pointing</li>
              <li><span class="ion-ios-checkmark-circle mr-2"></span> Behind the word mountains</li>
              <li><span class="ion-ios-checkmark-circle mr-2"></span> Separated they live in Bookmarksgrove</li>
          </ul>
        </div>
                </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pb" id="pastor-section">
  <div class="container">
    <div class="row justify-content-center pb-5">
      <div class="col-md-6 heading-section text-center ftco-animate">
        <span class="subheading">Pastors</span>
        <h2 class="mb-4">Church Pastor</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="staff">
          <div class="img-wrap d-flex align-items-stretch">
            <div class="img align-self-stretch" style="background-image: url(images/staff-1.jpg);"></div>
          </div>
          <div class="text d-flex align-items-center pt-3 text-center">
            <div>
              <h3 class="mb-2">Lloyd Wilson</h3>
              <span class="position mb-4">Lead Pastor</span>
              <div class="faded">
                <ul class="ftco-social text-center">
                  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="staff">
          <div class="img-wrap d-flex align-items-stretch">
            <div class="img align-self-stretch" style="background-image: url(images/staff-2.jpg);"></div>
          </div>
          <div class="text d-flex align-items-center pt-3 text-center">
            <div>
              <h3 class="mb-2">Rachel Parker</h3>
              <span class="position mb-4">Lead Pastor</span>
              <div class="faded">
                <ul class="ftco-social text-center">
                  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="staff">
          <div class="img-wrap d-flex align-items-stretch">
            <div class="img align-self-stretch" style="background-image: url(images/staff-3.jpg);"></div>
          </div>
          <div class="text d-flex align-items-center pt-3 text-center">
            <div>
              <h3 class="mb-2">Ian Smith</h3>
              <span class="position mb-4">Lead Pastor</span>
              <div class="faded">
                <ul class="ftco-social text-center">
                  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="staff">
          <div class="img-wrap d-flex align-items-stretch">
            <div class="img align-self-stretch" style="background-image: url(images/staff-4.jpg);"></div>
          </div>
          <div class="text d-flex align-items-center pt-3 text-center">
            <div>
              <h3 class="mb-2">Alicia Henderson</h3>
              <span class="position mb-4">Lead Pastor</span>
              <div class="faded">
                <ul class="ftco-social text-center">
                  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- <section class="ftco-counter" id="section-counter">
    <div class="container-fluid px-0">
        <div class="row no-gutters">
      <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18 text-center py-5">
          <div class="text">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-users"></span>
              </div>
            <strong class="number" data-number="98087">0</strong>
            <span>Members</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18 text-center py-5">
          <div class="text">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-user"></span>
              </div>
            <strong class="number" data-number="309">0</strong>
            <span>Pastors</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18 text-center py-5">
          <div class="text">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-money"></span>
              </div>
            <strong class="number" data-number="9350500">0</strong>
            <span>Donation</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18 text-center py-5">
          <div class="text">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-home"></span>
              </div>
            <strong class="number" data-number="206">0</strong>
            <span>Churches</span>
          </div>
        </div>
      </div>
    </div>
    </div>
</section>
<section class="ftco-section ftco-services-2" id="services-section">
  <div class="container">
    <div class="row justify-content-center pb-5">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Services</span>
        <h2 class="mb-4">Christian Church Services</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services text-center d-block">
          <div class="icon"><span class="flaticon-praying"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Daily Prayers</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services text-center d-block">
          <div class="icon"><span class="flaticon-bible"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Continous Teaching</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services text-center d-block">
          <div class="icon"><span class="flaticon-church"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Set of Sermons</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services text-center d-block">
          <div class="icon"><span class="flaticon-rings"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Wedding</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services text-center d-block">
          <div class="icon"><span class="flaticon-social-care"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Community Helpers</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-services-2" id="services-section">
  <div class="container">
    <div class="row justify-content-center pb-5">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Services</span>
        <h2 class="mb-4">Christian Church Services</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services text-center d-block">
          <div class="icon"><span class="flaticon-praying"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Daily Prayers</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services text-center d-block">
          <div class="icon"><span class="flaticon-bible"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Continous Teaching</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services text-center d-block">
          <div class="icon"><span class="flaticon-church"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Set of Sermons</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services text-center d-block">
          <div class="icon"><span class="flaticon-rings"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Wedding</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services text-center d-block">
          <div class="icon"><span class="flaticon-social-care"></span></div>
          <div class="media-body">
            <h3 class="heading mb-3">Community Helpers</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light" id="sermons-section">
  <div class="container">
    <div class="row justify-content-center pb-5">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Services</span>
        <h2 class="mb-4">Christian Church Sermons</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="sermon-wrap ftco-animate">
          <div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/sermon-1.jpg);">
            <div class="text-content p-4 text-center">
              <span>by pastor:</span>
              <h3>Jerry Simon</h3>
              <p class="">
                <a href="https://vimeo.com/45830194" class="btn-custom mb-2 p-2 text-center popup-vimeo"><span class="icon-play"></span> Watch</a>
                <a href="#" class="btn-custom p-2 text-center"><span class="icon-download"></span> Download</a>
              </p>
            </div>
          </div>
          <div class="text pt-3 text-center">
            <h2 class="mb-0"><a href="sermon.html">Let the Sunset Inspire You</a></h2>
            <div class="meta">
              <p class="mb-0">
                <span>July 01, 2019</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="sermon-wrap ftco-animate">
          <div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/sermon-2.jpg);">
            <div class="text-content p-4 text-center">
              <span>by pastor:</span>
              <h3>Jerry Simon</h3>
              <p class="">
                <a href="https://vimeo.com/45830194" class="btn-custom mb-2 p-2 text-center popup-vimeo"><span class="icon-play"></span> Watch</a>
                <a href="#" class="btn-custom p-2 text-center"><span class="icon-download"></span> Download</a>
              </p>
            </div>
          </div>
          <div class="text pt-3 text-center">
            <h2 class="mb-0"><a href="sermon.html">Developing Spiritual Mentality</a></h2>
            <div class="meta">
              <p class="mb-0">
                <span>July 01, 2019</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="sermon-wrap ftco-animate">
          <div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/sermon-3.jpg);">
            <div class="text-content p-4 text-center">
              <span>by pastor:</span>
              <h3>Jerry Simon</h3>
              <p class="">
                <a href="https://vimeo.com/45830194" class="btn-custom mb-2 p-2 text-center popup-vimeo"><span class="icon-play"></span> Watch</a>
                <a href="#" class="btn-custom p-2 text-center"><span class="icon-download"></span> Download</a>
              </p>
            </div>
          </div>
          <div class="text pt-3 text-center">
            <h2 class="mb-0"><a href="sermon.html">Let the Bible Motivate You</a></h2>
            <div class="meta">
              <p class="mb-0">
                <span>July 01, 2019</span>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="sermon-wrap ftco-animate">
          <div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/sermon-4.jpg);">
            <div class="text-content p-4 text-center">
              <span>by pastor:</span>
              <h3>Jerry Simon</h3>
              <p class="">
                <a href="https://vimeo.com/45830194" class="btn-custom mb-2 p-2 text-center popup-vimeo"><span class="icon-play"></span> Watch</a>
                <a href="#" class="btn-custom p-2 text-center"><span class="icon-download"></span> Download</a>
              </p>
            </div>
          </div>
          <div class="text pt-3 text-center">
            <h2 class="mb-0"><a href="sermon.html">Let the Sunset Inspire You</a></h2>
            <div class="meta">
              <p class="mb-0">
                <span>July 01, 2019</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="sermon-wrap ftco-animate">
          <div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/sermon-5.jpg);">
            <div class="text-content p-4 text-center">
              <span>by pastor:</span>
              <h3>Jerry Simon</h3>
              <p class="">
                <a href="https://vimeo.com/45830194" class="btn-custom mb-2 p-2 text-center popup-vimeo"><span class="icon-play"></span> Watch</a>
                <a href="#" class="btn-custom p-2 text-center"><span class="icon-download"></span> Download</a>
              </p>
            </div>
          </div>
          <div class="text pt-3 text-center">
            <h2 class="mb-0"><a href="sermon.html">Developing Spiritual Mentality</a></h2>
            <div class="meta">
              <p class="mb-0">
                <span>July 01, 2019</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="sermon-wrap ftco-animate">
          <div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/sermon-6.jpg);">
            <div class="text-content p-4 text-center">
              <span>by pastor:</span>
              <h3>Jerry Simon</h3>
              <p class="">
                <a href="https://vimeo.com/45830194" class="btn-custom mb-2 p-2 text-center popup-vimeo"><span class="icon-play"></span> Watch</a>
                <a href="#" class="btn-custom p-2 text-center"><span class="icon-download"></span> Download</a>
              </p>
            </div>
          </div>
          <div class="text pt-3 text-center">
            <h2 class="mb-0"><a href="sermon.html">Let the Bible Motivate You</a></h2>
            <div class="meta">
              <p class="mb-0">
                <span>July 01, 2019</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-intro img" id="events-section" style="background-image: url(images/bg_3.jpg);">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
    </div>
  </div>
</section>

<section class="ftco-section bg-light ftco-event" id="events-section">
  <div class="container-fluid px-4 ftco-to-top">
    <div class="row justify-content-center pb-5">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Events</span>
        <h2 class="mb-5">Upcoming Events</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="event-wrap d-flex ftco-animate">
          <div class="img" style="background-image: url(images/event-1.jpg);"></div>
          <div class="text p-4 d-flex align-items-center">
            <div>
              <span class="time">8:30am - 11:30am</span>
              <h3><a href="#">Sharing Our Faith &amp; Gospel</a></h3>
              <div class="meta">
                <p><span class="icon-user mr-1"></span> by pastor: <a href="#">Jerry Simon</a></p>
                <p><span class="icon-location"></span> 203 Fake St. Mountain View, San Francisco, California, USA</p>
                <p class="mb-0"><a href="#" class="btn btn-primary">Join Us</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="event-wrap d-flex ftco-animate">
          <div class="img" style="background-image: url(images/event-2.jpg);"></div>
          <div class="text p-4 d-flex align-items-center">
            <div>
              <span class="time">8:30am - 11:30am</span>
              <h3><a href="#">Sharing Our Faith &amp; Gospel</a></h3>
              <div class="meta">
                <p><span class="icon-user mr-1"></span> by pastor: <a href="#">Jerry Simon</a></p>
                <p><span class="icon-location"></span> 203 Fake St. Mountain View, San Francisco, California, USA</p>
                <p class="mb-0"><a href="#" class="btn btn-primary">Join Us</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="event-wrap d-flex ftco-animate">
          <div class="img" style="background-image: url(images/event-3.jpg);"></div>
          <div class="text p-4 d-flex align-items-center">
            <div>
              <span class="time">8:30am - 11:30am</span>
              <h3><a href="#">Sharing Our Faith &amp; Gospel</a></h3>
              <div class="meta">
                <p><span class="icon-user mr-1"></span> by pastor: <a href="#">Jerry Simon</a></p>
                <p><span class="icon-location"></span> 203 Fake St. Mountain View, San Francisco, California, USA</p>
                <p class="mb-0"><a href="#" class="btn btn-primary">Join Us</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="event-wrap d-flex ftco-animate">
          <div class="img" style="background-image: url(images/event-4.jpg);"></div>
          <div class="text p-4 d-flex align-items-center">
            <div>
              <span class="time">8:30am - 11:30am</span>
              <h3><a href="#">Sharing Our Faith &amp; Gospel</a></h3>
              <div class="meta">
                <p><span class="icon-user mr-1"></span> by pastor: <a href="#">Jerry Simon</a></p>
                <p><span class="icon-location"></span> 203 Fake St. Mountain View, San Francisco, California, USA</p>
                <p class="mb-0"><a href="#" class="btn btn-primary">Join Us</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="event-wrap d-flex ftco-animate">
          <div class="img" style="background-image: url(images/event-5.jpg);"></div>
          <div class="text p-4 d-flex align-items-center">
            <div>
              <span class="time">8:30am - 11:30am</span>
              <h3><a href="#">Sharing Our Faith &amp; Gospel</a></h3>
              <div class="meta">
                <p><span class="icon-user mr-1"></span> by pastor: <a href="#">Jerry Simon</a></p>
                <p><span class="icon-location"></span> 203 Fake St. Mountain View, San Francisco, California, USA</p>
                <p class="mb-0"><a href="#" class="btn btn-primary">Join Us</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="event-wrap d-flex ftco-animate">
          <div class="img" style="background-image: url(images/event-6.jpg);"></div>
          <div class="text p-4 d-flex align-items-center">
            <div>
              <span class="time">8:30am - 11:30am</span>
              <h3><a href="#">Sharing Our Faith &amp; Gospel</a></h3>
              <div class="meta">
                <p><span class="icon-user mr-1"></span> by pastor: <a href="#">Jerry Simon</a></p>
                <p><span class="icon-location"></span> 203 Fake St. Mountain View, San Francisco, California, USA</p>
                <p class="mb-0"><a href="#" class="btn btn-primary">Join Us</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}
<script>
//   $(document).ready(function(){
// console.log("karanzijm")
//   });
document.addEventListener('DOMContentLoaded', function () {
    // Your jquery code
    console.log("karanzijm");
});
  </script>

  @endsection