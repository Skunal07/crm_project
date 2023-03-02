<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>

  <div class="main-content position-relative max-height-vh-100 h-100">
    
        
    <!-- End Navbar -->
    <div class="card shadow-lg mx-4 card-profile-bottom">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <?= $this->Html->image($user->user_profile->profile_image,["class" =>"w-100 border-radius-lg shadow-sm "])?>

            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              <?= ($user->user_profile['first_name']) ?> <?= ($user->user_profile['last_name']) ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
              <?php 
                if($user->role == 0){
                  echo 'Staff Member of DoorDekho.com';
                }else{
                    echo 'Admin of DoorDekho.com';
                }
                 ?>
              </p>
            </div>
          </div>
         
        </div>
      </div>
    </div>

    <!------------------------------------ Edit Detaile ------------------------------------------>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
              <?php echo $this->Form->create($user, ["type" => "file","id" => "useredit",]); ?>
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <button type="submit" class="btn btn-primary btn-sm ms-auto">Submit</button>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">User Information</p>
              <div class="row">
                <input type="hidden" value='<?= $user->user_profile->profile_image ?>' id="imageddd" name="imageddd" >
                <div class="col-md-6">
                  <div class="form-group">
                    <?php echo $this->Form->control("email",["required" => false,"class" => "form-control","id" => "address",]); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php echo $this->Form->control("user_profile.first_name",["required" => false,"class" => "form-control","id" => "address",]); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php echo $this->Form->control("user_profile.last_name",["required" => false,"class" => "form-control","id" => "address",]); ?>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Contact Information</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <?php echo $this->Form->control("user_profile.address",["required" => false,"class" => "form-control","id" => "address",]); ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <?php echo $this->Form->control("user_profile.contact",["required" => false,"class" => "form-control","id" => "address",]); ?>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">About me</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">About me</label>
                    <input class="form-control" type="text" value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
                  </div>
                </div>
              </div>
              
            </div>
            <?= $this->Form->end() ?>
        </div>
        </div>

        <!------------------------------------ End Edit Detaile ------------------------------------------>

        <div class="col-md-4">
          <div class="card card-profile">
            <img src="/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                  <a href="javascript:;">
                  <?= $this->Html->image($user->user_profile->profile_image,["class" =>"rounded-circle img-fluid border border-2 border-white "])?>

                    <!-- <img src="/img/team-2.jpg" class="rounded-circle img-fluid border border-2 border-white"> -->
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              <div class="d-flex justify-content-between">
                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="d-flex justify-content-center">
                    <div class="d-grid text-center">
                      <span class="text-lg font-weight-bolder">22</span>
                      <span class="text-sm opacity-8">Friends</span>
                    </div>
                    <div class="d-grid text-center mx-4">
                      <span class="text-lg font-weight-bolder">10</span>
                      <span class="text-sm opacity-8">Photos</span>
                    </div>
                    <div class="d-grid text-center">
                      <span class="text-lg font-weight-bolder">89</span>
                      <span class="text-sm opacity-8">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mt-4">
                <h5>
                <?= ($user->user_profile['first_name']) ?> <?= ($user->user_profile['last_name']) ?>
                </h5>
                <div class="h6 font-weight-300">
                  <i class="ni location_pin mr-2"></i> <?=h($user->user_profile->address);?>
                </div>
                <div class="h6 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?=h($user->email);?>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>  <?php 
                if($user->role == 0){
                  echo 'Staff Member of DoorDekho.com';
                }else{
                    echo 'Admin of DoorDekho.com';
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
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
    
    </div>
  </div>
  