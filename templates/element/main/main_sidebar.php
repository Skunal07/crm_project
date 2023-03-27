 <aside class="sidebar">
     <div class="toggle">
         <a href="#" class="js-menu-toggle text-white fw-bold menu-toggle contact-toggle" data-bs-toggle="tooltip tooltip-primary" data-bs-placement="bottom" title="Click here to contact us">
             Contact us <span class="icon-mode_comment align-middle  text-black"></span>
         </a>
         <div class="mt-5 close-toggle">
             <a href="#" class="js-menu-toggle text-white fw-bold" data-bs-toggle="tooltip tooltip-primary" data-bs-placement="bottom" title="Click here to close">
                 Close <span class="fa-solid fa-rectangle-xmark fa-xl align-middle text-danger"></span>
             </a>
         </div>
     </div>
     <div class="side-inner">

         <div class="share">
             <h4 class="fw-bold">Get in touch</h4>

             <?= $this->Form->create(null, ['id' => 'contactusform']) ?>
             <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
             </script>
             <?php echo $this->Form->control('name', ['class' => 'form-control mb-0', 'placeholder' => 'Enter your name', 'label' => false]); ?>
             <?php echo $this->Form->control('email', ['class' => 'form-control mb-0 mt-3', 'placeholder' => 'Enter your email', 'label' => false]); ?>
             <?php echo $this->Form->control('phone', ['class' => 'form-control mb-0 mt-3', 'placeholder' => 'Enter your mobile number', 'label' => false]); ?>
             <!-- <label for="query_type">Query Type</label> -->

             <select class="form-select form-control mb-0 mt-3" name="query_type" id="query_type" aria-label="Default select">
                 <option class="bg-secondary" value="0" disabled selected>--Select query--</option>
                 <option class="bg-secondary" value="Doors">Doors</option>
                 <option class="bg-secondary" value="Windows">Windows</option>
                 <option class="bg-secondary" value="Doors and Windows">Doors and windows</option>
                 <option class="bg-secondary" value="Repair Doors & Windows">Repair doors & windows</option>
                 <option class="bg-secondary" value="Others">Others</option>
             </select>
             <!-- <br> -->
             <!-- <label for="priority">Priority</label> -->
             <select class="form-select form-control mb-0 mt-3" name="payment[priority]" id="payment_priority" aria-label="Default select">
                 <option class="bg-secondary" value="0" disabled selected>--Select priority--</option>
                 <option class="bg-secondary" value="5">Low ($5)</option>
                 <option class="bg-secondary" value="7">Medium ($7)</option>
                 <option class="bg-secondary" value="10">High ($10)</option>
             </select>
             <?php echo $this->Form->control('message', ['rows' => '5', 'cols' => '30', 'type' => 'textarea', 'class' => 'form-control mb-0 mt-3', 'placeholder' => 'Write your message', 'label' => false]); ?>

             <div class="mt-3" id="html_element"></div>
             <span id="cptcha-checkbox" class="error mb-0"></span>
             <!-- =======

             <label id="checkbox-error" class="error" for="checkbox"></label>

             <div class="form-group form-check">
                 <input type="checkbox" class="form-check-input" name="checkbox" id="checkbox">
                 <label class="form-check-label" for="exampleCheck1">I agree to these Terms and Conditions.</label>
             </div>
>>>>> -->
             <?= $this->Form->button(__('submit'), ['class' => 'btn btn-primary btn-block contactus my-3']) ?>
             <?= $this->Form->end() ?>
         </div>

     </div>

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
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
             <input type="hidden" id="payment" name="payment">
             <div class="modal-body">
                 <div class="gif-loader text-center">
                     <img src="/img/output-onlinegiftools.gif" alt="" width="80px">
                 </div>
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
                         <button class="btn btn-primary btn-lg btn-block w-100 contact-form" type="submit">Pay $<span id="pay-now"></span></button>
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