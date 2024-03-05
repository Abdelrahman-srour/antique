  <!--Main Footer-->
  <footer class="main-footer" style="padding-top: 3%; height: 5%;">
      <div class="container" style="padding-right: 0px;padding-left: 0px;">
          <!--Widgets Section-->
          <div class="widgets-section" style="padding-bottom: 0px;">

              <!--Column-->
              <div class="row clearfix text-center">

                  <!--Footer Column-->
                  <div class="footer-column col-lg-1 col-md-6 col-sm-12 mt-4">
                      <div class="footer-widget gallery-widget links-widget">
                          <h4 class="GFG none"
                              style="writing-mode: vertical-rl;font-family: Graphik!important;font-size:4vw">
                              {{ __('web.FOLLOW US') }}
                      </div>
                  </div>

                  <div class="footer-column col-lg-1 col-md-6 col-sm-12">
                      <div class="footer-bottom" style="padding-top: 0%;">
                          <div class="social-column" style="padding-left: 0%;padding-bottom: 0px;padding-top: 0px;">
                              <ul>
                                  <li><a href="https://www.facebook.com/AntiQue.Official.Page?sfnsn=scwspwa&mibextid=2JQ9oc"><span class="fa-brands fa-facebook fa-sm"></span></a></li>
                                  <li><a href="https://www.instagram.com/antique_home_1?igsh=MXU2dnQ0Y3Jhb3lmMA=="><span class="fa-brands fa-instagram fa-sm"></span></a></li>
                                  {{-- <li><a href="#"><span class="fa-brands fa-linkedin fa-sm"></span></a></li>
                                  <li><a href="#"><span class="fa-brands fa-twitter fa-sm"></span></a></li> --}}
                              </ul>
                          </div>
                      </div>
                  </div>

                  <!--Footer Column-->
                  <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                      <div class="footer-widget links-widget text-center ">
                          <h4 style="font-family:{{ __('web.Graphik') }};margin-top:50%;" class="margin"><i
                                  class="fa-solid fa-location-dot"></i></h4>
                          <p style="color: white;font-family: {{ __('web.know_us_font') }};">{{ __('web.location') }}
                      </div>
                  </div>

                  <!--Footer Column-->
                  <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                      <div class="footer-widget links-widget text-center ">
                          <h4 style="font-family:{{ __('web.Graphik') }};margin-top:50%;" class="margin"><i
                                  class="fa-solid fa-phone-volume"></i></h4>
                          <p style="color: white;font-family:{{ __('web.Graphik') }};">C.E.O <br>
                              Mohamed Allam <br>
                              01001002410</p>
                      </div>
                  </div>

                  <!--Footer Column-->
                  <div class="footer-column col-lg-2 col-md-6 col-sm-12">
                      <div class="footer-widget links-widget text-center ">
                          <h4 style="font-family:{{ __('web.Graphik') }};margin-top:80%;" class="margin"><i
                                  class="fa-solid fa-phone-volume"></i></h4>
                          <p style="color: white;font-family:{{ __('web.Graphik') }};">C.E.O <br>
                              Mohamed Roshdy <br>
                              01110080044</p>
                      </div>
                  </div>

                  <!--Column-->
                  <div class="big-column col-lg-2 col-md-12 col-sm-12">
                      <div class="row clearfix">

                          <div class="footer-column col-lg-1 col-md-6 col-sm-12">
                              <div class="footer-bottom " style="padding-top: 0%;">
                                  <div class="social-column"
                                      style="padding-left: 0%;padding-bottom: 0px;padding-top: 0px;">
                                      <ul >
                                          <li><a href="{{ route('home.page') }}">
                                                  <h4 style="font-family: {{ __('web.know_us_font') }};">
                                                      {{ __('web.HOME') }}</h4>
                                              </a></li>
                                          <li> <a href="{{ route('new-arrivals') }}">
                                                  <h4 style="font-family: {{ __('web.know_us_font') }};">
                                                      {{ __('web.New Arrivals') }}</h4>
                                              </a></li>
                                          <li> <a href="{{ route('contact') }}">
                                                  <h4 style="font-family: {{ __('web.know_us_font') }};">
                                                      {{ __('web.Contact us') }}</h4>
                                              </a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>

                          <!--Footer Column-->
                      </div>
                  </div>

              </div>
          </div>
          <div class="footer-bottom"style="padding-top: 0px;">
              <div class="container">
                  <div class="row clearfix">

                      <!-- Copyright Column -->
                      <div class="copyright-column col-lg-12 col-md-6 col-sm-12 text-center mb-3">
                          <div class="copyright">
                              <a style="text-decoration: none; color:#1F2D51" href="info@antique.eg">info@antique.eg</a>
                          </div>
                      </div>
                      <div class="copyright-column col-lg-12 col-md-6 col-sm-12 text-center">
                          <div class="copyright">
                              2023 &copy; All rights reserved by
                              <a style="text-decoration: none; color:brown" href="https://www.speed-advertising.com/">
                                  Speed Advertising Agency
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
  </footer>

  </div>
  <!--End pagewrapper-->

  <!--Scroll to top-->
  <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>
  <script>
      // Check if the window width is less than or equal to 767px
      if (window.innerWidth <= 767) {
          // Select all h4 elements within the specified containers
          const h4Elements = document.querySelectorAll('.footer-widget h4');

          // Apply margin-top: 0 to each h4 element
          h4Elements.forEach(h4 => {
              h4.style.marginTop = '0';
          });
      }
  </script>
