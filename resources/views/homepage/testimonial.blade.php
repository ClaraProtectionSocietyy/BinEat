<!DOCTYPE html>
<html>

<head>
  @include('homepage.css')
</head>

<body>
  <div class="hero_area">

    <!-- header section strats -->
    @include('homepage.header')
    <!-- end header section -->

  </div>

  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonial
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Nicholas Huang
                  </h5>
                  <h6>
                    Student 
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                Bin Eat offers an exceptional dining experience with outstanding food and service. The crispy calamari and house-made bruschetta are must-try appetizers. The grilled salmon is perfectly cooked with a tangy lemon butter sauce, and the ribeye steak is tender and juicy with a smoky char. Desserts are delightful, especially the rich chocolate lava cake and creamy cheesecake. The staff is attentive and friendly, and the ambiance is warm and inviting. Highly recommended for a memorable meal!
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Andrew Sebastian
                  </h5>
                  <h6>
                    Student
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                I recently dined at Bin Eat and was thoroughly impressed. The appetizers, like the crispy calamari, were flavorful and well-prepared. My main course, the grilled salmon, was perfectly cooked and delicious. The chocolate lava cake for dessert was rich and indulgent. The staff provided excellent service, and the restaurant’s ambiance was cozy and welcoming. Overall, Bin Eat delivers a fantastic dining experience. Highly recommended!
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Julian
                  </h5>
                  <h6>
                    Student
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                Bin Eat is a gem! The food is fantastic, from the delicious appetizers to the perfectly cooked main courses. The grilled salmon was a standout, and the chocolate lava cake was heavenly. The service was friendly and attentive, and the cozy ambiance made for a great dining experience. Highly recommend!
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Welly Piyono
                  </h5>
                  <h6>
                    Student
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                I recently discovered Bin Eat and was blown away by the experience. The appetizers were delicious, with the bruschetta being a personal favorite. The main courses, such as the ribeye steak, were cooked to perfection and bursting with flavor. Dessert was a delight, especially the creamy cheesecake. The service was impeccable, and the ambiance was cozy. I can't wait to return to Bin Eat for another fantastic meal!
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Ivana Yoshe
                  </h5>
                  <h6>
                    Student
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                Bin Eat exceeded my expectations! The appetizers were divine, especially the crispy calamari. The main courses, like the grilled salmon, were cooked to perfection. Dessert was a treat, with the chocolate lava cake being a highlight. The staff was attentive, and the ambiance was charming. I highly recommend Bin Eat for a memorable dining experience!
              </p>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  
  <!-- info section -->
  @include('homepage.footer')

</body>

</html>