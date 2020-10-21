@extends('generic.nav')

@section('content')
<div style="height: 113px;"></div>
<div class="slide-one-item home-slider owl-carousel">



  <div class="site-blocks-cover" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade">
          <h1>Send Message</h1>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="site-section bg-light">
  <div class="container">
    <div class="row">

      <div class=" col-lg-8 mb-5">



        <form action="{{ route('read') }}" method="POST" enctype="multipart/form-data" class="p-5 bg-white">
            @csrf
              <input type="file" name="file" class="form-control">
              <br>

          <div class="row form-group">
            <div class="col-md-12">
              <label class="font-weight-bold" for="message">Message</label>
              <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Add Message to send"></textarea>
              <p id="message_character"></p>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Send Message" class="btn btn-primary pill px-4 py-2">
            </div>
          </div>


        </form>
      </div>
      <script>
        document.addEventListener('DOMContentLoaded', function () {

      $('#message').keyup(function(){
        var words = $.trim($("textarea").val()).split("");
        var message = words.length +" characters, "+((Math.floor(words.length/160))+1) +" message(s)";
        $('#message_character').html(message);
      })
});
      </script>
      @endsection

