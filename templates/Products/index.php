<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Products</h6>
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddProductModal" style='float: right;margin-top: -35px;'>New Product</button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0 product">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Short Discription</th>
                                    <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">created at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">modified at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <pre> -->
                                <?php
                                if (count($products) > 0) {
                                    foreach ($products as $product) :
                                        if ($product->delete_status == 1) {
                                            continue;
                                        }
                                ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <?= $this->Html->image($product->product_image, ['class' => "avatar avatar-sm me-3"]); ?>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?= h($product->product_name) ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?= ($product->user->user_profile['first_name']) ?> <?= ($product->user->user_profile['last_name']) ?></p>
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
                                            <td class="align-middle">
                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#ViewProduct" class="btn btn-success productView" data-id="<?= $product->id ?>">View</a>

                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#EditProduct" class="btn btn-primary productEdit" data-id="<?= $product->id ?>">Edit</a>

                                                <a href="javascript:void(0)" class="btn btn-danger deleteProducts" data-id="<?= $product->id ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                } else {
                                    ?>
                                    <tr class="align-middle">
                                        <td colspan="7" class="text-center fw-bold">No Results To Show</td>
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
</div>
<style>
    .modal-dialog span {
        color: red;
    }
</style>
<!-- Modal for adding Products -->
<div class="modal fade" id="AddProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="py-4 text-center bg-dark ">
                <h5 class="modal-title text-white" id="exampleModalLabel">Add Products</h5>
            </div>
            <?= $this->Form->create(null, ['type' => 'file', 'id' => 'newproduct']) ?>
            <div class="modal-body">
                <?php
                echo $this->Form->control('product_name', ['class' => 'form-control']);
                ?>
                <br>
                <label for="category_id" class="form-label">Category Name</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="-1" disabled selected>--Choose Category--</option>
                    <?php
                    foreach ($categories as $cat) {
                        echo "<option value='$cat->id' >$cat->category_name</option>";
                    } ?>
                </select>
                <br>

                <?php
                echo $this->Form->control('product_tags', ['class' => 'form-control']);
                ?>
                <br>
                <label for="short_discription" class="form-label">Product Short Discription</label>
                <?php
                echo $this->Form->textarea('short_discription', ['class' => 'form-control']);
                ?>
                <br>
                <label for="description" class="form-label">Product Discription</label>
                <?php
                echo $this->Form->textarea('description', ['class' => 'form-control']);
                ?>
                <br>
                <label for="product_image" class="form-label">Product Images </label>
                <?php
                echo $this->Form->input('product_image', array('type' => 'file', 'class' => 'form-control'));
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
    <div class="modal-dialog modal-dialog-centered">
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
                                            <span class="text-info">Added By</span><span class="text-secondary" id="userName"></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-info">Created At</span><span class="text-secondary" id="created"></span>
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