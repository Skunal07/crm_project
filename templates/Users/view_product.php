<div class="container mt-5 mb-5">
    <div class="card">
        <div class="row g-0">
            <div class="col-md-12 border-end">
                <div class="d-flex flex-column justify-content-center">
                    <div class="main_image my-3">
                        <!-- <img src="https://i.imgur.com/TAzli1U.jpg" id="main_product_image" width="100%"> -->
                        <?= $this->Html->image(h($product->product_image), array('id' => 'main_product_image')) ?>
                    </div>
                    <!-- <div class="thumbnail_images">
                        <ul id="thumbnail">
                            <li><img onclick="changeImage(this)" src="https://i.imgur.com/TAzli1U.jpg" width="70"></li>
                            <li><img onclick="changeImage(this)" src="https://i.imgur.com/w6kEctd.jpg" width="70"></li>
                            <li><img onclick="changeImage(this)" src="https://i.imgur.com/L7hFD8X.jpg" width="70"></li>
                            <li><img onclick="changeImage(this)" src="https://i.imgur.com/6ZufmNS.jpg" width="70"></li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 right-side">
                    <div class=" align-items-center">
                        <h3><?= h($product->product_name) ?></h3>
                        <h2>Category : <i><?= h($product->category->category_name) ?></i></h2>
                    </div>
                    <div class="mt-2 pr-3 content">
                        <h3><small><?= h($product->short_discription) ?></small></h3>
                    </div>
                    <h2><small><?= h($product->description) ?></small></h2>
                    <div class="ratings d-flex flex-row align-items-center">

                        <!-- <span>441 reviews</span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function changeImage(element) {
        var main_prodcut_image = document.getElementById('main_product_image');
        main_prodcut_image.src = element.src;
    }
</script>