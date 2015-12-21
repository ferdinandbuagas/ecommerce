<?php
require 'admin-functions.php';
include dirname(__FILE__) . '/../header.php';
?>
<?php if (isset($username)): ?>
<div id="admin" class="container">
  <div class="row">
    <h3>Welcome <?= ucfirst($username); ?></h3>
    <ul class="nav nav-tabs" style="display: block;">
      <li class="active"><a data-toggle="tab" href="#home">Dashboard</a></li>
      <li><a data-toggle="tab" href="#menu1">Settings</a></li>
      <li><a data-toggle="tab" href="#menu2">Item</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">        
        <div class="inner-tab">
          <div class="row">    
            <div class="col-md-12"><h3 style="margin-left: 15px;">Dashboard</h3> 
              <div class="col-xs-12 col-sm-2 col-md-2">
                <!-- tabs left -->
                <div class="tabbable tabs-left">
                  <ul class="nav nav-tabs col-xs-12" style="margin-bottom: 20px; border: none;">
                    <li class="active"><a href="#a" data-toggle="tab">Upload</a></li>
                    <li><a href="#b" data-toggle="tab">Two</a></li>
                    <li><a href="#c" data-toggle="tab">Twee</a></li>
                  </ul>
                </div>
                <!-- /tabs --> 
              </div>
              <div class="col-xs-12 col-sm-10 col-md-10">      
                <div class="tab-content">
                  <div class="tab-pane active" id="a"> 



                    <div id="guillotine">
                      <div class="col-xs-12 col-sm-6 col-md-6">                        
                        <form action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8"> 
                          <div class='frame'>
                              <img id='item_image_crop' src="<?php echo $res->getUploadedItem(); ?>" alt=""></a>
                          </div>

                          <div class="col-md-10 col-md-offset-1">
                            <div id='controls'>
                              <button id='rotate_left'  type='button' title='Rotate left' class='btn btn-info btn-xs'> &lt; </button>
                              <button id='zoom_out'     type='button' title='Zoom out' class='btn btn-primary btn-info btn-xs'> - </button>
                              <button id='fit'          type='button' title='Fit image' class='btn btn-primary btn-info btn-xs'> [ ]  </button>
                              <button id='zoom_in'      type='button' title='Zoom in' class='btn btn-primary btn-info btn-xs'> + </button>
                              <button id='rotate_right' type='button' title='Rotate right' class='btn btn-primary btn-info btn-xs'> &gt; </button>
                            </div>
                          </div>

                          <div class="col-md-10 col-md-offset-1">
                            <ul id='data'>
                              <div class='column'>
                                <li class="x1">x: <span id='x'></span></li>
                                <li class="y1">y: <span id='y'></span></li>
                              </div>
                              <div class='column'>
                                <li class="width1">width:  <span id='w'></span></li>
                                <li class="height1">height: <span id='h'></span></li>
                              </div>
                              <div class='column'>
                                <li class="scale1">scale: <span id='scale'></span></li>
                                <li class="angle1">angle: <span id='angle'></span></li>
                              </div>
                            </ul>
                          </div>  

                          <!-- get values of image -->
                          <input type="hidden" id="x1" name="x1" >
                          <input type="hidden" id="y1" name="y1" >                         
                          <input type="hidden" id="width1" name="width1" > 
                          <input type="hidden" id="height1" name="height1" > 
                          <input type="hidden" id="scale1" name="scale1" > 
                          <input type="hidden" id="angle1" name="angle1" > 

                          <div class="col-md-4 col-md-offset-4">
                              <input type="submit" onclick="getImageDimension()" name="item_save_thumb" id="item_save_thumb" value="Set Image" class="btn btn-info btn-block"> 
                          </div>                                
                        </form>                        
                      </div>

                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <p>hey</p>

                        

                        
                        
                      </div>
                    </div>

                      


                    <script src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
                    <script src='../app/packages/guillotine/js/jquery.guillotine.js'></script>

                    <script type='text/javascript'>


                     jQuery(function() {
                        var picture = $('#item_image_crop');

                        // Make sure the image is completely loaded before calling the plugin
                        picture.one('load', function(){
                          // Initialize plugin (with custom event)
                          picture.guillotine({eventOnChange: 'guillotinechange'});

                          // Display inital data
                          var data = picture.guillotine('getData');
                          for(var key in data) { $('#'+key).html(data[key]); }

                          // Bind button actions
                          $('#rotate_left').click(function(){ picture.guillotine('rotateLeft'); });
                          $('#rotate_right').click(function(){ picture.guillotine('rotateRight'); });
                          $('#fit').click(function(){ picture.guillotine('fit'); });
                          $('#zoom_in').click(function(){ picture.guillotine('zoomIn'); });
                          $('#zoom_out').click(function(){ picture.guillotine('zoomOut'); });

                          // Update data on change
                          picture.on('guillotinechange', function(ev, data, action) {
                            data.scale = parseFloat(data.scale.toFixed(4));
                            for(var k in data) { $('#'+k).html(data[k]); }                         
                           


                          });
                        });

                        // Make sure the 'load' event is triggered at least once (for cached images)
                        if (picture.prop('complete')) picture.trigger('load')
                      });                         
                      
                      function getImageDimension() {
             
                         $("#x1").val($("#data .x1 span").text());
                         $("#y1").val($("#data .y1 span").text());
                         $("#width1").val($("#data .width1 span").text());
                         $("#height1").val($("#data .height1 span").text());
                         $("#scale1").val($("#data .scale1 span").text());
                         $("#angle1").val($("#data .angle1 span").text());
                      }
                        
                   

                      /*picture.on('guillotinechange', function(ev, data, action) {
                        data.scale = parseFloat(data.scale.toFixed(4));
                        for(var k in data) { $('#'+k).html(data[k]); }
                          $('#x').val(data.x);
                          $('#y').val(data.y);
                          $('#w').val(data.w);
                          $('#h').val(data.h);
                          $('#scale').val(data.scale);
                          $('#angle').val(data.angle);
                      });*/

                    </script> 




<!-- http://stackoverflow.com/questions/31812176/getting-data-from-jquery-guillotine-plugin?rq=1 -->
<!-- http://php.net/manual/en/function.imagejpeg.php -->
<!-- http://php.net/manual/en/function.imagecopyresampled.php nice quality--> 
<!-- http://php.net/manual/en/function.imagejpeg.php -->


<!-- http://stackoverflow.com/questions/13596794/resize-images-with-php-support-png-jpg -->

                   




















                  </div>
                  <div class="tab-pane" id="b">
                    Secondo sed ac orci quis tortor imperdiet venenatis. 
                  </div>
                  <div class="tab-pane" id="c">
                    Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit.
                  </div>
                </div>
              </div>             
            </div>
          </div>      
        </div>
        <h3>info 1</h3>
        <p>info additional 1</p>
      </div>

      <div id="menu1" class="tab-pane fade">
        <div class="inner-tab">
          <div class="row">    
            <div class="col-md-12"><h3 style="margin-left: 15px;">Settings</h3> 
              <div class="col-xs-12 col-sm-2 col-md-2">
                <!-- tabs left -->
                <div class="tabbable tabs-left">
                  <ul class="nav nav-tabs col-xs-12" style="margin-bottom: 20px; border: none;">
                    <li class="active"><a href="#e" data-toggle="tab">One</a></li>
                    <li><a href="#f" data-toggle="tab">Two</a></li>
                    <li><a href="#g" data-toggle="tab">Twee</a></li>
                  </ul>
                </div>
                <!-- /tabs -->
              </div>
              <div class="col-xs-12 col-sm-10 col-md-10">
                <div class="tab-content">
                  <div class="tab-pane active" id="e">
                    Lorem ipsum dolor sit amet, charetra varius quam sit amet vulputate.                 
                  </div>
                  <div class="tab-pane" id="f">
                    Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.           
                  </div>
                  <div class="tab-pane" id="g">
                    Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit.        
                  </div>
                </div>
              </div>              
            </div>
          </div>
        </div>
        <h3>info 2</h3>
        <p>info additional 2</p>
      </div>

      <div id="menu2" class="tab-pane fade">
        <div class="inner-tab">
          <div class="row">    
            <div class="col-md-12"><h3 style="margin-left: 15px;">Item</h3>
              <div class="col-xs-12 col-sm-2 col-md-2">
                <!-- tabs left -->
                <div class="tabbable tabs-left">                  
                  <ul class="nav nav-tabs col-xs-12" style="margin-bottom: 20px; border: none;">                         
                    <li class="active"><a href="#h" data-toggle="tab">Tab One</a></li>
                    <li><a href="#i" data-toggle="tab">Tab Two</a></li>
                    <li><a href="#j" data-toggle="tab">Upload</a></li>                        
                  </ul>               
                </div>
                <!-- /tabs -->                         
              </div>
              <div class="col-xs-12 col-sm-10 col-md-10">
                <div class="tab-content">
                  <div class="tab-pane active" id="h">
                    Lorem ipsum dolor sit amet, charetra varius quam sit amet vulputate.                
                  </div>
                  <div class="tab-pane" id="i">
                    Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.                    
                  </div>
                  <div class="tab-pane" id="j"> 









                                                                                        
                    <form action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                      <label for="fileToUpload">Upload Image</label>                                 
                      <input class="" type="file" name="fileToUpload" id="fileToUpload" required>                            
                        <hr>
                        <div class="form-group">                                     
                          <label class="sr-only" for="item-name">Item Name</label>
                          <input type="text" class="form-control" id="item-name" name="item-name" placeholder="Item Name" autofocus="autofocus" required>
                        </div>

                        <!-- Get Database Categories -->
                        <div class="form-group">                      
                          <select name="item-category"  class="form-control" id="item-category">
                            <option selected="true" disabled="disabled">Select category</option>
                            <?php                              
                              if ($res->getCategory()->num_rows > 0) {     
                              foreach ($res->getCategory() as $value) {
                                $get_category = $value['item_category'];                              
                            ?>
                            <option><?php echo $get_category; ?></option>                           
                            <?php } } ?>
                          </select>
                        </div> 

                        <div class="form-group">                                     
                          <textarea name="item-desc" class="form-control" rows="5" id="item-desc" placeholder="Say something about your item..." required></textarea>
                        </div>
                        
                        <div class="form-group">                                     
                           <label class="sr-only" for="item-price">Price</label>
                           <input type="number" class="form-control" id="item-price" name="item-price" placeholder="Price" autofocus="autofocus" required>
                        </div>                                 
                           
                        <div class="form-group">                                     
                           <label class="sr-only" for="item-quantity">Quantity</label>
                           <input type="number" class="form-control" id="item-quantity" name="item-quantity" placeholder="Quantity" autofocus="autofocus" required>
                        </div>                                        

                        <div class="form-group">                                     
                           <div class="checkbox">
                            <?php 
                              if (!isset($is_active)) {
                                $is_active = "checked";
                              }else{
                                $is_active = "";
                              }       
                            ?>
                            <label><input name="get-status" type="checkbox" value="" <?php echo $is_active; ?>>Active</label>
                          </div>  
                        </div>
                        <div class="col-md-6 col-md-offset-3">
                          <input type="submit" name="item-upload" id="item-upload" value="Post" class="btn btn-info btn-block"> 
                        </div>
                      </div> 
                    </form>
                  </div>                      
                </div>             
              </div>                          
            </div>
          </div>
          <h3>info 3</h3>
          <p>info 3 additional</p> 
        </div>        
      </div>
    </div>
  </div>
</div>
<?php else: ?>
<div class="container">
  <div class="row">       
    <div class="col-md-4 col-md-offset-4">                     
          
      <div class="form-group">  
          <h3 style="text-align: center; margin-bottom: 50px;">Please login to view admin page</h3>  
          <a href="<?php $host; ?>/login.php" type="submit" name="registerForm" value="Login" class="btn btn-info btn-block">Login</a>          
          <p class="text-center" style="padding-top:10px"><a href="<?php $host; ?>/register.php">Create Account</a></p>          
      </div>        

    </div>
  </div>
</div>
<?php endif ?>
<?php include '../footer.php'; ?>