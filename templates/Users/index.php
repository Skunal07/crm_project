<div class="site-section">

    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="/img/carousel-1.jpg" class="d-block w-100 carousel-img" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                    <p></p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="/img/carousel-2.jpg" class="d-block w-100 carousel-img" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                    <p></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/carousel-3.jpg" class="d-block w-100 carousel-img" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                    <p></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container my-3" id="myHeader">
    <?php
                        if ($id == 0) {
                            echo $this->Html->link(__("All"), ['action' => 'index'], ['class' => 'side-nav-link active profile-edit-btn']);
                        } else {
                            echo $this->Html->link(__("All"), ['action' => 'index'], ['class' => 'side-nav-link profile-edit-btn']);
                        }
                        ?>
   <?php
                        $count = 0;
                        foreach ($productc as $productc) : ?>
                            <?php
                            $count++;
                            if ($id == $productc->id) {
                                echo $this->Html->link(__($productc->category_name), ['action' => 'dashboard', $productc->id], ['class' => 'side-nav-link active profile-edit-btn']);
                            } else {
                                echo $this->Html->link(__($productc->category_name), ['action' => 'dashboard', $productc->id], ['class' => 'side-nav-link  profile-edit-btn']);
                            }
                            if ($count == 10) {
                                break;
                            }
                            ?>
                        <?php endforeach; ?>
    </div>
    <div class="container my-5">
        <div class="row">
            <?php 
            $i = 0;
            foreach($products as $p){
                $i++;
    if($i % 2 == 1){
            ?>
            
            <div class="col-12">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-5">
                        <?= $this->Html->image($p->product_image, ['class' => "img-fluid rounded-start"]); ?>
                        </div>
                        <div class="col-md-7">
                        <div class="card-body">
                                <h2 class="card-title"><?= $p->product_name ?></h2>
                                <small class="card-title"><?= $p->category->category_name ?></small>
                                <p class="card-text"><?= $p->short_discription ?></p>
                                <p class="card-text"><?= $p->description ?></p>
                                <p class="card-text"><small class="text-muted"><?= $p->created_date ?></small></p>
                            </div>-+````````---------------------------------------------------------
                        </div>
                    </div>
                </div>
            </div>
<?php }else{ ?>
    <div class="col-12">
        <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-7">
                            <div class="card-body">
                                <h2 class="card-title"><?= $p->product_name ?></h2>
                                <small class="card-title"><?= $p->category->category_name ?></small>
                                <p class="card-text"><?= $p->short_discription ?></p>
                                <p class="card-text"><?= $p->description ?></p>
                                <p class="card-text"><small class="text-muted"><?= $p->created_date ?></small></p>
                            </div>
                        </div>
                        <div class="col-md-5">
                        <?= $this->Html->image($p->product_image, ['class' => "img-fluid rounded-start"]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }}?>
    </div>


</div>