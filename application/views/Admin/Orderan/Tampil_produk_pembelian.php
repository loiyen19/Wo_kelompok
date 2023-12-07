<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cek Out</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <!-- form input mask -->
            <div class="col-md-12 col-sm-12  ">

                <div class="x_panel">
                    <div class="x_title">
                        <h2> Detail Cek Out </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.Order</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Order</th>
                                    <th>Jam Order</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($order_temp as $val) {  ?>
                                    <tr>
                                        <th><?php echo $no; ?></th>
                                        <th><?php echo $val->Nama_produk; ?></th>
                                        <th><?php echo $val->Jumlah; ?></th>
                                        <th><?php echo format_indo(date($val->Tgl_order_temp));?></th>
                                        <th><?php echo $val-> Jam_order_temp;?></th>
                                        <th><?php echo $val-> Stok_temp;?></th>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>