 <!-- modal for Add Staff -->
 <div class="modal fade" id="addstaff" tabindex="-1" role="dialog" aria-labelledby="addstaffTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="addstaff">Add Staff</h5>
         <button type="button" class="btn-close text-dark" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <?php echo $this->Form->create(null, ["id" => "staffAdd"], ['class' => 'd-flex']); ?>
       <div class="gif-loader text-center">
         <img src="/img/double Rings.gif" alt="" width="80px">
       </div>
       <div class="modal-body">

         <?php echo $this->Flash->render() ?>
         <div class="mb-3 col-12">
           <?php echo $this->Form->control('user_profile.first_name', ['required' => false, 'class' => "form-control",'maxlength'=>"50"]); ?>
         </div>
         <div class="mb-3 col-12">
           <?php echo $this->Form->control('user_profile.last_name', ['required' => false, 'class' => "form-control",'maxlength'=>"50"]); ?>
         </div>
         <div class="mb-3 col-12">
           <?php echo $this->Form->control('user_profile.address', ['required' => false, 'class' => "form-control",'maxlength'=>"100"]); ?>
         </div>
         <div class="mb-3 col-12">
           <?php echo $this->Form->control('user_profile.contact', ['required' => false,'maxlength'=>"10",  'class' => "form-control"]); ?>
         </div>
         <div class="mb-3 col-12">
           <?php echo $this->Form->control('email', ['required' => false,'maxlength'=>"50",'class' => "form-control"]); ?>
           <b><small class="text-danger error-message" id="error_email"></small></b>

         </div>
         <div class="mb-3 col-12">
           <?php echo $this->Form->control('password', ['required' => false, 'class' => "form-control"]); ?>
           <?php echo $this->Form->input('user_profile.profile_image', ['required' => false, 'type' => "hidden", 'value' => 'default.jpg']); ?>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Submit Form</button>

       </div>
       <?php echo $this->Form->end(); ?>
     </div>
   </div>
 </div>

 <div class="container-fluid py-4" id="staff_update">
   <div class="row">

     <div class="col-12">
       <div class="card mb-4">

         <div class="card-header pb-0">

           <a href="javascript:void(0)" data-toggle="modal" data-target="#addstaff" class="btn btn-primary float-end ">Add Staff</a>

           <h6>Users List</h6>
         </div>
         <div class="card-body px-0 pt-0 pb-2">
           <div class="table-responsive p-0 staff">
             <table class="table align-items-center mb-0">
               <thead>
                 <tr>
                   <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Sr.No</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contact Number</th>
                   <th class="text-center text-uppercase text-secondary float-start text-xxs font-weight-bolder opacity-7">Address</th>
                   <th class="text-center text-uppercase text-secondary text-start text-xxs font-weight-bolder opacity-7">Created Date</th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                 </tr>
               </thead>
               <tbody id="mytable">
                 <?php
                  $i = 1;
                  if (count($users) > 0) {
                    foreach ($users as $user) :
                  ?>
                     <tr id='data<?= $user->id ?>'>
                       <td class="align-middle text-center">
                         <span class="text-secondary text-xs font-weight-bold"><?= $i++ ?></span>
                       </td>
                       <td>
                         <div class="d-flex px-2 py-1">
                           <div>
                             <?= $this->Html->image($user->user_profile->profile_image, ["class" => "avatar avatar-sm me-3 border-radius-lg "]) ?>
                           </div>
                           <div class=" text-capitalize  d-flex flex-column justify-content-center">
                             <h6 class="mb-0 text-sm"><?= h($user->user_profile->first_name) ?></h6>
                           </div>
                         </div>
                       </td>
                       <td>
                         <h6 class="mb-0 text-sm ps-2"><?= h($user->email) ?></h6>
                       </td>
                       <td>
                         <h6 class="mb-0 text-sm"><?= h($user->user_profile->contact) ?></h6>
                       </td>
                       <td class="text-capitalize">
                         <h6 class="mb-0 text-sm ps-2"><?= h($user->user_profile->address) ?></h6>
                       </td>


                       <td class="align-middle text-center">
                         <h6 class="mb-0 text-sm"><?= h($user->created_date) ?></h6>
                       </td>


                       <td class="align-middle text-center">
                         <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#userDetails" class="btn btn-success viewUser" data-id="<?= $user->id ?>">View</a>
                         <a href="javascript:void(0)" data-toggle="modal" data-target="#updateDetails" class="btn btn-primary editUser" data-id="<?= $user->id ?>">Edit</a>

                         <a href="javascript:void(0)" class="btn-delete-student btn btn-danger" data-id="<?= $user->id ?>">Delete</a>
                       </td>
                     </tr>
                   <?php
                    endforeach;
                  } else { ?>
                   <tr>
                     <td colspan="5" class="text-center fw-bold">No Results To Show</td>
                   </tr>
                 <?php
                  }

                  ?>

               </tbody>
             </table>

           </div>
         </div>
       </div>
     </div>
   </div>





   <!--==================================== View users Detail =============================-->

   <div class="modal fade" id="userDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
         <div class="modal-header py-4 text-center bg-dark ">
           <h5 class="modal-title text-white" id="exampleModalLabel">User Details</h5>
         </div>
         <div class="modal-body">
           <div class="container py-5 ">
             <div class="row d-flex justify-content-center align-items-center h-100">
               <div class="card mb-3" style="border-radius: .5rem;">
                 <div class="row g-0">
                   <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                     <img src="" alt="Avatar" class="img-fluid my-5" id="userPic" style="width: 100px;" />
                     <h5 id="userName"></h5>
                     <p id="userRole"></p>
                   </div>
                   <div class="col-md-8">
                     <div class="card-body p-4">
                       <h6>Information</h6>
                       <hr class="mt-0 mb-4">
                       <div class="row pt-1">
                         <div class="col-6 mb-3">
                           <h6>Email</h6>
                           <p id="userEmail" class="text-muted"></p>
                         </div>
                         <div class="col-6 mb-3">
                           <h6>Phone</h6>
                           <p id="userPhone" class="text-muted"></p>
                         </div>
                       </div>
                       <div class="row pt-1">
                         <div class="col-6 mb-3">
                           <h6>Address</h6>
                           <p id="userAddress" class="text-muted"></p>
                         </div>
                         <div class="col-6 mb-3">
                           <h6>Created Date</h6>
                           <p id="usercreated" class="text-muted"></p>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         </div>
       </div>
     </div>
   </div>


   <!-- ======================= update user details ================ -->

   <div class="modal fade" id="updateDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
         <div class="modal-header py-4 text-center bg-dark ">
           <h5 class="modal-title text-white" id="exampleModalLabel">Update User Details</h5>
         </div>
         <?php echo $this->Form->create(null, ["id" => "useredit",]); ?>
         <input type="hidden" id="iddd" name="iddd">
         <div class="modal-body">
           <div class="col-12 my-3">
             <?php echo $this->Form->control("user_profile.first_name", ["required" => false, "class" => "form-control px-3",'maxlength'=>"50", "id" => "firstname"]); ?>
           </div>
           <div class="col-12 my-3">
             <?php echo $this->Form->control('user_profile.last_name', ['required' => false, 'class' => 'form-control px-3','maxlength'=>"50", "id" => "lastname"]); ?>
           </div>
           <div class="col-12 my-3">
             <?php echo $this->Form->control('user_profile.contact', ['required' => false,  'maxlength'=>"10", 'class' => 'form-control px-3', "id" => "contact"]); ?>
           </div>

           <div class="col-12 my-3">
             <?php echo $this->Form->control('user_profile.address', ['required' => false, 'class' => 'form-control px-3','maxlength'=>"100", "id" => "address"]); ?>
           </div>

           <div class="col-12 my-3">
             <?php echo $this->Form->control('email', ["type" => "email", 'required' => false, 'class' => 'form-control px-3','maxlength'=>"50", "id" => "editemail"]); ?>
             <span id="email-error" class="text-danger"></span>
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <?= $this->Form->button("Submit", ["class" => "btn btn-primary", "id" => "edit"]) ?>
         </div>
         <?= $this->Form->end() ?>
       </div>
     </div>
   </div>

   <style>
     .gradient-custom {
       background: #f6d365;
       background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));
       background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
     }
   </style>