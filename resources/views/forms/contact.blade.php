@extends('generic.nav')

@section('content')
<div style="height: 113px;"></div>
<div class="slide-one-item home-slider owl-carousel">


    <div class="site-blocks-cover" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" data-aos="fade">
                    <h1>Book Appointment</h1>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- success message --}}
<div class="col-sm-12">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>
<div class="site-section bg-light">
    <div class="container">
        {{-- error messages --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <div>
                @endif

                <div class="row">

                    <div class="col-md-12 col-lg-8 mb-5">

                        <form action="{{ route('book') }}" method="POST" class="p-5 bg-white">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Full Name</label>
                                    <input name="name" type="text" id="fullname" value="{{ old('name') }}"
                                           class="form-control" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="font-weight-bold" for="email">Email</label>
                                    <input name="email" type="email" id="email" value="{{ old('email') }}"
                                           class="form-control" placeholder="Email Address">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="phone">Phone</label>
                                    <input name="phone" type="text" value="{{ old('phone') }}" id="phone"
                                           class="form-control" placeholder="Phone #">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="phone">What do you want?</label>
                                    <select value="{{ old('interest') }}" type="text" id="interest" class="form-control"
                                            name="interest" placeholder="Interest">
                                        <option value="Pastor">Pastor</option>
                                        <option value="Counselor">Counselor</option>
                                        <option value="Book">Book</option>
                                        <option value="Bus">Bus</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="font-weight-bold" for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="5" class="form-control"
                                              placeholder="Provide more information">{{ old('message') }}</textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Send Message" class="btn btn-primary pill px-4 py-2">
                                </div>
                            </div>


                        </form>
                    </div>
                    @endsection
