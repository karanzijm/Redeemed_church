<style>
    .kvendor_add_items table tr td .form-control{border:0px  !important; border-bottom: 1px solid #ccc !important;  border-radius: 0px; outline: none !important;}

    .preview_img{
        display: none;
    }
    .ss {
        display: block;
    }

    .selection {
        display: none;
    }
</style>
<?php 
      $user_role = $this->session->user['role']; 
      $email = $this->session->user['email'];
      
      ?>
<script>
$(function(){
    var role = <?php echo json_encode($user_role); ?>;
    var email = <?php echo json_encode($email); ?>;
    if(role == 'rental_and_sales' || email =='saccount@pangisa.co.ug'){
        $('.selection').show();
        $('.item_form').hide();

    }
    if(role == 'shop_user'){
        $('.selection').hide();
        $('.item_form').hide();
        $('.clientregistration').show();
    }
});
</script>
<div id="selection" class="selection container-fluid display_order_details">
        <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" value="shop" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample">
        <label class="custom-control-label" for="defaultInline1">Add Shop Item</label>
        </div>

        <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" value="rental" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
        <label class="custom-control-label" for="defaultInline2">Add Rental Item</label>
        </div>

</div>
<div class="container-fluid display_order_details item_form">
    <div class="row">
        <div class="col-sm-12">
            <h1>Add New Item</h1><br>
            <div class="table-responsive">
                <form action='<?=base_url()?>AppClient/addItems/save' method='post' enctype='multipart/form-data' class="vendor_add_items">

                <div class="row">                    
                    <div class="col-md-6">

                    <label>Item Name</label>
                    <input  class="form-control" name="name"/>

                    </div>
                    <div class="col-md-6">

                        <label>Identification Number</label>
                        <input type="text" class="form-control" name="identification_number"/>

                    </div>
                    <div class="col-md-6">
                        <label >Item Category</label>
                        <?php $categories= $this->db->where('rental_or_shop','rental')->get("categories")->result_array();?>
                                <select class="form-control categories" name="category" required>
                                    <option value="">Please Choose Category</option>
                                    <?php
                                        foreach ( $categories as $cat){
                                            echo "<option class='list-group-item' value='".$cat['id']."'>".$cat['name']."</option>";
                                        }
                                    ?>
                                </select>
                    </div>
                    <div class="col-md-6">
                        <label >Item Sub Category</label>
                        <section class="sub_categories"   name="sub_category"></section>
                    </div>
         
                    <div class="col-md-6">
                        <label>Color</label>
                        <input class="form-control" name="color"/>
                    </div>
                    <div class="col-md-6">
                        <label >Size</label>
                        <input type="text" class="form-control" name="size"/>
                    </div>
                    <div class="col-md-6">
                        <label >Price</label>
                        <input type="number"  class="form-control price" name="price"/><small></small>
                    </div>
                    <div class="col-md-6">
                        <label>Pick Up Location</label>
                        <input id="location" type="text" class="form-control" name="pick_up_location"/>
                    </div>
                    <div class="col-md-6">
                        <label>Description</label>
                        <textarea  class="form-control" name="brief_description"></textarea><br><small>Good Description, Easy sales </small>
                    </div>
                    <div class="col-md-6">
                        <label>Features</label>
                        <textarea class="form-control" name="features"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label >Year of make</label>
                        <input type="number" name="year_of_make" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label >Choose Pricing Point</label>
                        <?php $categories = $this->db->order_by('id', 'asc')->get("price_points")->result_array(); ?>
                                <select class="form-control" name="price_point" required>
                                    <?php
                                    $i = 0;
                                    $selected = null;
                                    foreach ($categories as $cat) {
                                        if ($i == 0) {
                                            $selected = "selected='selected'";
                                        }

                                        echo "<option class='list-group-item' " . $selected . " value='" . $cat['id'] . "'>" . $cat['name'] . "</option>";
                                    }
                                    $i++;
                                    ?>
                                </select>
                    </div>
               
                    <div class="col-md-6">
                        <label>Front View</label>
                        <input type="file" name="front_view" class="form-control-file" accept='image/png, image/jpeg,image/jpg' id="front_view" onchange="frontView(event)" required/>
                        <div >
                            <img class="img img-fluid img-thumbnail preview_img" src="" id="front_preview">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Rear View</label>
                        <input type="file" name="side_view" class="form-control-file" accept='image/png, image/jpeg,image/jpg' id="side_view" onchange="sideView(event)"/>
                        <div >
                            <img class="img img-fluid img-thumbnail preview_img" src="" id="side_preview">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Side View</label>
                        <input type="file" name="rear_view" class="form-control-file" accept='image/png, image/jpeg,image/jpg' id="rear_view" onchange="rearView(event)"/>
                        <div >
                            <img class="img img-fluid img-thumbnail preview_img" src="" id="rear_preview">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label >Is Item Negotiable?</label>
                        <select name="is_negotiable" required class="form-control">
                                    <option value="False" selected>Not Negotiable</option>
                                    <option value="True">Negotiable Price</option>
                                </select>
                    </div>
                    <?php
                        if ($this->session->user['email'] == "saccount@pangisa.co.ug") {
                            ?>
                    <div class="col-md-6">
                        <label>Vendor Name</label>
                        <input type="text" name="vendor_name" class="form-control" required/>
                    </div>
                    <div class="col-md-6">
                        <label >Phone Number</label>
                        <input type="number" name="vendor_phone_number" class="form-control" required/>
                    </div>

                    <?php
                        }
                        ?>
                    <div class="col-md-4">
                    <input type="submit" class="btn  btn-success" value="Add Item"/>
                    </div>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--shop items-->
<div class="container-fluid clientregistration" style="max-width: 100vw; padding: 30px; display:none">
    <div class="row">
        <h1>Add Shop Item</h1>
    </div>
    <div class="row">
        <form method="post" action="<?=base_url()?>AppClient/add_shop_item/save" enctype='multipart/form-data'>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="email">Item Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">Please enter item name here.</small>
                    </div>
                </div>


                <?php
                if ($this->session->user['email'] == "saccount@pangisa.co.ug") {
                    $email = $this->session->user['email'];
                    ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Vendor</label>
                            <select name="added_by" id="vendor" data-live-search="true" class="form-control input-lg" title="Select Vendor"></select>
                        </div>
                    </div>

                    <?php
                }
                ?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="category">Item Category</label>
                        <?php $categories= $this->db->get("shop_categories")->result_array();?>
                        <select class="form-control shop_categories" name="category" required>
                            <option value="">Please Choose Category</option>
                            <?php
                            foreach ( $categories as $cat){
                                echo "<option class='list-group-item' value='".$cat['id']."'>".$cat['name']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <label >Item Sub Category</label>
                    <section class="sub_categories"   name="sub_category"></section>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="email">Description</label>
                        <textarea type="text" class="form-control" name="brief_description" aria-describedby="emailHelp" required></textarea>
                        <small id="emailHelp" class="form-text text-muted">Item Description</small>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">Price</label>
                        <input type="number" value="1" min="0" class="form-control" name="price" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">Item Price</small>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">Quantity</label>
                        <input type="number" value="1" min="0" class="form-control" name="quantity" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">Item quantity in stock</small>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">Minimum Order Quantity</label>
                        <input type="number" value="1" min="1" class="form-control" name="minimum_order_quantity" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">least quantity per order</small>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">Delivery</label>
                        <select name="accepts_delivery" class="form-control" required>
                            <option value=''>Does this item accept Deliveries to client premises</option>
                            <option value='1'>Yes</option>
                            <option value='0'>No</option>

                        </select>
                        <small id="emailHelp" class="form-text text-muted">please specify if this item can be delivered on not</small>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">Delivery fees</label>
                        <input type="number" class="form-control"  value="0" name="delivery_fees" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">Amount charged for Delivery.</small>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">Discount</label>
                        <input type="number" class="form-control" value="0" name="discount" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">Enter discount in percentage i.e. 10% would be 10.</small>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">Front view</label>
                        <input type="file" class="form-control" name="front_view" aria-describedby="emailHelp" accept='image/png, image/jpeg,image/jpg' required>
                        <small id="emailHelp" class="form-text text-muted">Front View of Item.</small>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">Rear view</label>
                        <input type="file" class="form-control" name="rear_view" aria-describedby="emailHelp" accept='image/png, image/jpeg,image/jpg' >
                        <small id="emailHelp" class="form-text text-muted">Rear View of Item.</small>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">Side view</label>
                        <input type="file" class="form-control" name="side_view" aria-describedby="emailHelp" accept='image/png, image/jpeg,image/jpg'>
                        <small id="emailHelp" class="form-text text-muted">side View of Item.</small>
                    </div>
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-success" id="submit" value="Save Item"/>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="map"></div>

<script>
  $(document).ready(function() {

      $('.custom-control-input').change(function(){
          if($(this).val() == 'rental'){
              $('.item_form').show();
              $('.selection').hide();
          }else{
              $('.selection').hide();
              $('.item_form').hide();
              $('.clientregistration').show();
              //window.location.href = "<?//=base_url()?>//AppClient/add_shop_item"
          }
      });

      var email = <?php echo json_encode($email); ?>;
      if(email=='saccount@pangisa.co.ug'){
          $("#vendor").selectpicker();
          $.ajax({
              url:"<?=base_url()?>AppClient/getVendors/shop_user",
              method:"POST",
              success: function (data) {
                  console.log(data)
                  var html='';
                  $.each(JSON.parse(data),function(index, value){
                      console.log(value.id);
                      html += '<option value="'+value.id+'">'+value.name+'</option>';
                  });
                  console.log(html);
                  $('#vendor').html(html);
                  $('#vendor').selectpicker('refresh');
              }
          });
      }
      $(".shop_categories").change(function () {
          $.ajax(
              {
                  url:"<?=base_url()?>AppClient/AjaxRetrieveShopSubCategories/",
                  data:{"category":$(this).val()},
                  method:"POST",
                  success:function (response) {
                      $(".sub_categories").html(response)
                  },
                  error:function (error) {
                      console.log(error)
                  }
              }
          )
      });

    $(".categories").change(function () {
        $.ajax(
            {
                url:"<?=base_url()?>AppClient/AjaxRetrieveSubCategories/",
                data:{"category":$(this).val()},
                method:"POST",
                success:function (response) {
                    $(".sub_categories").html(response)
                },
                error:function (error) {
                }
            }
            )
    });

    $(".price").keyup(function () {
        var price = $(this).val();
        var result = (price - Math.floor(price)) !== 0;
        if(result){
            $(this).parent().children("small").html("Please enter a whole Number");
            return;
        }
        else{
            $(this).parent().children("small").html("Remember, On top of this price, Pangisa shall add a a 10% margin");
        }


    });

    function frontView(event){
        loadImg("front_preview", event);
        console.log("Front");
    }

    function sideView(event){
        loadImg("side_preview", event);
        console.log("Side");
    }

    function rearView(event){
        loadImg("rear_preview", event);
        console.log("Rear");
    }

    function loadImg(preview_id, event){
        console.log(preview_id);
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById(preview_id);
            output.style.display = "block";
            output.src = reader.result;
            console.log(reader.result);
        }
         reader.readAsDataURL(event.target.files[0]);
    }


  });
   
</script>

<script>
    var map, places;
    var geocoder ;
    var myLatlng = {lat: 0.3302424742036756, lng: 32.5741383433342};
    var origin=null,destination=null,counter=0;
    var distance_api, place_name='';
    var origin_name, destination_name;
    var start = document.getElementById("location");
    var autocomplete;
    var directionsDisplay;
    var directionsService;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {center: myLatlng,zoom: 15});
        places = new google.maps.places.PlacesService(map);

        var options = {
            types: ['geocode'],
            componentRestrictions: {country: 'ug'}
        };

        autocomplete = new google.maps.places.Autocomplete(start, options);
        autocomplete.addListener('location', placeOfUseChanged);

        geocoder =  new google.maps.Geocoder();

        directionsService = new google.maps.DirectionsService
        directionsDisplay = new google.maps.DirectionsRenderer;
        directionsDisplay.setMap(map);

        //when the user fills in the destination
        function placeOfUseChanged() {
            var place = autocomplete.getPlace();
            var location_address=place['geometry']['location'];
            console.log(location_address);
            destination=location_address;

            var address_name='',infowindow=null, content=null;

            resolveAddress(destination,
                function(result) {
                    address_name = result;
                    destination_name = address_name;

                    content = "<div><b>END POINT</b><br>" + destination_name + "</div>";
                    infowindow = new google.maps.InfoWindow({
                        content: content
                    });

                    placeMarkerAndPanTo(location_address, map, address_name, infowindow);
                    calculateAndDisplayRoute(directionsService,directionsDisplay);
                });


            if (place.geometry) {
                map.panTo(place.geometry.location);
                map.setZoom(15);
                // search();
            } else {
                document.getElementById('end_point').placeholder = 'Enter a city';
            }
        }


        function resolveAddress(cordinates, callback){
            var address=null;
            cordinates=JSON.stringify(cordinates)

            var _c=JSON.parse(cordinates);
            var lat=_c['lat'];
            var long=_c['lng'];

            var latlng = {lat: parseFloat(lat), lng: parseFloat(long)};

            address=geocoder.geocode({
                'location': latlng
            }, function(results, status) {
                if (status == "OK") {

                    if (results[1]) {
                        address=results[1].formatted_address;
                        var result=address?address:"ORIGIN";
                        if(callback) callback(result);
                    }
                }else{
                    window.alert('Geocoder failed due to: ' + status);
                    return null;
                }
            });
        }


    }


    $(".get_distance").click(function(){
        if(!origin || !destination){
            alert("Please you must choose at least two places to proceed or fill in the form.")
            return;
        }

        var _weight;
        if(weight==0){
            _weight=window.prompt("Please enter your weight in kilogrames.")
        }else{
            _weight=weight;
        }


        distance_api="https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins="+origin_name+"&destinations="+destination_name+"&key=AIzaSyBGesnwYfnWy-NRpA9w_rfdwCpTIDhkcD8";
        var local_url="<?=base_url()?>//CityRider/get_distance_matrix"

       $.ajax(
           {
               type:'GET',
               headers:{'Access-Control-Allow-Origin': '*'},
               url:local_url,
               data:{url:distance_api},
               success:function (response) {
                   response=JSON.parse(response);

                   var resp=response['rows'];
                   var elements=resp[0]['elements']

                   var result_status=elements[0]['status']

                   if(result_status!='OK'){
                       alert("No results were found for your particular search");
                       return;
                   }

                   var distance=elements[0]['distance']
                   var duration=elements[0]['duration']


                   distance=distance['text'];
                   duration=duration['text'];

                   var actual_distance=elements[0]['distance']['value']/1000;
                   var price=3500;
                   var total_cost=actual_distance*price;
                   total_cost/=_weight;
                   total_cost=Math.round(total_cost)
                   total_cost=total_cost.toLocaleString();


                   $(".response").html("<b>Distance</b> "+distance+"<br><b>Duration</b> "+duration+"<br><b>Total cost </b>= UGX "+total_cost);
                   $(".accept").show();

               },
               error:function (err) {
                   console.log(JSON.stringify(err))
               }
           }
       );


   });

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc9-9hel654Hie8JwGJB69hu_WxFTawIQ&callback=initMap&libraries=places" async defer></script>



