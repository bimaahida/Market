<div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
        <div class="leftbar p-r-20 p-r-0-sm">
            <!--  -->
            <h4 class="m-text14 p-b-7">
                Categories
            </h4>

            <ul class="p-b-54">
                <?php foreach ($kategori as $key) { ?>
                    <li class="p-t-4">
                        <a href="<?php echo base_url()?>produk/index_customer/<?=$key->id?>" class="s-text13 active1">
                            <?= $key->nama?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <div class="search-product pos-relative bo4 of-hidden">
                <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

                <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                    <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
        <!-- Product -->
        <div class="row">
            <?php foreach ($produk as $key) { ?>
                <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative ">
                            <img src="<?php echo base_url() ?>assets/upload/<?= $key->gambar?>" alt="IMG-PRODUCT">

                            <div class="block2-overlay trans-0-4">
                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                    <a href="<?php echo base_url()?>produk/create_transaksi/<?= $key->id?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">Add to Cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="block2-txt p-t-20">
                            <a href="<?php echo base_url() ?>product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                <?= $key->nama?>
                            </a>

                            <span class="block2-price m-text6 p-r-5">
                                Rp. <?= $key->harga?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        

        <!-- Pagination -->
        <div class="pagination flex-m flex-w p-t-26">
            <div class="item-pagination flex-c-m trans-0-4" id="pagination">
            <!-- <a href="<?php echo base_url() ?>#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
            <a href="<?php echo base_url() ?>#" class="item-pagination flex-c-m trans-0-4">2</a> -->
        </div>
    </div>
</div>