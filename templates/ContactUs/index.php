<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Contact Us Request</h5>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0 productss">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone No</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Query</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Message</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">created at</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <pre> -->
                                <?php foreach ($contactUs as $contactU) :
                                    if ($contactU->delete_status == 1) {
                                        continue;
                                    }
                                ?>
                                    <tr>
                           
                                    <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= h($contactU->name) ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= h($contactU->email) ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= h($contactU->phone) ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= h($contactU->query_type) ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= h($contactU->message) ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= h($contactU->created_date) ?></span>
                                        </td>
                                        <td class="align-middle"><?php
                                                                    if ($contactU->work_status == 1) {
                                                                        echo '<span class="btn btn-success ml-3">Approval</span>';
                                                                        echo '<a href="javascript:void(0)" class="delete btn btn-dark ml-3" data-id="' . $contactU->id . '">Delete</a>';
                                                                    } else if ($contactU->work_status == 2) {
                                                                        echo '<span class="btn btn-danger m-3">Reject</span>';
                                                                        echo '<a href="javascript:void(0)" class="delete btn btn-dark ml-3" data-id="' . $contactU->id . '">Delete</a>';
                                                                    } else { ?>
                                                <a href="javascript:void(0)" class="response btn btn-info" data-id="<?= $contactU->id ?>">Respond</a>
                                                <a href="javascript:void(0)" class="reject btn btn-info ml-3" data-id="<?= $contactU->id ?>">Reject</a>
                                            <?php } ?>

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