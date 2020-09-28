<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                 <center><h2>Vue Laravel Bootstrap Owl Carousel Working Example:</h2></center>  
         <div id="demo" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://responsivedesign.is/wp-content/uploads/2016/11/Owl-Carousel-2_ri92wj.jpg" alt="Los Angeles" style="width:100%;">
            </div>

            <div class="carousel-item">
            <img src="https://responsivedesign.is/wp-content/uploads/2016/11/Owl-Carousel-2_ri92wj.jpg" alt="Chicago" style="width:100%;">
            </div>
          
            <div class="carousel-item">
            <img src="https://responsivedesign.is/wp-content/uploads/2016/11/Owl-Carousel-2_ri92wj.jpg" alt="New york" style="width:100%;">
            </div>
          </div>

          <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            </a>
          </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>