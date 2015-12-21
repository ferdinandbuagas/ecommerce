<div class="" style="margin-top: 20px;">            
  <div class="tab-content" id="showcase"> 
        <div class="tab-pane active " id="a">
          <hr>
          <h4><a href="<?php $host; ?>/health-and-beauty.php" style="margin-left: 15px;">Health and Beauty</a></h4>                 
          <div class="row scrollbar">
            <div class="force-overflow">
              
              <?php 
                $result = $res->getItem();                                      
                foreach ($result as $value){ 
                    $get_LargeItemPath =  $value['item_large_image_path'];                             
              ?> 
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="wrapper grow">
                    <div class="image">
                      <a href="#"><img src="<?php echo $get_LargeItemPath; ?>" alt=""></a>
                    </div>
                    <small>Your item information here</small>
                    <hr>
                    <small><a href="#"><i class="fa fa-shopping-cart fa-lg"> <small>Add To Cart</small></i></a></small>
                  </div>                
                </div>
              <?php } ?>

            </div>
          </div>          
        </div>
        <div class="tab-pane" id="b">
          <p>22222222222222 wooooooLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>          
        </div>
        <div class="tab-pane" id="c">
          <p>33333333333333 wooooooLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>          
        </div>
        <div class="tab-pane" id="d">
          <p>44444444444444 wooooooLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>          
        </div>
        <div class="tab-pane" id="e">
          <p>55555555555555 wooooooLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>          
        </div>
        <div class="tab-pane" id="f">
          <p>66666666666666 wooooooLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>          
        </div>
  </div> 
</div>

