<!--------------------------------------------------------- Start Form ----------------------------------------->

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Leads</h6>
          <div class="row">
            <div class="col-md-4">
              <select id="stage" class="form-control" width="200px">
                <option class="stage" value="" selected>All</option>
                <option class="stage" value="1">Awerness</option>
                <option class="stage" value="2">Quilified</option>
                <option class="stage" value="3">Lost</option>
                <option class="stage" value="4">Completed</option>
              </select>
            </div>

            <div class="col-md-8">
              <button type="button" class="btn btn-dark mx-2" data-bs-toggle="modal" data-bs-target="#AddLeadModal" style='float: right;'>New Lead</button>
              <button type="button" style='float: right;' class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#csvModal">
                Export/Import Lead File
              </button>
            </div>
          </div>
        </div>
        <!------------------------------------------ Add-----Lead----Modal ------------------------------------->

        <div class="modal fade" id="AddLeadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

              </div>
              <?= $this->Form->create(null, ['type' => 'file', 'id' => 'newlead']) ?>
              <div class="modal-body">

                <?php
                echo $this->Form->control('name', ['class' => 'form-control','maxlength'=>"50"]);
                ?>
                <br>
                <label for="company_id" class="form-label">Company Name</label>
                <select name="company_id" id="company_id" class="form-control">
                  <option value="-1" disabled selected>--Choose Company--</option>
                  <?php
                  foreach ($companies as $company) {
                    echo "<option value='$company->id' >$company->company_name</option>";
                  } ?>
                </select>

                <br>
                <?php
                echo $this->Form->control('price', ['class' => 'form-control','maxlength'=>"50"]);
                ?>
                <br>
                <?php
                echo $this->Form->control('work_title', ['class' => 'form-control','maxlength'=>"150"]);
                ?>
                <br>
                <!-- <label for="lead_contacts.contact" class="form-label">Contact</label> -->
                <?php
                echo $this->Form->control('lead_contact.contact', ['class' => 'form-control ','maxlength'=>"10"]);
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
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0 lead" id="myapp">
            <?= $this->element('flash/lead'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  .modal-dialog span {
    color: red;
  }
</style>

<!---------------------------------------------------------- End Form -------------------------------------------------------->

<!---------------------------------------------------------- View Form Modal -------------------------------------------------------->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Lead</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <div class="modal-body">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col col-lg-12 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                  <div class="row g-0">
                    <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                      <img src="" alt="Avatar" id="userPic" class="img-fluid my-5" style="width: 80px;" />
                      <h5>Added By</h5>
                      <p id="addedby"></p>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body p-4">
                        <h6>Information</h6>
                        <hr class="mt-0 mb-4">
                        <div class="row pt-1">
                          <div class="col-5 mb-3">
                            <h6>Name</h6>
                            <p id="conatct-name" class="text-muted"></p>
                          </div>
                          <div class="col-7 mb-3">
                            <h6>Price</h6>
                            <p id="contact-price" class="text-muted"></p>
                          </div>
                          <div class="col-6 mb-3">
                            <h6>Work Title</h6>
                            <p id="contact-title" class="text-muted"></p>
                          </div>
                          <div class="col-6 mb-3">
                            <h6>Contact</h6>
                            <p id="contact-phone" class="text-muted"></p>
                          </div>
                        </div>
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
<!-- ==============================export/import ========================= -->
<div class="modal fade" id="csvModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Lead</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">

            <?= $this->Form->create(null, ['type' => 'file', 'id' => 'newcsv']) ?>
            <div class="row">
              <div class="col-9">
                <input type="file" class="form-control" name="importcsv" accept=".csv" />
              </div>
              <div class="col-3">
                <input type="submit" class="form-control btn btn-primary" id="btncsv" value="Upload" />
              </div>
            </div>
            <?= $this->Form->end() ?>
          </div>
          <div class="col-md-12">
            <a type="button" href="/leads/export" class="btn btn-dark mx-2" style='float: right;'>Download Lead File</a>
            <a type="button" href="/leads/sampleCsv" class="btn btn-dark mx-2" style='float: right;'>Sample Format CSV</a>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--------------------------------------------------------Edit Lead With Modal------------------------------------------------------>


<div class="modal fade" id="editLeadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">View Lead</h5>

        <button type="button" class="btn-close text-dark" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create(null, ["type" => "file", "id" => "editLead",]); ?>
        <input type="hidden" id="leadid" name="leadid">
        <div class="input-group input-group-outline mb-3">
          <div class="row">
            <div class="col-12 my-3">
              <?php echo $this->Form->control(
                "name",
                [
                  "required" => false,
                  "class" => "form-control name",'maxlength'=>"50"
                ]
              ); ?>
            </div>
            <div class="col-12 my-3">
              <?php echo $this->Form->control(
                "price",
                [
                  "required" => false,
                  "class" => "form-control price",'maxlength'=>"10"

                ]
              ); ?>
            </div>
            <div class="col-12 my-3">
              <label for="stages">Progress</label>
              <?php echo $this->Form->select(
                'stages',
                [1 => 'Awerness', 2 => 'Quilified', 3 => 'Lost', 4 => "Won"],
                ['empty' => '(Select Stage)', 'class' => 'form-control stages']
              ); ?>
            </div>
            <div class="col-12 my-3">
              <?php echo $this->Form->control(
                "work_title",
                [
                  "required" => false,
                  "class" => "form-control work_title",'maxlength'=>"150"
                ]
              ); ?>
              <div class="col-12 my-3">
                <?php echo $this->Form->control(
                  "lead_contact.contact",
                  [
                    "required" => false, 
                    "class" => "form-control contact",'maxlength'=>"10"

                  ]
                ); ?>
              </div>
            </div>
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





  <script>
    $(document).on("click", "#stage", function() {
      var user_id = $('#stage').find(":selected").val();
      // alert(user_id);
      // return false;

      $.ajax({
        headers: {
          "X-CSRF-TOKEN": csrfToken,
        },
        url: "/leads/index/" + user_id,
        data: {
          user_id
        },
        type: "JSON",
        method: "get",
        success: function(response) {
          $('#myapp').html('');
          $('#myapp').append(response);
          console.log(response)
          // $('#lead').load('/leads/index #lead')

        }
      });
    })
  </script>