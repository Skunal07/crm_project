<!------------------------------------------------ User List -------------------------------------------->
<?php
$j = 0;
$k = 0;
if ($countall != null) {
?>
    <div class="container-fluid py-4">
        <div class="row">


            <div class="col-12">
                <div class="card mb-4">

                    <div class="card-header pb-0">

                        <h6>Users List</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0 staff">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contact Number</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                                    </tr>
                                </thead>
                                <tbody id="mytable">
                                    <?php
                                    foreach ($countall['user'] as $user) :
                                        if ($user != null) {
                                    ?>
                                            <tr id='data<?= $user->id ?>'>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <?= $this->Html->image($user->user_profile->profile_image, ["class" => "avatar avatar-sm me-3 border-radius-lg "]) ?>
                                                        </div>
                                                        <div class="text-capitalize d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"><?= h($user->user_profile->first_name) ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm"><?= h($user->email) ?></h6>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm"><?= h($user->user_profile->contact) ?></h6>
                                                </td>
                                                <td class="">
                                                    <h6 class="mb-0 text-sm"><?= h($user->user_profile->address) ?></h6>
                                                </td>


                                                <td class="">
                                                    <h6 class="mb-0 text-sm"><?= h($user->created_date) ?></h6>
                                                </td>



                                            </tr>
                                        <?php
                                        } else { ?>
                                            <tr>
                                                <td colspan="5" class="text-center fw-bold">No Results To Show</td>
                                            </tr>
                                    <?php
                                        }
                                    endforeach;

                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!------------------------------------------------Product List -------------------------------------------->


        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Products</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0 product">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Added By</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Name</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Short Discription</th>
                                            <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th> -->
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">created at</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">modified at</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mytable">
                                        <!-- <pre> -->
                                        <?php
                                        

                                        foreach ($countall['product'] as $product) :
                                            
                                        ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <?= $this->Html->image($product->product_image, ['class' => "avatar avatar-sm me-3"]); ?>
                                                            </div>
                                                            <div class="text-capitalize d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm"><?= h($product->product_name) ?></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-capitalize text-xs font-weight-bold mb-0"><?= ($product->user->user_profile['first_name']) ?> <?= ($product->user->user_profile['last_name']) ?></p>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold"><?= h($product->category->category_name) ?></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold"><?= h($product->short_discription) ?></span>
                                                    </td>
                                                    <!-- <?php if ($product->status == 1) : ?>
                                                <td class="align-middle text-center text-sm">
                                                    <?= $this->Form->postLink(
                                                                    __("InActive"),
                                                                    [
                                                                        "action" => "productstatus",
                                                                        $product->id,
                                                                        $product->status,
                                                                    ],
                                                                    ["class" => "badge badge-sm bg-gradient-danger"],
                                                                    [
                                                                        "confirm" => __(
                                                                            "Are you sure you want to Active # {0}?",
                                                                            $product->id
                                                                        ),
                                                                    ]
                                                                ) ?>
                                                </td>
                                            <?php else : ?>
                                                <td class="align-middle text-center text-sm"><?= $this->Form->postLink(
                                                                                                    __("Active"),
                                                                                                    [
                                                                                                        "action" => "productstatus",
                                                                                                        $product->id,
                                                                                                        $product->status,
                                                                                                    ],
                                                                                                    ["class" => "badge badge-sm bg-gradient-success"],
                                                                                                    [
                                                                                                        "confirm" => __(
                                                                                                            "Are you sure you want to InActive # {0}?",
                                                                                                            $product->id
                                                                                                        ),
                                                                                                    ]
                                                                                                ) ?>
                                                </td>
                                            <?php endif; ?> -->
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold"><?= h($product->created_date) ?></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold"><?php
                                                                                                                if ($product->modified_date == null) {
                                                                                                                    echo '--';
                                                                                                                } else {
                                                                                                                    echo h($product->modified_date);
                                                                                                                }

                                                                                                                ?></span>
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
        
<!------------------------------------------------Lead List -------------------------------------------->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Leads</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0 product">



                                <table class="table align-items-center mb-0 lead">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S.no</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price($)</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Work Title</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Progress Stages</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Added By</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Modified Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mytable">
                                        <?php
                                        // print_r($products);die;
                                        $i = 1;
                                        foreach ($countall['lead'] as $lead) :

                                        ?>
                                            <tr id="data<?= $lead->id ?>">
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $i++ ?></span>
                                                </td>

                                                <td class="text-capitalize align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= h($lead->name) ?></span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= ($lead->price) ?></span>
                                                </td>

                                                <td class="text-capitalize align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= h($lead->work_title) ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?php
                                                                                                            if ($lead->stages == 1) {
                                                                                                                echo 'Awerness';
                                                                                                            } else if ($lead->stages == 2) {
                                                                                                                echo 'Quilified';
                                                                                                            } else if ($lead->stages == 3) {
                                                                                                                echo 'Lost';
                                                                                                            } else if ($lead->stages == 4) {
                                                                                                                echo 'Completed';
                                                                                                            }
                                                                                                            ?> </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= h($lead->lead_contact['contact']) ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= h($lead->user->user_profile['first_name']) ?> <?= h($lead->user->user_profile['last_name']) ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= h($lead->created_date) ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?php
                                                                                                            if ($lead->modified_date == null) {
                                                                                                                echo '--';
                                                                                                            } else {
                                                                                                                echo h($lead->modified_date);
                                                                                                            }

                                                                                                            ?></span>
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

    <?php } ?>