<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Castro Foods and Restaurant</title>
    <link rel="stylesheet" href="CSS/homepage.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
        <!--Navigation Menu-->
        <nav>      
            <ul> 
                <li><a href="homepage.php" class="active">Home</a></li>
                <li><a href="#services">About </a></li>
                <li><a href="blog.php">Blog</a></li>   
                <li><a href="Admin/showUsers.php?page=1">Users</a></li>
                <li><a href="login.php">LogIn</a></li>
                <li><a href="homepage.php#header_footer">Contact </a></li>        
            </ul>
        </nav>


        <!--Above the fold-->
        <div class="header_image"> 
            <div class="headerparam"><h1>LIFE TRANSFORMING, PLANT-RICH SUPER MEALS AVAILABLE COUNTRYWIDE</h1></div>
            <div class= ><a class= "submit" href="#services">READ MORE</a></div>  
        </div>
        <div class="spacer"id="services"></div>


        <!--Who We Are-->
        <div class="whoWeAre" id="services">
            <h1 class="heading2">About Us</h1>
            <div class="border"></div> 
            <div class="whatWeDo">
                <div class="box">
                    <div class="icon">01</div>
                    <div class="content">
                        <h3>Our Services</h3>
                        <p>
                            We are Castro , the leading restaurant in catering services.
                    Our headquarters are in Cesenatico, in the heart of the Romagna Riviera
                        </p>
                        <a class="sec-link" href="#">Read More</a>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">02</div>
                    <div class="content">
                        <h3>Our Experience</h3>
                        <p>
                            For 25 years we have been organizing receptions of all kinds throughout the 
                    Italian and European territory
                        </p>
                        <a class="sec-link" href="#">Read More</a>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">03</div>
                    <div class="content">
                        <h3>Our Events</h3>
                        <p>
                            We participate in various international fairs bringing the 
                            culture of service and Italian cuisine to the world
                        </p>
                        <a class="sec-link" href="#">Read More</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="spacer"></div>


        <!--Our Specialities-->
        <div class="skills">
            <h1 class="heading3">Our Top Specialities</h1>
            <div class="border"></div> <br>
            <li>
                <h3>African Cuisine</h3><span class="bar"><span class="african"></span></span>
            </li>
            <br>
            <li>
                <h3>Chinese</h3><span class="bar"><span class="chinese"></span></span>
            </li>
            <br>
            <li>
                <h3>Spanish</h3><span class="bar"><span class="spanish"></span></span>
            </li>
            <br>
            <li>
                <h3>Sea Food</h3><span class="bar"><span class="sea"></span></span>
            </li>
            
        </div>

        <div class="spacer"></div>
        <!--Gallery-->
        <div class="gallery-section">
            <div class="inner-width">
              <h1>Today's Menu Specials</h1>
              <div class="border"></div>
              <div class="gallery">  
              <?php
                // Include the database configuration file
                include 'connect.php';
                // Get images from the database
                $query = $db->query("SELECT file_name FROM fooditems ORDER BY uploaded_on DESC LIMIT 3");
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = 'food/assets/'.$row["file_name"];
                ?>
                    <a href="<?php echo $imageURL?>" class="image">
                    <img src="<?= $imageURL; ?>" />
                    </a>
                <?php }} ?>
                
              </div>
            </div>
          </div>
          </div>  
          <!--Order Button-->
          <div class="order"><a class= "submit" href="Order/index.php">ORDER NOW</a></div>  
        <!--BlockQuote-->
            <div class="main_header" id="header_quote"><p></p></div>
            <div class="block-quote">
            <div class="quote">
            <blockquote>
                " From Roberto to the entire catering and staff they are all unique, professional and extremely 
                    respectful people to the customers and for their work. The food is unique, abundant and excellent. "
                    <h4 class="heading">-- C . E .O, Castro Foods</h4>
            </blockquote>
        </div>
        </div>
        <div class="spacer"></div> <div class="spacer"></div>

        <!--Testimonials-->
        <div class="main_header" id="header_testimonial"><p></p></div>
        <div class="testimonials">
            <div class="inner">
                <h1>Testimonials</h1>
                <div class="border"></div>
                <div class="row">
                    <!--Testimonial 1-->
                    <div class="col">
                        <div class="testimonial">
                            <img src="images/face1.jpg" alt="_blank">
                            <div class="name">Ralph M. Phillips</div>
                            <p>
                                "A catering with exceptional attention to detail. professional and extremely competent. 
                                They accompany you with care and love throughout the journey, from the choice of the menu 
                                to the composition of the table"
                            </p>
                        </div>
                    </div>
                    <!--Testimonial 2-->
                    <div class="col">
                        <div class="testimonial">
                            <img src="images/face2.jpg" alt="_blank">
                            <div class="name">Ella Dann</div>
                            <p>
                                "A catering with exceptional attention to detail. professional and extremely competent. 
                                They accompany you with care and love throughout the journey, from the choice of the menu 
                                to the composition of the table"
                            </p>
                        </div>
                    </div>
                    <!--Testimonial 3-->
                    <div class="col">
                        <div class="testimonial">
                            <img src="images/face3.jpg" alt="_blank">
                            <div class="name">Thomas O'Connell</div>
                            <p>
                                "A catering with exceptional attention to detail. professional and extremely competent. 
                                They accompany you with care and love throughout the journey, from the choice of the menu 
                                to the composition of the table"
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer"  id="header_footer"></div>



        <!--Contact Us-->
        <h1 class="heading" >Contact Us</h1>
        <div class="border"></div> 
        <div class="contact-box">
            <div class="contact-left">
                 <p>We would love to respond to your queries and help serve you better. Feel free to get in touch with us</p>
                 <form action="#">
                     <div class="input-row">
                         <div class="input-group">
                             <label for="">Name</label>
                             <input type="text" required placeholder="Please input your name">
                         </div>
                         <div class="input-group">
                             <label for="">Phone Number</label>
                             <input type="number" required placeholder="Please input your phone number">
                         </div>
                     </div>
                     <div class="input-row">
                         <div class="input-group">
                             <label for="">Email</label>
                             <input type="email" required placeholder="Please input your email address">
                         </div>
                         <div class="input-group">
                             <label for="">Subject</label>
                             <input type="text" placeholder="e.g Recipe Inquiry">
                         </div>
                     </div>
                     <label for="">Message</label>
                     <textarea rows="5" placeholder="Your Message goes here"></textarea>
                     <input type="button" value="SEND" class="btn-contact">
                 </form>
            </div>
            <div class="contact-right">
             <h3>Reach Us</h3>  
             <table>
                 <tr>
                     <td>Email</td>
                     <td>castrofoods@castro.com <br>info@castro.com</td>
                     
                 </tr>
                 <tr>
                     <td>Phone</td>
                     <td>+2547 29079432 <br>+2547 29079432</td>       
                 </tr>
                 <tr>
                     <td>Address</td>
                     <td>212, Ground Floor, 7th Cross <br> Mbagathi Road, Nairobi <br>Kenya</td>
                 </tr>
             </table> 
             </div>
        </div>
        <div class="spacer"></div> <div class="spacer"></div>


        <!--Footer-->    
        <footer>
            <div class="main-content">
                <div class="left box">
                    <h2>About Us</h2>
                    <div class="border-thin"></div>
                    <div class="content">
                        <p>Creativity, quality and professionalism are the elements that characterize our Catering company.
                            The experience gained allows us to cook for you anywhere and to create the service you want, from the informal event to the reception in an exclusive location
                            </p>
                        <div class="social">
                            <a href="facebook.com"><span class="fab fa-facebook-f"></span></a>
                            <a href="twitter.com"><span class="fab fa-twitter"></span></a>
                            <a href="instagram.com"><span class="fab fa-instagram"></span></a>
                            <a href="youtube.com"><span class="fab fa-youtube"></span></a>
                        </div>
                        <h3>Author: Imali Susan</h3>
                        <h5>Working Hours</h5>
                   <p>Monday - Friday 09.00 - 23.00 <br>Sunday 09.00 - 16.00</p>
                    </div>
                </div>
                <div class="center box">
                    <h2>Address</h2>
                    <div class="border-thin"></div>
                    <div class="content">
                        <div class="place">
                            <span class="fas fa-map-marker-alt"></span>
                            <span class="text">Nairobi, Kenya</span>
                        </div><br>
                        <div class="phone">
                            <span class="fas fa-phone-alt"></span>
                            <span class="text">+254729079432</span>
                        </div><br>
                        <div class="email">
                            <span class="fas fa-envelope"></span>
                            <span class="text">imali.lungaho@strathmore.edu</span>
                        </div><br>
                        <div class="email">
                            <span class="text">Postal Address : 413-01100 Nairobi<br>Kenya</span>
    
                        </div>
                    </div>
                </div>
                <div class="right box">
                    <h2>Subscribe to our Newsletter</h2>
                    <div class="border-thin"></div><br><br>
                    <h4>Get the Latest Notifications from us</h4>
                    <div class="content">
                        <form action="#">
                            <div class="email">
                                <div class="text">Enter Email Address*</div><br>
                                <input class="email-sub" type="email" required>
                            </div>
                            <div class="btn">
                                <a class="sec-foot" href="#">Send</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </footer>
   
   
</body>
</html>