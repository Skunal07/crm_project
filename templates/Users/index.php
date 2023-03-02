<!-- <?php
        /**
         * @var \App\View\AppView $this
         * @var iterable<\App\Model\Entity\User> $users
         */
        ?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('added_by') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= $user->user_id === null ? '' : $this->Number->format($user->user_id) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= $user->added_by === null ? '' : $this->Number->format($user->added_by) ?></td>
                    <td><?= h($user->status) ?></td>
                    <td><?= h($user->created_date) ?></td>
                    <td><?= h($user->modified_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
</div> -->


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/font/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Sidebar #3</title>
</head>

<body>


    <aside class="sidebar">
        <div class="toggle">
            <a href="#" class="js-menu-toggle menu-toggle">
                <span class="icon-mode_comment text-black"></span>
            </a>
        </div>
        <div class="side-inner">

            <div class="share">
                <h2>Get in touch</h2>
                <?= $this->Form->create() ?>
                <?php echo $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Enter your name']); ?>
                <?php echo $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Enter your email']); ?>
                <?php echo $this->Form->control('phone', ['class' => 'form-control', 'placeholder' => 'Enter your Mobile Number']); ?>
                <select class="form-select form-control" aria-label="Default select">
                    <option class="bg-secondary" value="Doors" selected>Doors</option>
                    <option class="bg-secondary" value="Windows">Windows</option>
                    <option class="bg-secondary" value="Doors and Windows">Doors and Windows</option>
                    <option class="bg-secondary" value="Others">Others</option>
                </select>
                <textarea class="form-control" name="" id="" cols="30" rows="5" placeholder="Write your message"></textarea>
                <input type="submit" class="btn btn-primary btn-block" value="Send">
                <?= $this->Form->end() ?>
            </div>

        </div>

    </aside>


    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand text-white fw-bold" href="#">DoorDekho.com</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto float-end">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
                <!-- <a class="btn btn-outline-light text-light fw-bold" type="button" href="/users/login">Login</a> -->
                <?= $this->Html->link("Login", ['controller' => 'users', 'action' => 'login'], ['class' => 'btn btn-outline-light fw-bold']) ?>
            </div>
        </nav>

        <div class="site-section">
            <div class="container">
                <div class="row justify-content-center">





                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex post-entry">
                                    <div class="custom-thumbnail">
                                        <img src="/img/person_1.jpg" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="post-content">
                                        <h3>How the gut microbes you're born with affect your lifelong health</h3>
                                        <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex post-entry">
                                    <div class="custom-thumbnail">
                                        <img src="/img/person_2.jpg" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="post-content">
                                        <h3>How the gut microbes you're born with affect your lifelong health</h3>
                                        <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex post-entry">
                                    <div class="custom-thumbnail">
                                        <img src="/img/person_3.jpg" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="post-content">
                                        <h3>How the gut microbes you're born with affect your lifelong health</h3>
                                        <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex post-entry">
                                    <div class="custom-thumbnail">
                                        <img src="/img/person_4.jpg" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="post-content">
                                        <h3>How the gut microbes you're born with affect your lifelong health</h3>
                                        <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex post-entry">
                                    <div class="custom-thumbnail">
                                        <img src="/img/person_1.jpg" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="post-content">
                                        <h3>How the gut microbes you're born with affect your lifelong health</h3>
                                        <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex post-entry">
                                    <div class="custom-thumbnail">
                                        <img src="/img/person_2.jpg" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="post-content">
                                        <h3>How the gut microbes you're born with affect your lifelong health</h3>
                                        <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex post-entry">
                                    <div class="custom-thumbnail">
                                        <img src="/img/person_3.jpg" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="post-content">
                                        <h3>How the gut microbes you're born with affect your lifelong health</h3>
                                        <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex post-entry">
                                    <div class="custom-thumbnail">
                                        <img src="/img/person_4.jpg" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="post-content">
                                        <h3>How the gut microbes you're born with affect your lifelong health</h3>
                                        <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </main>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>