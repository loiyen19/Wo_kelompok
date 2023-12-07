<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail Order</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <!-- form input mask -->
            <div class="col-md-7 col-sm-12  ">

                <div class="x_panel">
                    <div class="x_title">
                        <h2> Detail Orderan </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No. Orderan</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Ubah Status Order </th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php if (empty($detail)) : ?>
                                    <p class="text-danger">Detail Order Kosong !!</p>
                                <?php else : ?>
                                    <tr>
                                        <td width="40" class="text-center"><?php echo $detail->ID_orders; ?></td>
                                        <td width=""><?php echo $detail->ID_produk; ?></td>
                                        <td width=""><?php echo $detail->Jumlah; ?></td>
                                        <td width="">
                                            <div class="btn btn-small">
                                                <a href="<?php echo site_url('Orderan/ubah_status/' . $detail->ID_orders); ?>" class="btn btn-warning">Ubah</a>
                                            </div>
                                        </td>
                                        <td width="">
                                            <div class="btn btn-small">
                                                <a href="<?php echo site_url('Orderan/nota_pembelian/' . $detail->ID_orders); ?>" class="btn btn-warning">Ubah</a>
                                            </div>
                                        </td>
                                    </tr>

                                <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
