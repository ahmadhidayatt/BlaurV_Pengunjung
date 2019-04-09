<?php

$query2 = mysqli_query($connect,"SELECT COUNT(*) as maxKode FROM tb_paket_gunung")or die(mysqli_error());
$query3 = mysqli_query($connect,"SELECT COUNT(*) as maxKode FROM tb_pengunjung")or die(mysqli_error());
$query4 = mysqli_query($connect,"SELECT COUNT(*) as maxKode FROM tb_membayar_pendakian where status_pembayaran = 'Lunas'")or die(mysqli_error());
$query5 = mysqli_query($connect,"SELECT COUNT(*) as maxKode FROM tb_membayar_pendakian where status_pembayaran = 'Belum Diverifik'")or die(mysqli_error());
$query6 = mysqli_query($connect,"SELECT * FROM `tb_paket_gunung` where status_kuota > 0")or die(mysqli_error());
$query7 = mysqli_query($connect,"SELECT * FROM `tb_paket_gunung` where status_kuota = 0")or die(mysqli_error()); 
$data2 = mysqli_fetch_array($query2);
$data3 = mysqli_fetch_array($query3);
$data4 = mysqli_fetch_array($query4);
$data5 = mysqli_fetch_array($query5);
$data6 = mysqli_fetch_array($query6);
$data7 = mysqli_fetch_array($query7);
$mobil = $data2['maxKode'];
$customer = $data3['maxKode'];
$transaksi = $data4['maxKode'];
$supir = $data5['maxKode'];
$okk_selesai = $data6['maxKode'];
$okk_aprove = $data7['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
?>
<div class="row">
    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $customer; ?></h2>
                                    <p class="m-b-0">Total Customer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $transaksi; ?></h2>
                                    <p class="m-b-0">Total Transaksi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $okk_pending; ?></h2>
                                    <p class="m-b-0">Order Pending</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-cart-arrow-down f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $okk_selesai; ?></h2>
                                    <p class="m-b-0">Order Selesai</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $supir; ?></h2>
                                    <p class="m-b-0">Supir Tersedia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-truck f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $mobil; ?></h2>
                                    <p class="m-b-0">Mobil Tersedia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="row bg-white m-l-0 m-r-0 box-shadow ">

                    <!-- column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Extra Area Chart</h4>
                                <div id="extra-area-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->

                    <!-- column -->
                    <div class="col-lg-4">
                        <
                    </div>
                    <!-- column -->
                </div>
                