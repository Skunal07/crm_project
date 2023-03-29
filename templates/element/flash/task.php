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
                                            <span class="text-dark text-sm font-weight-bold"><?= h($product->category->category_name) ?></span>
                                        </td>
                                        
                                  
                                        <td class="align-middle text-center">
                                            <span class="text-dark text-sm font-weight-bold"><?= h($tasks->created_date) ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-dark text-sm font-weight-bold"><?php
                                                                                                if ($tasks->modified_date == null) {
                                                                                                    echo '--';
                                                                                                } else {
                                                                                                    echo h($tasks->modified_date);
                                                                                                }

                                                                                                ?></span>
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