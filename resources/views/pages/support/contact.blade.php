@extends('pages.index')

@section('content')

@include('pages.elements.page_banner')

<!-- end inner page banner -->
<div class="section padding_layout_1">
    <div class="container">
      <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="row">
            <div class="full">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main_heading text_align_center">
                  <h2>GET IN TOUCH</h2>
                </div>
              </div>
              <div class="contact_information">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                  <div class="information_bottom text_align_center">
                    <div class="icon_bottom"> <i class="fa fa-road" aria-hidden="true"></i> </div>
                    <div class="info_cont">
                      <h4>Lorem Ipsum is simply dummy text..</h4>
                      <p>Melbourne Australia</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                  <div class="information_bottom text_align_center">
                    <div class="icon_bottom"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                    <div class="info_cont">
                      <h4>0011 234 56789</h4>
                      <p>Mon-Fri 8:30am-6:30pm</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                  <div class="information_bottom text_align_center">
                    <div class="icon_bottom"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                    <div class="info_cont">
                      <h4>Example@gmail.com</h4>
                      <p>24/7 online support</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
                <h2 class="text_align_center">SEND MESSAGER</h2>
                <div class="form_section">
  
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  <div class="center">
                    @if(session('success'))
                      <div class="alert alert-success">
                        {{session('success')}}  
                      </div>
                    @endif
                  </div>
                  <form class="form_contant" action="{{ route('contact.add') }}" method="post">
                    @csrf
                    <fieldset>
                      <div class="row">
                        <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <input name="name" class="field_custom" placeholder="Your name" type="text" value="{{ old('name') ? old('name') : '' }}">
                        </div>
                        <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <input name="email" class="field_custom" placeholder="Email adress" type="email" value="{{ old('email') ? old('email') : '' }}">
                        </div>
                        <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <input name="phone" class="field_custom" placeholder="Phone number" type="text" value="{{ old('phone') ? old('phone') : '' }}">
                        </div>
                        <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <textarea name="message" class="field_custom" placeholder="Messager">{{ old('message') ? old('message') : '' }}</textarea>
                        </div>
                        <div class="center"><button class="btn main_bt" type="submit">SUBMIT NOW</button></div>
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- section -->

@endsection