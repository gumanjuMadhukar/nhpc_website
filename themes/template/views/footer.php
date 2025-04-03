<?php
  // $male = health_professional_count_male();
  // $female = health_professional_count_female();
  // $other = health_professional_count_other();
  // $male1 = health_professional_count_male1();
  // $male2 = health_professional_count_male2();
  // $male3 = health_professional_count_male3();
  // $male4 = health_professional_count_male4();
  // $male5 = health_professional_count_male5();
  // $male6 = health_professional_count_male6();
  // $male7 = health_professional_count_male7();
  // $male8 = health_professional_count_male8();
  // $female = health_professional_count_female();
  // $female1 = health_professional_count_female1();
  // $female2 = health_professional_count_female2();
  // $female3 = health_professional_count_female3();
  // $female4 = health_professional_count_female4();
  // $female5 = health_professional_count_female5();
  // $female6 = health_professional_count_female6();
  // $female7 = health_professional_count_female7();
  // $female8 = health_professional_count_female8();
  // $other = health_professional_count_other();
  // $other1 = health_professional_count_other1();
  // $other2 = health_professional_count_other2();
  // $other3 = health_professional_count_other3();
  // $other4 = health_professional_count_other4();
  // $other5 = health_professional_count_other5();
  // $other6 = health_professional_count_other6();
  // $other7 = health_professional_count_other7();
  // $other8 = health_professional_count_other8();
  // $national_college = health_professional_count_national_college();
  // $international_college = health_professional_count_international_college();
  // $category1 = health_professional_count_category1();
  // $category2 = health_professional_count_category2();
  // $category3 = health_professional_count_category3();
  // $category4 = health_professional_count_category4();
  // $category5 = health_professional_count_category5();
  // $category6 = health_professional_count_category6();
  // $category7 = health_professional_count_category7();
  // $category8 = health_professional_count_category8();
  // $total = health_professional_count();
  $contact_detail_data = setting();
  $contact_detail = $contact_detail_data['setting'];
?>
  <section id="contact">
    <div class="contact-wrapper">
      <div class="d-flex justify-content-center">
        <div class="contact-content">
          <div class="container">
            <div class="row">
              <div class="col-md-8 offset-md-2">
                <div class="heading">
                  <h3>Contact Us</h3>
                </div>
                <div class="list-group">
                  <?php
                      echo $contact_detail[0]->value;
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="contact-map">
          <?php
              echo $contact_detail[9]->value;
          ?>
        </div>

      </div>
    </div>
  </section>
  <footer>
    <div class="conatiner text-center">2020 all rights reserved at : nhpc.gov.np</div>
  </footer>
  <!-- <script src="src.e31bb0bc.js"></script> -->
  <script>$(document).ready(function () {
  $('.update-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
    cssEase: 'linear',
    infinite: true
  });
});</script>
  <script>$(document).ready(function () {
  $('.service-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    // fade: true,
    // cssEase: 'linear',
    infinite: true
  });
  $('.notice-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    infinite: true
  });
});</script>
</body>
<div class="modal fade login" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <a href="" class="close" data-dismiss="modal"><i class="ri-close-line ri-lg"></i>
        </a>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <div class="heading">
              <h3>Student login</h3>
            </div>
            <form id="student-signin" action="http://nhpc.gov.np/app/site/login" class="form-wrapper" method="post">
              <!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> -->
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="LoginFormStudent[username]" id="loginformstudent-username" class="form-control" autofocus="" required>
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="LoginFormStudent[password]" id="loginformstudent-password" class="form-control" required>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-custom">
                    Log In
                  </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="sign-up">
          <h4>Register as Student </h4>
          <a href="https://nhpc.gov.np/app/registration">Create New Account <i class="ri-arrow-right-s-line ri-lg"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="sticky-table">
  <div class="d-flex justify-content-between">
    <div class="regis" id="reg-stats">
      <div class="regis-total">
        <h5>Total registered professionals </h5>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th></th>
              <th>Male</th>
              <th>Female</th>
              <th>Other</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr class="table-content">
              <td>Dentistry</td>
              <td><?php echo $male5; ?></td>
              <td><?php echo $female5; ?></td>
              <td><?php echo $other5; ?></td>
              <td><?php echo $category5; ?></td>
            </tr>
            <tr class="table-content">
              <td>General Medicine</td>
              <td><?php echo $male2; ?></td>
              <td><?php echo $female2; ?></td>
              <td><?php echo $other2; ?></td>
              <td><?php echo $category2; ?></td>
            </tr>
            <tr class="table-content">
              <td>Laboratory Medical Sciences</td>
              <td><?php echo $male3; ?></td>
              <td><?php echo $female3; ?></td>
              <td><?php echo $other3; ?></td>
              <td><?php echo $category3; ?></td>
            </tr>
            <tr class="table-content">
              <td>Miscellaneous & Traditional Medicine</td>
              <td><?php echo $male1; ?></td>
              <td><?php echo $female1; ?></td>
              <td><?php echo $other1; ?></td>
              <td><?php echo $category1; ?></td>
            </tr>
            <tr class="table-content">
              <td>Optometry Science</td>
              <td><?php echo $male6; ?></td>
              <td><?php echo $female6; ?></td>
              <td><?php echo $other6; ?></td>
              <td><?php echo $category6; ?></td>
            </tr>
            <tr class="table-content">
              <td>Physical therapy and C. B. R.</td>
              <td><?php echo $male8; ?></td>
              <td><?php echo $female8; ?></td>
              <td><?php echo $other8; ?></td>
              <td><?php echo $category8; ?></td>
            </tr>
            <tr class="table-content">
              <td>Public Health</td>
              <td><?php echo $male4; ?></td>
              <td><?php echo $female4; ?></td>
              <td><?php echo $other4; ?></td>
              <td><?php echo $category4; ?></td>
            </tr>
            <tr class="table-content">
              <td>Radiology / Imaging</td>
              <td><?php echo $male7; ?></td>
              <td><?php echo $female7; ?></td>
              <td><?php echo $other7; ?></td>
              <td><?php echo $category7; ?></td>
            </tr>
            <tr class="total">
              <td>Total</td>
              <td><?php echo $male; ?></td>
              <td><?php echo $female; ?></td>
              <td><?php echo $other; ?></td>
              <td><?php echo $total; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- <div class="toggle">
      <a class="toggle-table">Registration Status</a>
    </div> -->
  </div>
</div>
<script>
//   $(document).ready(function () {
//   $('.toggle-table').on('click', function (e) {
//     $('.regis').toggleClass("regis-open"); //you can list several class names 

//     e.preventDefault();
//   });
// });
</script>
<script>

  function slideToggle() {
    var element = document.getElementById("reg-stats");
    element.classList.toggle("regis-open");
  }
</script>

</html>