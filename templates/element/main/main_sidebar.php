 <aside class="sidebar">
     <div class="toggle">
         <a href="#" class="js-menu-toggle menu-toggle" data-bs-toggle="tooltip tooltip-primary" data-bs-placement="bottom" title="Click Here To Contact us">
             <span class="icon-mode_comment text-black"></span>
         </a>
     </div>
     <div class="side-inner">

         <div class="share">
             <h2>Get in touch</h2>

             <?= $this->Form->create(null, ['id' => 'contactusform']) ?>
             <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
             </script>
             <?php echo $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Enter your name']); ?>
             <?php echo $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Enter your email']); ?>
             <?php echo $this->Form->control('phone', ['class' => 'form-control', 'placeholder' => 'Enter your Mobile Number']); ?>
             <label for="query_type">Query Type</label>

             <select class="form-select form-control" name="query_type" id="query_type" aria-label="Default select">
                 <option class="bg-secondary" value="0" disabled selected>--Select Query--</option>
                 <option class="bg-secondary" value="Doors">Doors</option>
                 <option class="bg-secondary" value="Windows">Windows</option>
                 <option class="bg-secondary" value="Doors and Windows">Doors and Windows</option>
                 <option class="bg-secondary" value="Repair Doors & Windows">Repair Doors & Windows</option>
                 <option class="bg-secondary" value="Others">Others</option>
             </select>
             <br>
             <label for="priority">Priority</label>
             <select class="form-select form-control" name="payment[priority]" id="payment_priority" aria-label="Default select">
                 <option class="bg-secondary" value="0" disabled selected>--Select Priority--</option>
                 <option class="bg-secondary" value="5">Low ($5)</option>
                 <option class="bg-secondary" value="7">Medium ($7)</option>
                 <option class="bg-secondary" value="10">High ($10)</option>
             </select>
             <?php echo $this->Form->control('message', ['rows' => '5', 'cols' => '30', 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Write your message']); ?>

             <span id="cptcha-checkbox" class="error"></span>
             <div id="html_element"></div>
             <!-- =======

             <label id="checkbox-error" class="error" for="checkbox"></label>

             <div class="form-group form-check">
                 <input type="checkbox" class="form-check-input" name="checkbox" id="checkbox">
                 <label class="form-check-label" for="exampleCheck1">I agree to these Terms and Conditions.</label>
             </div>
>>>>> -->
             <?= $this->Form->button(__('submit'), ['class' => 'btn btn-primary btn-block contactus']) ?>
             <?= $this->Form->end() ?>
         </div>

     </div>
     <!-- , 'data-bs-toggle' => 'modal', 'data-bs-target' => '#exampleModal' -->
 </aside>
 <script type="text/javascript">
     var onloadCallback = function() {
         grecaptcha.render('html_element', {
             'sitekey': '6LdrauskAAAAAIppBm6n6z2-hHanicTSEp7cyZDl'
         });

     };
     $(document).on("click", ".contactus", function() {

         if (grecaptcha.getResponse() == "") {
             $('#cptcha-checkbox').html('please check this feild');
             $('#cptcha-checkbox').show();
         } else {
             $('#cptcha-checkbox').hide();
         }
     })
 </script>
 <!-- site 6LdrauskAAAAAIppBm6n6z2-hHanicTSEp7cyZDl
 secret 6LdrauskAAAAAJxRRsWtJd_8_Nd0BquTCBPrckMk -->

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header bg-dark text-white ">
                 <h5 class="modal-title fw-bold" id="exampleModalLabel">Payment</h5>
                 <button type="button" class="btn-close btn btn-outline-light" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <?= $this->Form->create(null, [
                    // "action" => $this->Url->build("/payment", ["fullBase" => false]),
                    "action" => $this->Url->build("stripes/payment", ["fullBase" => false]),
                    "method" => "post",
                    "class" => "require-validation",
                    "data-cc-on-file" => "false",
                    "data-stripe-publishable-key" => STRIPE_KEY,
                    "id" => "payment-form"
                ]) ?>
             <div class="modal-body">
                 <style>
                     .modal-footer.pay {
                         display: block !important;
                     }
                 </style>
                 <div class='form-row row'>
                     <div class='col-xs-12 form-group required'>
                         <label class='control-label'>Name on Card</label> <input class='form-control' size='4' name="card-name" id="card-name" type='text'>

                     </div>
                 </div>

                 <div class='form-row row'>
                     <div class='col-xs-12 form-group card required'>
                         <label class='control-label'>Card Number</label> <input autocomplete='off' class='form-control card-number' name="card-no" id="card-no" size='20' type='text'>

                     </div>
                 </div>

                 <div class='form-row row'>
                     <div class='col-xs-12 col-md-4 form-group cvc required'>
                         <label class='control-label'>CVC</label> <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' name="cvc" id="cvc" size='4' type='text'>

                     </div>
                     <div class='col-xs-12 col-md-4 form-group expiration required'>
                         <label class='control-label'>Expiration Month</label> <input class='form-control card-expiry-month' placeholder='MM' size='2' name="month" id="month" type='text'>

                     </div>
                     <div class='col-xs-12 col-md-4 form-group expiration required'>
                         <label class='control-label'>Expiration Year</label> <input class='form-control card-expiry-year' placeholder='YYYY' size='4' name="year" id="year" type='text'>

                     </div>
                 </div>

             </div>
             <div class="modal-footer pay">
                 <div class="row">
                     <div class="col-xs-12">
                         <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                     </div>
                 </div>
             </div>
             <?= $this->Form->end() ?>
         </div>
     </div>
 </div>

 <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

 <script type="text/javascript">
     $(function() {

         var $form = $(".require-validation");

         $('form.require-validation').bind('submit', function(e) {
             var $form = $(".require-validation"),
                 inputSelector = ['input[type=email]', 'input[type=password]',
                     'input[type=text]', 'input[type=file]',
                     'textarea'
                 ].join(', '),
                 $inputs = $form.find('.required').find(inputSelector),
                 $errorMessage = $form.find('div.error'),
                 valid = true;
             $errorMessage.addClass('hide');

             $('.has-error').removeClass('has-error');
             $inputs.each(function(i, el) {
                 var $input = $(el);
                 if ($input.val() === '') {
                     $input.parent().addClass('has-error');
                     $errorMessage.removeClass('hide');
                     e.preventDefault();
                 }
             });

             if (!$form.data('cc-on-file')) {
                 e.preventDefault();
                 Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                 Stripe.createToken({
                     number: $('.card-number').val(),
                     cvc: $('.card-cvc').val(),
                     exp_month: $('.card-expiry-month').val(),
                     exp_year: $('.card-expiry-year').val()
                 }, stripeResponseHandler);
             }

         });

         function stripeResponseHandler(status, response) {
             if (response.error) {
                 $('.error')
                     .removeClass('hide')
                     .find('.alert')
                     .text(response.error.message);
             } else {
                 /* token contains id, last4, and card type */
                 var token = response['id'];

                 $form.find('input[type=text]').empty();
                 $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                 $form.get(0).submit();
             }
         }

     });
 </script>