<section class="contact-w3ls" id="contact">
    <div class="container">
      <div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
        <div class="contact-agileits">
          <h4>Contact Us</h4>
          <p class="contact-agile2">Sign Up For Our News Letters</p>
          <form action="#" method="post" name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
                <div class="controls">
                    <label class="contact-p1">Full Name:</label>
                    <input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
                    <p class="help-block"></p>
                </div>
            </div>	
              <div class="control-group form-group">
              <div class="controls">
              <label class="contact-p1">Phone Number:</label>
              <input type="tel" class="form-control" name="phone" id="phone" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block"></p>
              </div>
                </div>
                <div class="control-group form-group">
                <div class="controls">
                  <label class="contact-p1">Email Address:</label>
                  <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address.">
                  <p class="help-block"></p>
                </div>
                    </div>
                  <div id="success"></div>
                <button type="submit" class="btn btn-primary">Send</button>	
          </form>            
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
        <h4>Connect With Us</h4>
        <p class="contact-agile1"><strong>Phone :</strong> {{ getSystemSettings('phone') }}</p>
        <p class="contact-agile1"><strong>Email :</strong> <a href="mailto:name@example.com">{{ getSystemSettings('company_email') }}</a></p>
        <p class="contact-agile1"><strong>Address :</strong> {{ getSystemSettings('address') }}</p>
                                  
        <div class="social-bnr-agileits footer-icons-agileinfo">
          <ul class="social-icons3">
                  <li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
                  <li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
                  <li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
                  <li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
                </ul>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    </section>