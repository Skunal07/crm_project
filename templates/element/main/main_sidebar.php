 <aside class="sidebar">
     <div class="toggle">
         <a href="#" class="js-menu-toggle menu-toggle" data-bs-toggle="tooltip tooltip-primary" data-bs-placement="bottom" title="Click Here To Contact us">
             <span class="icon-mode_comment text-black"></span>
         </a>
     </div>
     <div class="side-inner">

         <div class="share">
             <h2>Get in touch</h2>
             <?= $this->Form->create() ?>
             <?php echo $this->Form->control('name', ['class' => 'form-control', 'required', 'placeholder' => 'Enter your name']); ?>
             <?php echo $this->Form->control('email', ['class' => 'form-control','required', 'placeholder' => 'Enter your email']); ?>
             <?php echo $this->Form->control('phone', ['class' => 'form-control','required', 'placeholder' => 'Enter your Mobile Number']); ?>
             <label for="select">Query Type</label>
             <select class="form-select form-control" name="query_type" id="query_type" required aria-label="Default select">
                 <option class="bg-secondary" value="0" disabled selected>--Select--</option>
                 <option class="bg-secondary" value="Doors">Doors</option>
                 <option class="bg-secondary" value="Windows">Windows</option>
                 <option class="bg-secondary" value="Doors and Windows">Doors and Windows</option>
                 <option class="bg-secondary" value="Repair Doors & Windows">Repair Doors & Windows</option>
                 <option class="bg-secondary" value="Others">Others</option>
             </select>
             <?php echo $this->Form->control('message', ['rows' => '5', 'cols' => '30', 'required', 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Write your message']); ?>
             <div class="form-group form-check">
                 <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                 <label class="form-check-label" for="exampleCheck1">I agree to these Terms and Conditions.</label>
             </div>
             <?= $this->Form->button(__('submit'), ['class' => 'btn btn-primary btn-block']) ?>
             <?= $this->Form->end() ?>
         </div>

     </div>

 </aside>