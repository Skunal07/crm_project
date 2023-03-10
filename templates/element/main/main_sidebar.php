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
                 <option class="bg-secondary" value="0" disabled selected>--Select--</option>
                 <option class="bg-secondary" value="Doors">Doors</option>
                 <option class="bg-secondary" value="Windows">Windows</option>
                 <option class="bg-secondary" value="Doors and Windows">Doors and Windows</option>
                 <option class="bg-secondary" value="Repair Doors & Windows">Repair Doors & Windows</option>
                 <option class="bg-secondary" value="Others">Others</option>
             </select>
             <?php echo $this->Form->control('message', ['rows' => '5', 'cols' => '30', 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Write your message']); ?>
<<<<<<< HEAD
             <span id="cptcha-checkbox" class="error"></span>
             <div id="html_element"></div>
=======

             <label id="checkbox-error" class="error" for="checkbox"></label>

             <div class="form-group form-check">
                 <input type="checkbox" class="form-check-input" name="checkbox" id="checkbox">
                 <label class="form-check-label" for="exampleCheck1">I agree to these Terms and Conditions.</label>
             </div>
>>>>>>> efa65220eb40bc90cba7f6d5a764f68a9eb64603
             <?= $this->Form->button(__('submit'), ['class' => 'btn btn-primary btn-block contactus']) ?>
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