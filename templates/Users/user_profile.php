<div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
  <span class="mask bg-primary opacity-6"></span>
</div>

<div class="main-content position-relative max-height-vh-100 h-100">
  <!-- End Navbar -->
  <div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar-xl position-relative avatar-pic">
            <?= $this->Html->image($user->user_profile->profile_image, ["class" => "w-100 border-radius-lg shadow-sm "]) ?>
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              <?= ($user->user_profile['first_name']) ?> <?= ($user->user_profile['last_name']) ?>
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              <?php
              if ($user->role == 0) {
                echo 'Staff Member';
              } else {
                echo 'Admin';
              }
              ?>
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>



  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card" id="loadDetails">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <button data-toggle="modal" data-target="#updateDetails" data-id="<?= $user->id ?>" id="editUser" class=" btn btn-white text-dark fw-bold">Edit Profile</button>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">User Information</p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>First Name</label>
                  <h5><?php echo h($user->user_profile->first_name) ?></h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <h5><?php echo h($user->user_profile->last_name) ?></h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <h5><?php echo h($user->email) ?></h5>
                </div>
              </div>
            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Contact Information</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Email</label>
                  <h5><?php echo h($user->user_profile->address) ?></h5>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Mobile No</label>
                  <h5><?php echo h($user->user_profile->contact) ?></h5>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>



      <div class="col-md-4">
        <div class="card card-profile">
          <img src="/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
          <div class="row justify-content-center">
            <div class="col-4 col-lg-4 order-lg-2">
              <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                <a href="javascript:;">
                  <?= $this->Html->image($user->user_profile->profile_image, ["class" => "rounded-circle img-fluid border border-2 border-white "]) ?>
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
            <div class="justify-content-between">
              <a href="javascript:void(0)" class="btn btn-sm btn-primary mb-0 d-none d-lg-block" data-id="<?= $user->id ?>" id="imgUpload" data-toggle="modal" data-target="#ProfileImage">Update Image</a>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="text-center mt-4">
              <h5>
                <?= ($user->user_profile['first_name']) ?> <?= ($user->user_profile['last_name']) ?>
              </h5>
              <div>
                <i class="ni education_hat mr-2"></i>
                <?php
                if ($user->role == 0) {
                  echo 'Staff';
                } else {
                  echo 'Admin';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>



<!--=========== Modal For Update Profile Image  ========================-->
<div class="modal fade" id="ProfileImage" tabindex="-1" role="dialog" aria-labelledby="ProfileImageCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="bg-dark py-4 text-center">
        <h5 class="modal-title text-white" id="ProfileImageLongTitle">Update Profile Image</h5>
      </div>
      <?= $this->Form->create(null, ['id' => 'updateImage', 'type' => 'file']) ?>
      <div class="modal-body">
        <input type="hidden" id="iddd" name="iddd">
        <div class="col-12 my-3">
          <div class="form-group text-center">
            <div class="imgdisplay">
              <img src="" class='rounded-circle img-thumbnail mx-auto d-block mb-2' alt="Profile" height='250px' width='150px' name='imgdisplay' id='imgdisplay' onclick='imgSelect()'>
            </div>
            <?php echo $this->Form->control('user_profile.profile_image', ['type' => 'file', 'required' => false, 'class' => 'form-control', 'onchange' => 'showImage(this)', 'id' => 'imageName']); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?= $this->Form->button(__('Upload'), ['class' => 'btn btn-primary'], ['controller' => 'users', 'action' => 'updateImage']) ?>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>

<!--================================ Modal For Update Profile Details ========================-->
<div class="modal fade" id="updateDetails" tabindex="-1" role="dialog" aria-labelledby="updateDetailsTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="bg-dark py-4 text-center">
        <h5 class="modal-title text-white" id="updateDetailsLongTitle">Update Details</h5>
      </div>
      <?= $this->Form->create(null, ['id' => 'updateInfo', 'type' => 'file']) ?>
      <div class="modal-body">
        <input type="hidden" id="userpid" name="userpid">
        <div class="col-12 my-3">
          <?php echo $this->Form->control('user_profile.first_name', ['required' => false, 'class' => 'form-control']); ?>
        </div>

        <div class="col-12 my-3">
          <?php echo $this->Form->control('user_profile.last_name', ['required' => false, 'class' => 'form-control']); ?>
        </div>

        <div class="col-12 my-3">
          <?php echo $this->Form->control('email', ['required' => false, 'class' => 'form-control']); ?>
        </div>

        <div class="col-12 my-3">
          <?php echo $this->Form->control('user_profile.contact', ['required' => false, 'class' => 'form-control']); ?>
        </div>

        <div class="col-12 my-3">
          <?php echo $this->Form->control('user_profile.address', ['required' => false, 'class' => 'form-control']); ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?= $this->Form->button(__('Update'), ['class' => 'btn btn-primary']) ?>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>