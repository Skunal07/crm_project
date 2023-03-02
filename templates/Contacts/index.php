<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Companies</h6>
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddContact" style='float: right;margin-top: -35px;'>Add Contacts</button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0 contact" >
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Company Id</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Id</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                                    <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Modified date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contacts as $contact) : ?>
                                    <tr>
                                           
                                        <td><?= $contact->has('company') ? $this->Html->link($contact->company->id, ['controller' => 'Companies', 'action' => 'view', $contact->company->id]) : '' ?></td>
                                               
                                        
                                        <td><?= $contact->has('user') ? $this->Html->link($contact->user->id, ['controller' => 'Users', 'action' => 'view', $contact->user->id]) : '' ?></td>
                                        
                                        <td class="align-middle text-center">
                                        <?= h($contact->address) ?></td>
                                        
                                        <td class="align-middle text-center">
                                        <?= h($contact->email) ?></td>
                                        
                                        <td class="align-middle text-center">
                                        <?= h($contact->phone) ?></td>
                                        
                                    
                                        <td class="align-middle text-center">
                                        <?= h($contact->create_date) ?></td>
                                        
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?php
                                            if ($contact->modified_date == null) {
                                                echo '--';
                                            } else {
                                                echo h($contact->modified_date);
                                            }

                                            ?></span>
                                        </td>
                                        <td class="align-middle">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $contact->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contact->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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

<!-------------------------------------- Modal -------------------------------------------->

<div class="modal fade" id="AddContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contacts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= $this->Form->create(null, ['id' => 'newcontact']) ?>
            <div class="modal-body">
                <label for="company_id" class="form-label">Company Name</label>
                <select name="company_id" id="company_id" class="form-control">
                    <option value="-1" disabled selected>--Choose Category--</option>
                    <?php
                    foreach ($companies as $comp) {
                        echo "<option value='$comp->id' >$comp->company_name</option>";
                    } ?>
                </select>
                <br>
                
                <?php
                echo $this->Form->control('address', ['class' => 'form-control']);
                ?>
                <br>
                <?php
                echo $this->Form->control('email', ['class' => 'form-control']);
                ?>
                <br>
                <?php
                echo $this->Form->control('phone', ['class' => 'form-control']);
                ?>
                <br>
                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>