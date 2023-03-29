<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Assign Task</h6>
                    <button type="button" class="btn btn-dark add-task" data-bs-toggle="modal" data-bs-target="#AddTaskModal" style='float: right;margin-top: -35px;'>Assign Task</button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0 product">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sr. No.</th>
                                    <th class="text-center text-uppercase text-secondary float-start text-xxs font-weight-bolder opacity-7">Staff Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Added By</th>
                                    <th class="text-center text-uppercase text-secondary ps-4 text-xxs font-weight-bolder opacity-7 ps-2">Task Name</th>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">created at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">modified at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="mytable">
                                <!-- <pre> -->
                                <?php
                                $i = 1;

                                foreach ($task as $tasks) :
                                    if ($tasks->delete_status == 1) {
                                        continue;
                                    }
                                ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span class="text-sm text-dark  font-weight-bold"><?= $i++ ?></span>
                                        </td>
                                        <td>
                                            <p class="text-sm text-dark ps-4 font-weight-bold mb-0"><?= ($tasks->user->user_profile['first_name']) ?> <?= ($tasks->user->user_profile['last_name']) ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm text-dark ps-4 font-weight-bold mb-0"><?= ($product->user->user_profile['first_name']) ?> <?= ($tasks->user->user_profile['last_name']) ?></p>
                                        </td>
                                        <td class="align-middle text-start ps-4">
                                            <span class="text-dark text-sm font-weight-bold">
                                                <?= h($product->category->category_name) ?>
                                            </span>
                                        </td>


                                        <td class="align-middle text-center">
                                            <span class="text-dark text-sm font-weight-bold">
                                                <?= h($tasks->created_date) ?>
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-dark text-sm font-weight-bold">
                                                <?php
                                                if ($tasks->modified_date == null) {
                                                    echo '--';
                                                } else {
                                                    echo h($tasks->modified_date);
                                                }

                                                ?>
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#ViewProduct" class="btn btn-success productView" data-id="<?= $tasks->id ?>">View</a>

                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#EditProduct" class="btn btn-primary productEdit" data-id="<?= $tasks->id ?>">Edit</a>

                                            <a href="javascript:void(0)" class="btn btn-danger deleteProducts" data-id="<?= $tasks->id ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
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
<!-- Modal for adding Products -->
<div class="modal fade" id="AddTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="py-4 text-center bg-dark ">
                <h5 class="modal-title text-white" id="exampleModalLabel">Assigned Task</h5>
            </div>
            <?= $this->Form->create(null, ['id' => 'assignetask']) ?>
            <div class="modal-body">


                <!-- <label for="user_id" class="form-label">Staff Name</label>
                <select name="user_id" id="user_id" class="form-control" multiple>
                    <option value="-1" disabled selected>--Choose Staff--</option>
                    <?php
                    foreach ($task as $cat) {
                        echo "<option value='$cat->id'>$cat->user->first_name</option>";
                    } ?>
                </select> -->

                <!-- <div id="user-list"></div>
                <select class="form-select list" aria-label="Default select example" name="list" id="user-list1">
                    <option selected>Select</option>
                </select> -->

                <select id="example-multiple-selected" multiple>
                    <?php foreach ($users as $user) : ?>
                    <option value="<?php echo $user->id ; ?>"><?= $user->user_profile->first_name .' ' . $user->user_profile->last_name; ?></option>
                    <?php 
                    endforeach;
                    ?>
                    <!-- <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    <option value="4">Option 4</option>
                    <option value="5">Option 5</option>
                    <option value="6">Option 6</option> -->
                </select>

                <br>

                <label for="task_name" class="form-label">Task Name</label>
                <?php
                echo $this->Form->textarea('task_name', ['class' => 'form-control']);
                ?>
                <br>

                <label for="due_date" class="form-label">Due Date</label>
                <?php
                echo $this->Form->dateTime('due_date', ['class' => 'form-control']);
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

<!--======================= Modal For View Products ==================-->
<div class="modal fade" id="ViewProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center bg-dark">
                <h5 class="modal-title text-white" id="exampleModalLabel">Product Details</h5>
            </div>
            <?= $this->Form->create() ?>
            <div class="modal-body">
                <section style="background-color: #eee;">
                    <div class="container py-5">
                        <div class="row justify-content-center">
                            <div class="card text-black">
                                <img src="" class="card-img-top" id="productImage" />

                                <div class="card-body">
                                    <div class="text-center">
                                        <h5 class="card-title" id="cardTitle"></h5>
                                        <div class="category-title">
                                            Category : <p class="text-muted mb-4" id="categoryName"></p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-info">Added By</span><span class="text-dark" id="smerName"></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-info">Created At</span><span class="text-dark" id="smeated"></span>
                                        </div>
                                        <span class="text-info">short Description</span>
                                        <div class="d-flex justify-content-between">
                                            <p id="short"></p>
                                        </div>
                                        <span class="text-info">Description</span>
                                        <div class="d-flex justify-content-between">
                                            <h6 id="description"></h6>
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
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<!--======================= Modal For Edit Products ==================-->
<div class="modal fade" id="EditProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center bg-dark">
                <h5 class="modal-title text-white" id="exampleModalLabel">Update Product Details</h5>
            </div>
            <?= $this->Form->create(null, ['type' => 'file', 'id' => 'productDetails']) ?>
            <input type="hidden" id="imagedd" name="imagedd">
            <input type="hidden" id="iddd" name="iddd">
            <input type="hidden" id="useridd" name="useridd">
            <div class="modal-body">
                <img src="" alt="" id='productImg' width="200px">
                <div class="col-12 my-3">
                    <?php echo $this->Form->control('product_image', ['type' => 'file', 'class' => 'form-control']); ?>
                </div>
                <div class="col-12 my-3">
                    <?php echo $this->Form->control('product_name', ['class' => 'form-control', 'id' => 'product_name']); ?>
                </div>
                <div class="col-12 my-3">
                    <?php echo $this->Form->label('short_discription'); ?>
                    <?php echo $this->Form->textarea('short_discription', ['class' => 'form-control', 'id' => 'short_discription']); ?>
                </div>
                <div class="col-12 my-3">
                    <?php echo $this->Form->label('description'); ?>
                    <?php echo $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'long_description']); ?>
                </div>
                <div class="col-12 my-3">
                    <?php echo $this->Form->control('product_tags', ['class' => 'form-control', 'id' => 'product_tags']); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example-multiple-selected').multiselect();
    });
</script>