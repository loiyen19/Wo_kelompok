  <!-- page content -->
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
              <div class="col-md-5 col-sm-12  ">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Keterangan Orderan</h2>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>No. Orderan</th>
                                      <th>Tanggal Order</th>
                                      <th>Jam Order</th>
                                  </tr>

                              </thead>
                              <tbody>
                                  <tr>
                                      <td width="40" class="text-center"><?php echo $detail->ID_order_temp ?></td>
                                      <td width=""><?php echo $detail->Tgl_order_temp ?></td>
                                      <td width=""><?php echo $detail->Jam_order_temp ?></td>
                                  </tr>

                              </tbody>
                          </table>

                      </div>
                  </div>


              </div>
              <!-- /form input mask -->
              <!-- form input knob -->
              <div class="col-md-12">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Rincian Orderan</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                          <div class="x_content">

                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th width="50" >No</th>
                                          <th>Nama Produk</th>
                                          <th>Jumlah</th>
                                          <th>Harga Satuan</th>
                                          <th>Total<small class="ml-2"> ( Jumlah * Harga )</small></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php $no=1; foreach($rincian as $val) { ?>
                                      <tr>
                                          <th scope="row"><?php echo $no++;?></th>
                                          <td><?php echo $val->Nama_produk; ?></td>
                                          <td><?php echo $val->Jumlah; ?></td>
                                          <td><?= number_format($val->Harga) ?></td>
                                          <td>Rp.<?= number_format($val->total_harga)?></td>
                                      </tr>
                                      <?php $no++; } ?>

                                      <tr>
                                        <td class="text-right font-weight-bold" colspan="4">Total Rp.</td>
                                        <td colspan="4">100.000.000</td>
                                      </tr>
                                      <tr>
                                        <td class="text-right font-weight-bold" colspan="4">Diskon</td>
                                        <td colspan="4"><i>10 %</i></td>
                                      </tr>
                                      <tr>
                                        <td class="text-right font-weight-bold" colspan="4">Grand Total <small>Rp.</small></td>
                                        <td colspan="4"><i>100.1000</i></td>
                                      </tr>
                                  </tbody>

                              </table>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- /form input knob -->
              <!-- form input knob -->
              <div class="col-md-12">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Data Customer</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                          <div class="x_content">
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <td class="text" width="500">Nama </td>
                                          <td> loiyen</td>
                                      </tr>
                                      <tr>
                                          <td class="text">Nomor Rekenening</td>
                                          <td> <i> 000023132123123</i></td>
                                      </tr>
                                      <tr>
                                          <td class="text">Email</td>
                                          <td>Loiyen@gmail.com</td>
                                      </tr>
                                      <tr>
                                          <td class="text">No.Telfon</td>
                                          <td>00000568484</td>
                                      </tr>
                                     
                                  </thead>
                              </table>
                          </div>
                          <h5><i>Bukti Pembayaran <small class="text-danger">*</small></i></h5>
                          <div class="x_content">
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <td class="text" width="500">Nama Customer </td>
                                          <td> loiyen</td>
                                      </tr>
                                      <tr>
                                          <td class="text">No. Orders</td>
                                          <td> <i> 2123123</i></td>
                                      </tr>
                                      <tr>
                                          <td class="text">Nominal</td>
                                          <td>Rp. </td>
                                      </tr>
                                      <tr>
                                          <td class="text">Jenis Bank</td>
                                          <td>BRI</td>
                                      </tr>
                                      <tr>
                                          <td class="text">No. Rekening</td>
                                          <td>BRI</td>
                                      </tr>
                                      <tr>
                                          <td class="text">Status Pembayaran</td>
                                          <td> Full</td>
                                      </tr>
                                      <tr>
                                          <td class="text">Bukti Pembayaran</td>
                                          <td><a href="#">Tampilkan Bukti</a></td>
                                      </tr>
                                     
                                  </thead>
                              </table>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- /form input knob -->

          </div>
      </div>
  </div>