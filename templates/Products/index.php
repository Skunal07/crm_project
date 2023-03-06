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
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">created at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">modified at</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <pre> -->
                                <?php
                                if (count($products) > 0) {
                                    foreach ($products as $product) : ?>
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
                                            <?php if ($product->status == 1) : ?>
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
                                            <?php endif; ?>
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
                                                <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                        </ul>
                        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
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