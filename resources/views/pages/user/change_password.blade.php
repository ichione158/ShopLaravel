@extends('pages.index')

@section('content')

@include('pages.elements.page_banner')

<style>
  .centter{
      display: flex;
      justify-content: center;
  }

</style>

<div class="checkout_page">
    <div class="section padding_layout_1 checkout_section">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="checkout-form">
                <form action="{{ route('user.change_pass') }}" method="post" id="form_change_password">
                    @csrf
                    <fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>- {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">
                                {{session('success')}}  
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="form-field">
                                <label>Password Old <span class="red">*</span></label>
                                <input name="password_old" type="password" value="" required >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-field">
                                <label>Password<span class="red">*</span></label>
                                <input name="password" type="password" value="" required >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-field">
                                <label>Confirm Password<span class="red">*</span></label>
                                <input name="password_confirm" type="password" value="" required >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="centter">
                                <button class="bt_main order">Submit</button>
                            </div>
                        </div>
                    </div>
                    </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<!-- section -->
@endsection