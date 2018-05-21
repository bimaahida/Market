<!-- Cart item -->
<div class="container-table-cart pos-relative">
    <div class="wrap-table-shopping-cart bgwhite">
        <table class="table-shopping-cart">
            <tr class="table-head">
                <th class="column-1"></th>
                <th class="column-2">Product</th>
                <th class="column-3">Price</th>
                <th class="column-4 p-l-70">Quantity</th>
                <th class="column-5">Total</th>
            </tr>
            <form  method="post" action="<?php echo site_url('transaksi/update_cekout/'.$this->session->userdata('transaksi_id'))?>">
                <?php $total =0; $i = 0; foreach ($transaksi as $key) { ?>
                    <tr class="table-row">
                        <td class="column-1">
                            <a href="<?php echo base_url()?>/transaksi/delete_cekout/<?=$key->id?>">
                                <div class="cart-img-product b-rad-4 o-f-hidden">
                                    <img src="<?php echo base_url() ?>assets/upload/<?= $key->gambar?>" alt="IMG-PRODUCT">
                                </div>
                            </a>
                        </td>
                        <td class="column-2"><?= $key->nama?></td>
                        <td class="column-3">Rp. <?= $key->harga?></td>
                        <td class="column-4">
                            <div class="flex-w bo5 of-hidden w-size17">
                                <!-- <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button> -->
                                <input class="size12 t-center" type="number" name="num-product<?=$i?>" min="1" max="<?= $key->stok ?>" value="<?= $key->jumlah?>">
                            </div>
                        </td>
                        <td class="column-5">Rp. <?php $harga = $key->harga * $key->jumlah; echo $harga;   ?></td>
                    </tr>
                <?php $total += $harga;  $i++; } ?>
        </table>
    </div>
</div>

<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
    <div class="flex-w flex-m w-full-sm">
    </div>

    <div class="size10 trans-0-4 m-t-10 m-b-10">
        <!-- Button -->
        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
            Update Cart
        </button>
    </div>
</div>
</form>

<!-- Total -->
<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
    <h5 class="m-text20 p-b-24">
        Cart Totals
    </h5>

    <!--  -->
    <div class="flex-w flex-sb-m p-b-12">
        <span class="s-text18 w-size19 w-full-sm">
            Subtotal:
        </span>

        <span class="m-text21 w-size20 w-full-sm">
            Rp. <?= $total?>
        </span>
    </div>

    <!--  -->
    <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
        <span class="s-text18 w-size19 w-full-sm">
            Shipping:
        </span>

        <div class="w-size20 w-full-sm">
            <p class="s-text8 p-b-23">
                No Rekening Admin
            </p>

            <!-- <span class="s-text19">
                Metode Pengiriman
            </span>

            <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
                <select class="selection-2" name="country">
                    <option>JNE</option>
                    <option>GOJEK</option>
                </select>
            </div>
            <div class="size14 trans-0-4 m-b-10">
               
                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    Update Totals
                </button>
            </div> -->
        </div>
    </div>

    <!--  -->
    <div class="flex-w flex-sb-m p-t-26 p-b-30">
        <span class="m-text22 w-size19 w-full-sm">
            Total:
        </span>

        <span class="m-text21 w-size20 w-full-sm">
            Rp. <?= $detail->total + $detail->ongkir?>
        </span>
    </div>

    <div class="size15 trans-0-4">
        <a href="<?php echo base_url()?>transaksi/finis_cekout/<?= $this->session->userdata('transaksi_id')?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Proceed to Checkout</a>
        <br>
        <a href="<?php echo base_url()?>transaksi/cancle_cekout/<?= $this->session->userdata('transaksi_id')?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Cancle Checkout</a>
    </div>
</div>