<?php require('../config/autoload.php')?>
<?php include('header.php')?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flickity@2.2.2/dist/flickity.min.css">
<script src="https://cdn.jsdelivr.net/npm/flickity@2.2.2/dist/flickity.pkgd.min.js"></script>
<head>

</head>
<body>

</head>
      
            
    

    </div>
    <!-- Start Categories  -->
    <div class="my-account-box-main">
        <div class="container">
        
            <div class="my-account-page">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="account-box" style="border:none;">
                            <!-- <img src="" > -->
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="table/viewpunish.php"> <i class="fa fa-credit-card"></i> </a>
                                </div>
                                <div class="service-desc">
                                    <h4>CHALLAN</h4>
                                    <p style="color: black">Petiton Payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="account-box" style="border:none;">
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="table/viewepunish.php"> <i class="fa fa-gift"></i> </a>
                                </div>
                
                                <div class="service-desc">
                                    <h4>E-CHALLAN</h4>
                                    <p style="color: black">Petiton Payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div> 
    <!-- End Categories -->

    <script>
  // Wait for the page to load
  document.addEventListener("DOMContentLoaded", function () {
    const carousel = document.querySelector(".carousel");
    const flkty = new Flickity(carousel, {
      autoPlay: 3000, // Auto-play with a 3-second delay
      wrapAround: true, // Allows for infinite looping
      pageDots: false, // Hide page dots
    });
  });
</script>

<style>
.marquee {
    white-space: nowrap;
}

.marquee-text {
    padding-right: 1500px; /* Adjust the padding to control the spacing */
}


    </style>

    
       <!-- Start Footer  -->
       <?php include('footer.php')?>