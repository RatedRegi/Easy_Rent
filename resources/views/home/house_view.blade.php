@extends('layouts.app')


@section('content')

<section class="explore-section section-padding" id="section_2">
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <a href="topics-detail.html">
                        <div class="d-flex">
                            <div>
                                <h5 class="mb-2">Main</h5>
                            </div>

                            <span class="badge bg-design rounded-pill ms-auto">14</span>
                        </div>
                        <img src="{{asset('build\assets\images\listing-03.jpg')}}" class="custom-block-image img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Living Room</h5>
                                            </div>

                                            <span class="badge bg-design rounded-pill ms-auto">14</span>
                                        </div>

                                        <img src="{{asset('build\assets\images\listing-01.jpg')}}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Bedroom</h5>
                                            </div>

                                            <span class="badge bg-design rounded-pill ms-auto">75</span>
                                        </div>

                                        <img src="{{asset('build\assets\images\listing-01.jpg')}}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Lounge</h5>  
                                            </div>

                                            <span class="badge bg-design rounded-pill ms-auto">100</span>
                                        </div>

                                        <img src="{{asset('build\assets\images\listing-01.jpg')}}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <a href="topics-detail.html">
                        <div class="d-flex">
                            <div>
                                <h5 class="mb-0">8 room in Mkoba Avenues | $65 per Month | 0778123418</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <h2 class="text-center">Map</h2>
  </div>
{{-- location section --}}

<div class="contact-page my-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-lg">
                <div id="map">
                  <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- location section --}}
@endsection