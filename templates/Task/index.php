<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                <?php  if ($user->role == 1) {?>
                    <h6>Assign Task</h6>
                    <button type="button" class="btn btn-dark add-task" data-bs-toggle="modal" data-bs-target="#AddTaskModal" style='float: right;margin-top: -35px;'>Assign Task</button>
               <?php }?>
                <?php  if ($user->role == 0) {?>
                    <h6>My Task</h6>
               <?php }?>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0 product">
                        <table class="table align-items-center mb-0 mytable">
                        <?php  if ($user->role == 1) {?>
                            <thead>
                               
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sr. No.</th>
                                    <th class="text-center text-uppercase text-secondary float-start text-xxs font-weight-bolder opacity-7">Staff Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Added By</th>
                                    <th class="text-center text-uppercase text-secondary ps-4 text-xxs font-weight-bolder opacity-7 ps-2">Task Name</th>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Due Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">created at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">modified at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                </tr>
                             
                            </thead>
                            <tbody >
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
                                            <p class="text-sm text-dark ps-4 font-weight-bold mb-0"><?= ($tasks->assigned->user_profile['first_name']) ?> <?= ($tasks->assigned->user_profile['last_name']) ?></p>
                                        </td>
                                        <td class="align-middle text-start ps-4">
                                            <span class="text-dark text-sm font-weight-bold">
                                                <?= h($tasks->task_assigned->task_name) ?>
                                            </span>
                                        </td>
                                        <td class="align-middle text-start ps-4">
                                            <span class="text-dark text-sm font-weight-bold">
                                                <?= h($tasks->task_assigned->due_date) ?>
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
                            <?php }?>
                        <?php  if ($user->role == 0) {?>
                            <thead>
                               
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sr. No.</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Added By</th>
                                    <th class="text-center text-uppercase text-secondary ps-4 text-xxs font-weight-bolder opacity-7 ps-2">Task Name</th>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Due Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">created at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">modified at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                </tr>
                             
                            </thead>
                            <tbody >
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
                                            <p class="text-sm text-dark ps-4 font-weight-bold mb-0"><?= ($tasks->assigned->user_profile['first_name']) ?> <?= ($tasks->assigned->user_profile['last_name']) ?></p>
                                        </td>
                                        <td class="align-middle text-start ps-4">
                                            <span class="text-dark text-sm font-weight-bold">
                                                <?= h($tasks->task_assigned->task_name) ?>
                                            </span>
                                        </td>
                                        <td class="align-middle text-start ps-4">
                                            <span class="text-dark text-sm font-weight-bold">
                                                <?= h($tasks->task_assigned->due_date) ?>
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
                            <?php }?>
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
<!-- Modal for adding Task -->
<div class="modal fade" id="AddTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="py-4 text-center bg-dark ">
                <h5 class="modal-title text-white" id="exampleModalLabel">Assigned Task</h5>
            </div>
            <div class="modal-body">
                <?= $this->Form->create(null, ['id' => 'assigntask']) ?>


                <label for="task[user_id]" class="form-label">choose staff</label>
                <select name="user_id[]" id="multiple-select" class="form-control" multiple>
                    <?php foreach ($users as $user) : ?>
                        <option value="<?= h($user->id) ?>"><?= h($user->user_profile->first_name) ?></option>
                    <?php endforeach; ?>
                </select><br>
                <label for="task_name" class="form-label">Task Name</label>
                <?php
                echo $this->Form->textarea('task_assigned.task_name', ['class' => 'form-control']);
                ?>
                <br>

                <label for="due_date" class="form-label">Due Date</label>
                <?php
                echo $this->Form->dateTime('task_assigned.due_date', ['class' => 'form-control']);
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary harsh']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $("#multiple-select").select2({});
    });
</script>