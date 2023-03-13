<!-------------------------------------- Add Contact Modal -------------------------------------------->

<div class="modal fade" id="AddContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contacts</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= $this->Form->create(null, ['id' => 'newcontact']) ?>
      <div class="modal-body">
        <label for="company_id" class="form-label">Company Name</label>
        <select name="company_id" id="company_id" class="form-control">
          <option value="-1" disabled selected>--Choose Category (Optional)--</option>
          <?php
          foreach ($companies as $comp) {
            echo "<option value='$comp->id' >$comp->company_name</option>";
          } ?>
        </select>
        <br>


        <?php
        echo $this->Form->control('address', ['class' => 'form-control']);
        ?>
        <br>
        <?php
        echo $this->Form->control('email', ['class' => 'form-control']);
        ?>
        <br>
        <?php
        echo $this->Form->control('phone', ['class' => 'form-control']);
        ?>
        <br>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4" id="contact">
        <div class="card-header pb-0">
          <h6>Contacts</h6>
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddContact" style='float: right;margin-top: -35px;'>Add Contacts</button>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0 contact">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Company Name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Added By</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                  <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th> -->
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Modified date</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($contacts as $contact) : ?>
                  <tr id="data<?= $contact->id ?>">



                    <td class="align-middle text-center">
                      <p> <?php  if($contact->company_id!= null){
                        echo $contact->company->company_name;
                      }else{
                        echo '--';
                      } ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <p> <?= ($contact->user->user_profile['first_name']) ?> <?= ($contact->user->user_profile['last_name']) ?></p>
                    </td>

                    <td class="align-middle text-center">
                      <?= h($contact->address) ?></td>

                    <td class="align-middle text-center">
                      <?= h($contact->email) ?></td>

                    <td class="align-middle text-center">
                      <?= h($contact->phone) ?></td>


                    <td class="align-middle text-center">
                      <?= h($contact->create_date) ?></td>

                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php
                                                                            if ($contact->modified_date == null) {
                                                                              echo '--';
                                                                            } else {
                                                                              echo h($contact->modified_date);
                                                                            }

                                                                            ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#contactView" class="btn btn-success viewcontact" data-id="<?= $contact->id ?>">View</a>
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#contactEdit" class="btn btn-primary editcontact" data-id="<?= $contact->id ?>">Edit</a>
                      <a href="javascript:void(0)" class="btn-delete-contact btn btn-danger" data-id="<?= $contact->id ?>">Delete</a>
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







<!----------------------------------View Profile With Modal------------------------------>




<div class="modal fade" id="contactView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Contacts Details</h5>
     <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-12 mb-4 mb-lg-0">
              <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                  <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="" alt="Avatar" id="userPic" class="img-fluid my-5" style="width: 80px;" />
                    <h5>Added By</h5>
                    <p id="user-name"></p>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body p-4">
                      <h6>Information</h6>
                      <hr class="mt-0 mb-4">
                      <div class="row pt-1">
                        <div class="col-6 mb-3">
                          <h6>Email</h6>
                          <p id="contactEmail" class="text-muted"></p>
                        </div>
                        <div class="col-6 mb-3">
                          <h6>Phone</h6>
                          <p id="conatctPhone" class="text-muted"></p>

                        </div>
                      </div>

                      <div class="row pt-1">
                        <div class="col-6 mb-3">
                          <h6>Address</h6>

                          <p id="conatct-address" class="text-muted"></p>
                        </div>
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


<!----------------------------------Edit Profile With Modal------------------------------>

<div class="modal fade" id="contactEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Contacts Details</h5>
        <button type="button"class="btn-close text-dark"data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create(null, ["type" => "file", "id" => "editContact",]); ?>
        <input type="hidden" id="contiddd" name="contiddd">
        <div class="col-12 my-3">
          <?php echo $this->Form->control(
            "address",
            [
              "required" => false,
              "class" => "form-control",
              "id" => "addresss",
            ]
          ); ?>
        </div>
        <div class="col-12 my-3">
          <?php echo $this->Form->control(
            "email",
            [
              "required" => false,
              "class" => "form-control",
              "id" => "emails",
            ]
          ); ?>
        </div>
        <div class="col-12 my-3">
          <?php echo $this->Form->control(
            "phone",
            [
              "required" => false,
              "class" => "form-control",
              "id" => "phones",
            ]
          ); ?>
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