<?php include "./includes/header.php";?> 
   
   <div class="container" id="register">
    <div class="row">
      <div class="col-md-5 py-3 py-md-0" id="side1">
        <h3 class="text-center">Register</h3>
      </div>
      <div class="col-md-7 py-3 py-md-0" id="side2">
        <h3 class="text-center">Create Account</h3>
        <form method="post" action="">
          <div class="input2 text-center">
            <input type="text" name="name" placeholder="User Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <p class="text-center" id="btnlogin">
            <button type="submit" class="btn btn-warning" name="submit_register">SIGN UP</button>
          </p>
        </form>
      </div>
    </div>
  </div>
    <!-- newslater -->
    <div class="container" id="newslater" style="margin-top: 100px;">
      <h3 class="text-center">Subscribe To The Electronic Shop For Latest upload.</h3>
      <div class="input text-center">
        <input type="text" placeholder="Enter Your Email..">
        <button id="subscribe">SUBSCRIBE</button>
      </div>
    </div>
    <!-- newslater -->

    <?php include "./includes/footer.php";?> 