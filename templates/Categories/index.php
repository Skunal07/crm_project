<?php

use Cake\Core\Configure;
?>
<div class="container-fluid py-4">
  <div class="row" id="category">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Categories</h6>
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddcategoryModal" style='float: right;margin-top: -35px;'>New Category</button>
        </div>
        <div class="modal fade" id="AddcategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
              </div>
              <?= $this->Form->create(null, ['id' => 'newcategory']) ?>
              <div class="modal-body">
                <label for="category_name" class="form-label">Category Name</label>
                <?php
                echo $this->Form->input('category_name', ['class' => 'form-control']);
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

        <!-------------------------------Add Modal ---------------------------------->

        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0 ">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Added By</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Modified at</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($categories as $category) :

                  if ($category->delete_status == 1) {
                    continue;
                  } ?>
                  <tr id="data<?= $category->id ?>">
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="/img/company-logo.jpg" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= h($category->category_name) ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h6 class="mb-0 text-sm"><?= ($category->user->user_profile['first_name']) ?> <?= ($category->user->user_profile['last_name']) ?></h6>
                    </td>
                    <td class="align-middle text-center">
                      <h6 class="mb-0 text-sm"><?= h($category->created_date) ?></h6>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php
                                                                            if ($category->modified_date == null) {
                                                                              echo '--';
                                                                            } else {
                                                                            ?>
                          <h6 class="mb-0 text-sm"><?= h($category->modified_date) ?></h6>
                        <?php
                                                                            }

                        ?>
                      </span>
                    </td>
                    <td class="align-middle text-center">
                      <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#viewCategoryModal" class="btn btn-success viewCategories" data-id="<?= $category->id ?>">View</a>
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#editcategoryModal" class="btn btn-primary editCategories" data-id="<?= $category->id ?>">Edit</a>

                      <a href="javascript:void(0)" class="btn-delete-category btn btn-danger" data-id="<?= $category->id ?>">Delete</a>
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






<!--======================== View Profile With Modal =====================------->
<div class="modal fade" id="viewCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Category Details</h5>
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
                    <h5>Addeded By</h5>
                    <p id="addedby"> </p>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body p-4">
                      <h6>Information</h6>
                      <hr class="mt-0 mb-4">
                      <div class="row pt-1">
                        <div class="col-5 mb-3">
                          <h6>Category Name</h6>
                          <p id="category-name" class="text-muted"></p>
                        </div>
                        <div class="col-7 mb-3">
                          <h6>Created At</h6>
                          <p id="created" class="text-muted"></p>
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

<!---======================== Edit Category With Modal ============================-------->
<div class="modal fade" id="editcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button"class="btn-close text-dark"data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo $this->Form->create(null, ["type" => "file", "id" => "editcat",]); ?>
      <div class="modal-body">
        <input type="hidden" id="catiddd" name="catiddd">
        <div class="col-12">
          <?php echo $this->Form->control(
            "category_name",
            [
              "required" => false,
              "class" => "form-control",
              "id" => "name",
            ]
          ); ?>

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