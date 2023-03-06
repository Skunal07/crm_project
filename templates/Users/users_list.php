<!-- modal for Add Staff -->

<div class="modal fade" id="addstaff" tabindex="-1" role="dialog" aria-labelledby="addstaffTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addstaff">Add Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $this->Flash->render() ?>
        <?php echo $this->Form->create(null, ["id" => "staffAdd"]); ?>
        <div class="mb-3">
          <?php echo $this->Form->control('user_profile.first_name', ['required' => false, 'class' => "form-control"]); ?>
        </div>
        <div class="mb-3">
          <?php echo $this->Form->control('user_profile.last_name', ['required' => false, 'class' => "form-control"]); ?>
        </div>
        <div class="mb-3">
          <?php echo $this->Form->control('user_profile.address', ['required' => false, 'class' => "form-control"]); ?>
        </div>
        <div class="mb-3">
          <?php echo $this->Form->control('user_profile.contact', ['required' => false, 'class' => "form-control"]); ?>
        </div>
        <div class="mb-3">
          <?php echo $this->Form->control('email', ['required' => false, 'class' => "form-control"]); ?>

        </div>
        <div class="mb-3">
          <?php echo $this->Form->control('password', ['required' => false, 'class' => "form-control"]); ?>
          <?php echo $this->Form->input('user_profile.profile_image', ['required' => false, 'type' => "hidden", 'value' => 'default.jpg']); ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit Form</button>
        <?php echo $this->Form->end(); ?>

      </div>
    </div>
  </div>
</div>
<div class="container-fluid py-4">
  <div class="row" id="staff_update">
    <div class="col-12">
      <div class="card mb-4">

        <div class="card-header pb-0">

          <a href="javascript:void(0)" data-toggle="modal" data-target="#addstaff" class="btn btn-primary float-end editUser">Add Staff</a>

          <h6>Users List</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0 staff" >
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Users</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contact Number</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($users) > 0) {
                  foreach ($users as $user) :
                ?>
                    <tr id='data<?= $user->id ?>'>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <?= $this->Html->image($user->user_profile->profile_image, ["class" => "avatar avatar-sm me-3 border-radius-lg "]) ?>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= h($user->user_profile->first_name) ?></h6>
                            <p class="text-xs text-secondary mb-0"><?= h($user->email) ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= h($user->user_profile->contact) ?></p>
                        <p class="text-xs text-secondary mb-0"><?= h($user->user_profile->address) ?></p>
                      </td>
                      <?php if ($user->status == 2) : ?>
                        <td class="align-middle text-center text-sm">
                          <?= $this->Form->postLink(__("InActive"), ["action" => "userstatus", $user->id, $user->status,], ["class" => "badge badge-sm bg-gradient-danger"], ["confirm" => __("Are you sure you want to Active # {0}?", $user->id),]) ?>
                        </td>

                      <?php else : ?>
                        <td class="align-middle text-center text-sm"><?= $this->Form->postLink(__("Active"), ["action" => "userstatus", $user->id, $user->status,], ["class" => "badge badge-sm bg-gradient-success"], ["confirm" => __("Are you sure you want to InActive # {0}?", $user->id),]) ?>
                        <?php endif; ?>
                        </td>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?= h($user->created_date) ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success editUser" data-id="<?= $user->id ?>">View</a>
                          <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary editUser" data-id="<?= $user->id ?>">Edit</a>

                          <a href="javascript:void(0)" class="btn-delete-student btn btn-danger" data-id="<?= $user->id ?>">Delete</a>
                        </td>
                    </tr>
                  <?php
                  endforeach;
                } else { ?>
                  <tr>
                    <td colspan="5" class="text-center fw-bold"
>No Results To Show</td>
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





  <!--==================================== View users Profile With Modal =============================-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="py-4 text-center bg-dark text-white">
          <h5 class="modal-title text-white" id="exampleModalLabel">Details of <?= ($user->user_profile['first_name']) ?>'s Profile</h5>
        </div>
        <div class="modal-body">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col col-lg-12 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                  <div class="row g-0">
                    <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                      <h5><?= ($user->user_profile['first_name']) ?> <?= ($user->user_profile['last_name']) ?></h5>
                      <p class="text-white fw-bold">
                        <?php
                        if ($user->role == 0) {
                          echo 'Staff Member';
                        }
                        ?>
                      </p>

                    </div>
                    <div class="col-md-8">
                      <div class="card-body p-4">
                        <h6>Information</h6>
                        <hr class="mt-0 mb-4">
                        <div class="row pt-1">
                          <div class="col-6 mb-3">
                            <h6>Email</h6>
                            <p class="text-muted"><?= h($user->email) ?></p>
                          </div>
                          <div class="col-6 mb-3">
                            <h6>Phone</h6>
                            <p class="text-muted"><?= h($user->user_profile->contact) ?></p>
                          </div>
                        </div>

                        <div class="row pt-1">
                          <div class="col-6 mb-3">
                            <h6>Address</h6>

                            <?= h($user->user_profile->address) ?>
                          </div>
                          <div class="col-6 mb-3">
                            <h6>Most Viewed</h6>
                            <p class="text-muted">Dolor sit amet</p>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </section>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!----------------------------------Edit Profile With Modal------------------------------>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="py-4 text-center bg-dark text-white">
          <h5 class="modal-title text-white" id="exampleModalLongTitle">Update Details of <?= ($user->user_profile['first_name']) ?>'s Profile</h5>
        </div>
        <?php echo $this->Form->create(null, ["type" => "file", "id" => "useredit",]); ?>
        <div class="modal-body mx-5">
          <input type="hidden" id="iddd" name="iddd">
          <div class="input-group input-group-outline mb-3">
            <div class="col-12 mx-3">
              <?php echo $this->Form->control("user_profile.first_name", ["required" => false, "class" => "form-control px-3", "id" => "firstname"]); ?>
            </div>

            <div class="col-12 mx-3">
              <?php echo $this->Form->control('user_profile.last_name', ['required' => false, 'class' => 'form-control px-3', "id" => "lastname"]); ?>
            </div>

            <div class="col-12 mx-3">
              <?php echo $this->Form->control('user_profile.contact', ['required' => false, 'class' => 'form-control px-3', "id" => "contact"]); ?>
            </div>

            <div class="col-12 mx-3">
              <?php echo $this->Form->control('user_profile.address', ['required' => false, 'class' => 'form-control px-3', "id" => "address"]); ?>
            </div>

            <div class="col-12 mx-3">
              <?php echo $this->Form->control('email', ["type" => "email", 'required' => false, 'class' => 'form-control px-3', "id" => "editemail"]); ?>
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
        /* fallback for old browsers */
        background: #f6d365;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
      }
    </style>

