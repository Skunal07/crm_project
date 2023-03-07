<div class="container-fluid py-4">
  <div class="row" id="company">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Companies</h6>
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddModal" style='float: right;margin-top: -35px;'>New Company</button>
          <!-- Modal -->
          <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                </div>
                <?= $this->Form->create(null, ['id' => 'newcompany']) ?>
                <div class="modal-body">
                  <label for="company_name" class="form-label">Company Name</label>
                  <?php
                  echo $this->Form->input('company_name', ['class' => 'form-control']);
                  ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                  <?= $this->Form->end() ?>
                </div>
              </div>
            </div>
          </div>


        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0 ">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Company Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Added By</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">created at</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">modified at</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($companies as $company) :
                  if ($company->delete_status == 1) {
                    continue;
                  }
                ?>
                  <tr id="data<?= $company->id ?>">
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="/img/company-logo.jpg" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= h($company->company_name) ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= ($company->user->user_profile['first_name']) ?> <?= ($company->user->user_profile['last_name']) ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= h($company->created_date) ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php
                                                                            if ($company->modified_date == null) {
                                                                              echo '--';
                                                                            } else {
                                                                              echo h($company->modified_date);
                                                                            }

                                                                            ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#companyView" class="btn btn-success viewCompany" data-id="<?= $company->id ?>">View</a>
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#companyEdit" class="btn btn-primary editCompany" data-id="<?= $company->id ?>">Edit</a>
                      <a href="javascript:void(0)" class="btn-delete-company btn btn-danger" data-id="<?= $company->id ?>">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


<!----------------------------------View Companies With Modal------------------------------>




<div class="modal fade" id="companyView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-12 mb-4 mb-lg-0">
              <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                  <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="" alt="Avatar" id="userPic" class="img-fluid my-5" style="width: 80px;" />
                    <h6>Added By</h6>
                    <p id="user-name"></p>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body p-4">
                      <h6>Information</h6>
                      <hr class="mt-0 mb-4">
                      <div class="row pt-1">
                        <div class="col-6 mb-3">
                          <h6>Company Name</h6>
                          <p id="company-name" class="text-muted"></p>

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

<!----------------------------------Edit Companies With Modal------------------------------>

<div class="modal fade" id="companyEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Company Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create(null, ["type" => "file", "id" => "companyEdits",]); ?>
        <input type="hidden" id="companyiddd" name="companyiddd">
        <div class="col-6 my-4">
          <?php echo $this->Form->control(
            "company_name",
            [
              "required" => false,
              "class" => "form-control",
              "id" => "companyname",
            ]
          ); ?>


  <div class="modal fade" id="companyEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Company</h5>
          <button type="button"  class="btn-close text-dark" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

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