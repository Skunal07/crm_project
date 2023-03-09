
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
    <?php
    // print_r($products);die;
    $i = 1;
    foreach ($leads as $lead) :
      if ($lead->delete_status == 1) {
        continue;
      }
    ?>
      <tr id="data<?= $lead->id ?>">
        <td class="align-middle text-center">
          <span class="text-secondary text-xs font-weight-bold"><?= $i++ ?></span>
        </td>

        <td class="align-middle text-center">
          <span class="text-secondary text-xs font-weight-bold"><?= h($lead->name) ?></span>
        </td>

        <td class="align-middle text-center">
          <span class="text-secondary text-xs font-weight-bold"><?= ($lead->price) ?></span>
        </td>

        <td class="align-middle text-center">
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
                                                                }  ?> </span>
        </td>
        <td class="align-middle text-center">
          <span class="text-secondary text-xs font-weight-bold"><?= h($lead->lead_contact->contact) ?></span>
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
        <td class="align-middle text-center">
          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success viewLead" data-id="<?= $lead->id ?>">View</a>
          <a href="javascript:void(0)" data-toggle="modal" data-target="#editLeadModal" class="btn btn-primary editLead" data-id="<?= $lead->id ?>">Edit</a>

          <a href="javascript:void(0)" class="btn-delete-lead btn btn-danger" data-id="<?= $lead->id ?>">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>