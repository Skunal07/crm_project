<!--------------------------------------------------------- Start Form ----------------------------------------->

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4" >
        <div class="card-header pb-0">
          <h6>Leads</h6>
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddLeadModal" style='float: right;margin-top: -35px;'>New Lead</button>
          <div class="col-md-3">
            <select  id="stage" class="form-control" width="200px">
              <option class="stage" value="" selected>All</option>
              <option class="stage" value="1">Awerness</option>
              <option class="stage" value="2">Quilified</option>
              <option class="stage" value="3">Lost</option>
              <option class="stage" value="4">Completed</option>
            </select>
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
                <label for="name" class="form-label">Name <span>*</span></label>
                <?php



                echo $this->Form->control('name', ['class' => 'form-control']);
                ?>
                <br>
                <?php
                echo $this->Form->control('price', ['class' => 'form-control']);
                ?>
                <br>
                <?php
                echo $this->Form->control('work_title', ['class' => 'form-control']);
                ?>
                <br>
                <!-- <label for="lead_contacts.contact" class="form-label">Contact</label> -->
                <?php
                echo $this->Form->control('lead_contact.contact', ['class' => 'form-control',  'type'=>'number']);
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
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-12 mb-4 mb-lg-0">
              <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">

                  <div class="col-md-8">
                    <div class="card-body p-4">
                      <h6>Lead Information</h6>
                      <hr class="mt-0 mb-4">
                      <div class="row pt-1">
                        <div class="col-6 mb-3">
                          <h6>Name</h6>
                          <p class="text-muted"><?= h($lead->name) ?></p>
                        </div>
                        <div class="col-6 mb-3">
                          <h6>Contact</h6>
                          <p class="text-muted"><?= h($lead->lead_contact->contact) ?></p>
                        </div>
                      </div>


                      <div class="row pt-1">
                        <div class="col-6 mb-3">
                          <h6>Price</h6>

                          <?= h($lead->price) ?>
                        </div>
                        <div class="col-6 mb-3">
                          <h6>Work Title</h6>
                          <p class="text-muted"><?= h($lead->work_title) ?></p>
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



<!--------------------------------------------------------Edit Lead With Modal------------------------------------------------------>


<div class="modal fade" id="editLeadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
       
        <button type="button" class="btn-close text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create(null, ["type" => "file", "id" => "editLead",]); ?>
        <input type="hidden" id="leadid" name="leadid">
        <div class="input-group input-group-outline mb-3">
          <div class="row">
            <div class="col-md-12">
              <?php echo $this->Form->control(
                "name",
                [
                  "required" => false,
                  "class" => "form-control name",
                ]
              ); ?>
            </div>
            <div class="col-md-12">
              <?php echo $this->Form->control(
                "price",
                [
                  "required" => false,
                  "class" => "form-control price",
                  
                ]
              ); ?>
            </div>
            <div class="col-md-12">
              <label for="stages">Progress</label>
              <?php echo $this->Form->select(
                'stages',
                [1 => 'Awerness', 2 => 'Quilified', 3 => 'Lost', 4 => "Won"],
                ['empty' => '(Select Stage)', 'class' => 'form-control', 'value' => 3]
              ); ?>
            </div>
            <div class="col-md-12">
              <?php echo $this->Form->control(
                "work_title",
                [
                  "required" => false,
                  "class" => "form-control work_title",

                ]
              ); ?>
              <div class="col-md-12">
                <?php echo $this->Form->control(
                  "lead_contact.contact",
                  [
                    "required" => false, 'type'=>'number',
                    "class" => "form-control contact",

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