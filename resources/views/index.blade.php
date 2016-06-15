@extends('layouts.app')

@section('content')

<section class="header-10-sub v-center bg-midnight-blue">
    <div class="background">
        &nbsp;
    </div>
    <div>
        <div class="container">
            <div class="hero-unit">
                <h1>Discover & book beauty appointments 24/7</h1>
                {{ Form::open(['action' => 'HomeController@public_search' , 'method' => 'GET' , 'class' => 'form-inline']) }}
                    <div class="form-group">
                      {{ Form::text('search' , null , ['class' => 'form-control' , 'id' => 'tags', 'placeholder' => 'Services or Stylist' , 'autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group">
                      <select class="form-control" placeholder="Location">
                            <option>Select Location</option>
                            <option>Ampang</option>
                          <option>Bangsar</option>
                          <option>Bandar Sri Damansara</option>
                          <option>Bandar Utama</option>
                          <option>Batu Caves</option>
                          <option>Bukit Damansara</option>
                          <option>Bukit Kiara</option>
                          <option>Cheras</option>
                          <option>Damansara Jaya</option>
                          <option>Damansara Utama</option>
                          <option>Kajang</option>
                          <option>Kepong</option>
                          <option>Klang </option>
                          <option>Kota Damansara</option>
                          <option>Kuala Lumpur </option>
                          <option>Petaling Jaya </option>
                          <option>Puchong</option>
                          <option>Segambut</option>
                          <option>Setapak</option>
                          <option>Sentul</option>
                          <option>Sri Hartamas</option>
                          <option>Sri Petaling </option>
                          <option>Shah Alam </option>
                          <option>Subang Jaya </option>
                          <option>Taman Tun Dr Ismail </option>
                          <option>USJ</option>
                      </select>
                    </div>
                    {{ Form::submit('Search' , ['class' => 'btn btn-default search-cta']) }}
                {{ Form::close() }}

                <div class="keywords">
                    @foreach($categories as $category)
                      <a href="">{{ $category->name }}</a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>






<section class="content-8 featured-landing">
    <div>
        <div class="container">

            <div class="row">

              <div class="col-md-12 feat-title">
            
              <h4>Browse & Discover</h4>
              </div>


                  <div class="col-md-12">
           <div class="row">



                                      <div class="col-md-4 ">


                                      <div class="box-text"><h4>Deals</h4>
</div>

                 <a href="#" class="thumbnail">


                 <img src="framework/img/deals.jpg">
                 </a>
              </div>
                                      <div class="col-md-4 ">
                                                                                      <div class="box-text"><h4>New Stylists</h4>
</div>

                 <a href="#" class="thumbnail">
                 <img src="framework/img/artist.jpg">
                 </a>
              </div>
                                      <div class="col-md-4 ">
                                                                                      <div class="box-text"><h4>Modern Salons</h4>
</div>

                 <a href="#" class="thumbnail">
                 <img src="framework/img/salon.jpg">
                 </a>
              </div>
                                      <div class="col-md-4 ">
                                                                                      <div class="box-text"><h4>Trend Setter Barbers</h4>
</div>

                 <a href="#" class="thumbnail">
                 <img src="framework/img/barber.jpg">
                 </a>
              </div>
                                      <div class="col-md-4 ">
                                                                                      <div class="box-text"><h4>Top Makeup Artists</h4>
</div>

                 <a href="#" class="thumbnail">
                 <img src="framework/img/makeup.jpg">
                 </a>
              </div>
                                      <div class="col-md-4 ">
                                                                                      <div class="box-text"><h4>Pro Manicurists & Pedicurists</h4>
</div>

                 <a href="#" class="thumbnail">
                 <img src="framework/img/manipani.jpg">
                 </a>
              </div>

              <div class="col-md-12 more-bottom-link">
              <a href="" class="more-btn">More Inspiration</a>
              </div>





           </div>
     </div>


            </div>
        </div>
    </div>
</section>

<!-- content-11  -->
<section class="content-11 listbusiness-cta">
    <div class="container">
    <p>Are you a beauty service provider?</p>


        <span>Beauty and wellness professionals 2x their business with Westyleasia.</span>
        <br><br>
        <a class="btn btn-large btn-danger" href="#">Join Us</a>
    </div>
</section>

@endsection
