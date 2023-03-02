 <aside class="sidebar">
     <div class="toggle">
         <a href="#" class="js-menu-toggle menu-toggle">
             <span class="icon-mode_comment text-black"></span>
         </a>
     </div>
     <div class="side-inner">

         <div class="share">
             <h2>Get in touch</h2>
             <?= $this->Form->create() ?>
             <?php echo $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Enter your name']); ?>
             <?php echo $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Enter your email']); ?>
             <?php echo $this->Form->control('phone', ['class' => 'form-control', 'placeholder' => 'Enter your Mobile Number']); ?>
             <label for="select">Query Type</label>
             <select class="form-select form-control" aria-label="Default select">
                 <option class="bg-secondary" value="Doors" selected>Doors</option>
                 <option class="bg-secondary" value="Windows">Windows</option>
                 <option class="bg-secondary" value="Doors and Windows">Doors and Windows</option>
                 <option class="bg-secondary" value="Repair Doors & Windows">Repair Doors & Windows</option>
             </select>
             <?php echo $this->Form->control('message', ['rows' => '5', 'cols' => '30', 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Write your message']); ?>
             <?= $this->Form->button(__('submit'), ['class' => 'btn btn-primary btn-block']) ?>
             <?= $this->Form->end() ?>
         </div>

     </div>

 </aside>