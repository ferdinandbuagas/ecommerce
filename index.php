<?php include 'header.php'; ?>

  <div class="container">    
    <div class="row">

      <div class="col-xs-12 col-sm-6 col-md-2 lpaneborder">        
        <div id="lpane" class="tabbable">  
          <div id="left-menu" class="container">     
            <ul>
              <li class="active"><a href="#a" data-toggle="tab"><i class="fa fa-heart"></i>Health and Beauty</a></li>
              <li><a href="#b" data-toggle="tab"><i class="fa fa-female"></i>Fashion</a></li>
              <li><a href="#c" data-toggle="tab"><i class="fa fa-music"></i>Musical Instruments</a></li> 
              <li><a href="#d" data-toggle="tab"><i class="fa fa-rocket"></i>Toys & Kids</a></li>
              <li><a href="#e" data-toggle="tab"><i class="fa fa-television"></i>Electronics</a></li>
              <li><a href="#f" data-toggle="tab"><i class="fa fa-motorcycle"></i>Motorcycle</a></li> 
              <li><a href="#f" data-toggle="tab"><i class="fa fa fa-car"></i>Cars</a></li>                    
            </ul>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-7">    
        <div id="showcase-mpane">   

          <div id="slider-wrapper">
          <!-- Bootstrap Carousel : Start -->      
          <div id="myCarousel" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
              <li data-target="#myCarousel" data-slide-to="4"></li>
              <li data-target="#myCarousel" data-slide-to="5"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="max-height: 130px;">
              <div class="item active">
                <a href="http://www.facebook.com"><img src="app/img/clyde.jpg" alt="Chania"></a>
              </div>
              <div class="item">
                <a href="http://www.facebook.com"><img src="app/img/nikko.jpg" alt="Chania"></a>
              </div>
              <div class="item">
                <a href="http://www.facebook.com"><img src="app/img/cleo.jpg" alt="Flower"></a>
              </div>
              <div class="item">
                <a href="http://www.facebook.com"><img src="app/img/macan.jpg" alt="Flower"></a>
              </div>
              <div class="item">
                <a href="http://www.facebook.com"><img src="app/img/olib.jpg" alt="Flower"></a>
              </div>
              <div class="item">
                <a href="http://www.facebook.com"><img src="app/img/marde.jpg" alt="Flower"></a>
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span><i class="fa fa-long-arrow-left fa-2x"></i></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span><i class="fa fa-long-arrow-right fa-2x"></i></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <!-- Bootstrap Carousel : End --> 
          </div>

          <!-- Call showcase.php on this Area -->
          <?php 
            include 'showcase.php'; 
          ?>   

        </div>
      </div>  
      
      <div class="col-xs-12 col-sm-6 col-md-3">

        <div id="rpane">
          <a id="cart-style" href="cart.php"><i class="fa fa-shopping-cart fa-4x" ></i></a>  
          <h4 class="text-center">Cart Summary</h4>          
          <hr>

          <div class="cart-item">
            <h2>IPHONE4s</h2>
            <small>Price : &#x20b1; 20,000</small>  
          </div>
          
          <div class="cart-item">
            <h2>SAMSUNGS3</h2>
            <small>Price : &#x20b1; 16,000</small> 
          </div>

          <div class="cart-item">
            <h2>Lechon</h2>
            <small>Price : &#x20b1; 19,000</small> 
          </div>

          <hr> 
          <small>TOTAL</small>
          <p>&#x20b1; 54,000</p>
        </div>

        <div id="rpaneBox">
          <h5>Subscribe to get &#x20b1; 250 discount on every item.</h5>
          <div class="form-group">
            <input type="text" name="subscribe-email" id="subscribe-email" class="form-control input-sm" placeholder="Email Address" required>
            <div style="margin-top: 10px;">             
              <button type="submit" name="submit" value="Man" class="btn btn-info btn-block"><i class="fa fa-envelope"></i> Subscribe</button>               
            </div>
          </div>
        </div>

      </div>          

    </div>
  </div>

<script type="text/javascript">

  /*$("#left-menu li").hover(
    function () {
      $(this).addClass('active');
      $("#hovercontent div").addClass("active");    
    }, 
    function () {
      $(this).removeClass('active');
      $("#hovercontent div").removeClass("active");  

    }
  ); */

 /*jQuery(document).ready(function()
  {
    $('#left-menu a').hover(function() {
      $('#hovercontent').html($(this).text());
    }, function() {
      $('#hovercontent').html('');
    });
  })*/

    

</script>




<?php include 'footer.php'; ?>


     
     
          
 
        

        




