<?php require('header.php')?>

<!--whatsaap icon -->
    
<a href="https://api.whatsapp.com/send?phone=0336574321&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
		<i class="fa fa-whatsapp my-float"></i>
	</a>
<!--whatsaap icon -->



<!-- Slideshow container -->
<div class="slideshow-container">

   <!-- Full-width images with number and caption text -->
   <div class="mySlides">
	 <img src="img/slide1.jpeg" style="width:100%">
   </div>
 
   <div class="mySlides">
	 <img src="img/slide3.jpeg" style="width:100%">
   </div>
 
   <div class="mySlides">
	 <img src="img/slide2.jpeg" style="width:100%">
   </div>
 
   <!-- Next and previous buttons -->
   <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
   <a class="next" onclick="plusSlides(1)">&#10095;</a>
 </div>
 <br>
 
 <!-- The dots/circles -->
 <div style="text-align:center">
   <span class="dot" onclick="currentSlide(1)"></span>
   <span class="dot" onclick="currentSlide(2)"></span>
   <span class="dot" onclick="currentSlide(3)"></span>
 </div>
 <!--slides show end-->

  <!--product grid start-->

  <div class="product-list">
   <div class="container">
	   <div class= "heading"> <h1> New 
		<span style="color:rgb(237, 28, 36)">Arrivals</span> </h1> 
	   </div>
	   <div class="rowproduct">
		   <?php
		   		$get_product= get_product($con, 5);
				foreach($get_product as $list){
		    ?>
		   <!-- Item -->
		   <div class="item">
			   <div class="product">
				   <div class="product-thumb">
				   <a href="product.php?id=<?php echo $list['id']?>">
                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                    </a>

						<div class="product-button">
							<a href="#" title="Quick View">
								<i class="fa fa-eye"></i>
							</a>
							<a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')" title="Add To Cart">
								<i class="fa fa-shopping-cart"></i>
							</a>
							<a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')" title="Wishlist">
								<i class="fa fa-heart"></i>
							</a>
						</div>
				   </div>
				   <div class="product-info">
					   <h3 class="product-name"> <?php  echo $list ['name'] ?> </h3>
					   <p class="product-cat"><?php  echo $list ['mrp'] ?></p>
					   <p class="product-price"><?php  echo $list ['price'] ?></p>
				   </div>
			   </div>
		   </div>
		   <!-- Item End -->
		   <?php } ?>
		   
		</div>
		
   </div>
</div>

<!--product grid end-->

<!-- section starts-->

<div class="gallery">
	<div class="gallery__column">
		<a href="categories.php?id=6" class="gallery__link">
			<figure class="gallery__thumb">
				<img src="img/eye.jpg" alt="Portrait by Jessica Felicio" class="gallery__image">
				<figcaption class="gallery__caption">Eyes</figcaption>
			</figure>
		</a>
		<a href="categories.php?id=9" class="gallery__link">
			<figure class="gallery__thumb">
				<img src="img/lips.jpg" alt="Portrait by Alex Perez" class="gallery__image">
				<figcaption class="gallery__caption">Lips</figcaption>
			</figure>
		</a>
	</div>
	<div class="gallery__column">
		<a href="categories.php?id=4" class="gallery__link">
			<figure class="gallery__thumb">
				<img src="img/hair.jpg" alt="Portrait by Noah Buscher" class="gallery__image">
				<figcaption class="gallery__caption">Hair</figcaption>
			</figure>
		</a>

		<a href="categories.php?id=8" class="gallery__link">
			<figure class="gallery__thumb">
				<img src="img/nails.jpg" alt="Portrait by Ivana Cajina" class="gallery__image">
				<figcaption class="gallery__caption">Nails</figcaption>
			</figure>
		</a>

	</div>

	<div class="gallery__column">
		

		<a href="categories.php?id=1" class="gallery__link">
			<figure class="gallery__thumb">
				<img src="img/face.jpg" alt="Portrait by Ethan Haddox" class="gallery__image">
				<figcaption class="gallery__caption">Makeup</figcaption>
			</figure>
		</a>

		<a href="categories.php?id=7" class="gallery__link">
			<figure class="gallery__thumb">
				<img src="img/perfume.jpg" alt="Portrait by Amir Geshani" class="gallery__image">
				<figcaption class="gallery__caption">Perfumes</figcaption>
			</figure>
		</a>
	</div>

</div>

<!-- section ends-->

<!--product grid start-->

<div class="product-list">
	<div class="container">
		<div class= "heading"> <h1> Trending
		 <span style="color:rgb(237, 28, 36)">Now</span> </h1> </div>
		<div class="rowproduct">
		<?php
		   		$get_product= get_product($con, 5,'','','','','yes');
				foreach($get_product as $list){
		    ?>
		   <!-- Item -->
		   <div class="item">
			   <div class="product">
				   <div class="product-thumb">
				   <a href="product.php?id=<?php echo $list['id']?>">
                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                    </a>

						<div class="product-button">
							<a href="#" title="Quick View">
								<i class="fa fa-eye"></i>
							</a>
							<a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')" title="Add To Cart">
								<i class="fa fa-shopping-cart"></i>
							</a>
							<a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')" title="Wishlist">
								<i class="fa fa-heart"></i>
							</a>
						</div>
				   </div>
				   <div class="product-info">
					   <h3 class="product-name"> <?php  echo $list ['name'] ?> </h3>
					   <p class="product-cat"><?php  echo $list ['mrp'] ?></p>
					   <p class="product-price"><?php  echo $list ['price'] ?></p>
				   </div>
			   </div>
		   </div>
		   <!-- Item End -->
		   <?php } ?>
		</div>
	</div>
 </div>
 
 <!--product grid end-->


 <div class="advertisement">
	<div class="advertise__column">
		<div class="advertise__image">
			<img src="img/banner_2_1_1024x1024_crop_center.png"/>
		</div>
	</div>

	<div class="advertise__column">
		<div class="advertise__image">
			<img src="img/banner_1_1_1024x1024_crop_center.png"/>
		</div>
	</div>

 </div>
  

 <!-- blog start-->

 <section>
    <div class="container">
		<div class= "heading"> <h1> Latest
			<span style="color:rgb(237, 28, 36)">Blogs</span> </h1> 
		</div>
      <main class=".main">
        <div class="singleBlog">
          <img src="img/Makeup_370x510_44f92034-2da7-4439-a401-c137e72f8f8a_600x_crop_center.jpg" alt="">
          <div class="blogContent">
            <h3>How To Stop Your Makeup Running This Summer<span>Makeup</span></h3>
            <br>
            <a href="blog3.php" class="btn">Read More</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="img/valerie-elash-RfoISVdKM4U-unsplash.jpg" alt="">
          <div class="blogContent">
            <h3> 5 Common Hairstyling Mistakes <span>Hair</span></h3>
           <br>
            <a href="blog2.php" class="btn">Read More</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="img/BIL-Startseite-Mobile_Portrait_Skincare.jpg" alt="">
          <div class="blogContent">
            <h3> 5 Things You Should Never Do To Your Skin <span>Skincare</span></h3>
            <br>
            <a href="blog1.php" class="btn">Read More</a>
          </div>
        </div>
      </main>
    </div>
  </section>

  <?php require('footer.php')?>