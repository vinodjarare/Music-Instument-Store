<title>Contact</title>
<?php 
  include 'includes/session.php';
  include 'includes/header.php';
?>
<style>
.navigation {
  background-color: #222;
}
</style>
<body>
<?php include 'includes/navbar.php'; ?>

<!-- main wrapper -->
<div class="main-wrapper">
  <!-- breadcrumb -->
  <nav class="py-3">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Contact</li>
    </ol>
  </div>
  </nav>
  <!-- /breadcrumb -->
  <!-- contact -->
  <section class="section">
  <div class="container">
    <div class="row justify-content-between">
      <!-- form -->
      <div class="col-lg-7 mb-5 mb-lg-0 text-center text-md-left">
        <h2 class="section-title">Contact Us</h2>
        <form class="row" id="feedback">
          <div class="col-md-6">
            <input type="text" id="firstName" name="firstName" class="form-control mb-4 rounded-0" placeholder="First Name" required="">
          </div>
          <div class="col-md-6">
            <input type="text" id="lastName" name="lastName" class="form-control mb-4 rounded-0" placeholder="Last Name" required="">
          </div>
          <div class="col-md-12">
            <input type="text" id="subject" name="subject" class="form-control mb-4 rounded-0" placeholder="Subject" required="">
          </div>
          <div class="col-md-12">
            <textarea name="message" id="message" class="form-control rounded-0 mb-4" placeholder="Message"></textarea>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit now</button>
          </div>
        </form>
      </div>
      <!-- contact item -->
      <div class="col-lg-4">
        <div class="d-flex mb-60">
          <i class="ti-location-pin contact-icon"></i>
          <div>
            <h4>Our Location</h4>
            <p class="text-gray">211 Location, Aurangabad</p>
          </div>
        </div>
        <div class="d-flex mb-60">
          <i class="ti-mobile contact-icon"></i>
          <div>
            <h4>Call Us Now</h4>
            <p class="text-gray mb-0">+91 1122334455</p>
            <p class="text-gray mb-0">+91 9898121298</p>
          </div>
        </div>
        <div class="d-flex mb-60">
          <i class="ti-email contact-icon"></i>
          <div>
            <h4>Write Us Now</h4>
            <p class="text-gray mb-0">customer.service@instrumentals.com</p>
            <p class="text-gray mb-0">info@instrumenatals.com</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
  <!-- /contatc -->
<?php include 'includes/footer.php'; ?>
</div>
</body>
<?php include 'includes/scripts.php'; ?>
<script>
  
$(document).ready(function(){
  var form = document.getElementById('feedback');
  form.addEventListener('submit', (event) => {
    event.preventDefault();
    var fName = $('#firstName').val();
      var lName = $('#lastName').val();
      var subject = $('#subject').val();
      var msg = $('#message').val();

      // alert(fName);

      $.ajax({
        type: 'POST',
        url: 'feedback.php',
        data: {fName:fName, lName:lName, subject:subject, msg:msg},
        dataType: 'json',
        success: function(response){
          if(!response.error){
            swal({
              title: "Thank You!",
              text: response,
              type: "success",
              closeOnConfirm: !1
            }, function(){
              window.location.reload();
            });
          }
          else{
            swal("Oops!", "Something went wrong", "error");
          }
        },
        error: function(){
          alert('problem');
        }
      });
  });
});
</script>