<table class="table align-items-center mb-0 lead">
  <thead>
    <tr>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S.no</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Price($)</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Company Name</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Work Title</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Progress Stages</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Added By</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Modified Date</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
    </tr>
  </thead>
  <tbody id="mytable">
    <?php
    // print_r($products);die;
    $i = 1;
    $no=$leads->count();
    if($no > 0 ){
    foreach ($leads as $lead) :
      if ($lead->delete_status == 1) {
        continue;
      }
    ?>
      <tr id="data<?= $lead->id ?>">
        <td class="align-middle text-center">
          <span class="text-dark text-sm font-weight-bold"><?= $i++ ?></span>
        </td>

        <td class="text-capitalize ">
          <span class="text-dark text-sm font-weight-bold"><?= h($lead->name) ?></span>
        </td>

        <td class="align-middle text-center">
          <span class="text-dark text-sm font-weight-bold"><?= ($lead->price) ?></span>
        </td>
        <td class="">
          <span class="text-dark text-sm font-weight-bold"><?= ($lead->company->company_name) ?></span>
        </td>

        <td class="text-capitalize">
          <span class="text-dark text-sm font-weight-bold"><?= h($lead->work_title) ?></span>
        </td>
        <td class="align-middle text-start">
          <span class="text-dark text-sm font-weight-bold ps-3">
            <?php
            if ($lead->stages == 1) {
              echo 'Awerness';
            } else if ($lead->stages == 2) {
              echo 'Quilified';
            } else if ($lead->stages == 3) {
              echo 'Lost';
            } else if ($lead->stages == 4) {
              echo 'Completed';
            }
            ?>
          </span>
        </td>
        <td class="align-middle ">
          <span class="text-dark text-sm font-weight-bold ps-2">
            <?= h($lead->lead_contact['contact']) ?>
          </span>
        </td>
        <td class="align-middle text-start">
          <span class="text-dark text-sm font-weight-bold">
            <?= h($lead->user->user_profile['first_name']) ?> <?= h($lead->user->user_profile['last_name']) ?>
          </span>
        </td>
        <td class="align-middle ps-3">
          <span class="text-dark text-sm font-weight-bold">
            <?= h($lead->created_date) ?>
          </span>
        </td>
        <td class="align-middle ps-3">
          <span class="text-dark text-sm font-weight-bold">
            <?php
            if ($lead->modified_date == null) {
              echo '--';
            } else {
              echo h($lead->modified_date);
            }

            ?>
          </span>
        </td>
        <td class="align-middle text-center">
          <?php if ($lead->stages == 4) {?>
          <a disabled class="btn btn-success deactive w-50">Completed</a>
          <a href="javascript:void(0)" class="btn-delete-lead btn btn-warning w-50" data-id="<?= $lead->id ?>">Delete</a>
       <?php }elseif ($lead->stages == 3) {?>
        <a  class="btn btn-danger deactive w-50">lost</a>
        <a href="javascript:void(0)" class="btn-delete-lead btn btn-warning w-50" data-id="<?= $lead->id ?>">Delete</a>
        <?php }else{?>
          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-info viewLead" data-id="<?= $lead->id ?>">View</a>
          <a href="javascript:void(0)" data-toggle="modal" data-target="#editLeadModal" class="btn btn-primary editLead" data-id="<?= $lead->id ?>">Edit</a>

          <a href="javascript:void(0)" class="btn-delete-lead btn btn-danger" data-id="<?= $lead->id ?>">Delete</a>
        <?php }?></td>
      </tr>
    <?php endforeach;
    }else{
      echo '<td colspan="11" class="text-center fw-bold">No Results To Show</td>';
    } ?>
  </tbody>
</table>



<style>
  .deactive{
  pointer-events: none;
  /* cursor: default; */
  text-decoration: none;
  /* color: black; */
  }
</style>