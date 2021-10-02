<?php
require("header.php");			
?>
  <!-- Start Contact Area -->
  <section class="contact">
        <div class="content">
            <h2 >Contact Us</h2>
            <p>
            Makeup city is for girls and women who love dolling up and taking care of their beauty. Our website is the best place to find what is new and what is coming next. Contact us if you have any queries.</p>
        </div>
        <div class="container-contact">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>Block 2 PECHS, Karachi, Karachi City</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>(021)-3-468-0215
                          0348-111-2(J4G)544 </p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>contact @makeupcityshop.com</p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>
        
                <form  action="#" method="post">
                  <h3 class="title">SEND A MAIL</h3>
                  <div class="input-container">
                    <input type="text" id="name" name="name" class="input" />
                    <label for="">Name</label>
                    <span>Name</span>
                  </div>
                  <div class="input-container">
                    <input type="email" id="email" name="email" class="input" />
                    <label for="">Email</label>
                    <span>Email</span>
                  </div>
                  <div class="input-container">
                    <input type="tel" id="mobile" name="mobile" class="input" />
                    <label for="">Mobile</label>
                    <span>Mobile</span>
                  </div>
                  <div class="input-container textarea">
                    <textarea id="message" name="message" class="input"></textarea>
                    <label for="">Message</label>
                    <span>Message</span>
                  </div>
                  <button type="button" onclick="send_message()" class="btn" >Send Message</button>
                </form>
              </div>
        </div>
    
    </section>
            
  <!-- End Contact Area -->
<?php
require("footer.php");
?>