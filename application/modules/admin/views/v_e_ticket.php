<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Tables Page <small>Responsive tables</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Tables</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Menu</th>
                                            <th width="30%">Keluhan</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; $id = 1; $ids = 1;
                                         foreach ($tiket as $t) {
                                            $tiket_produk = '';
                                            if ($t->tiket_produk == 1) {
                                                $tiket_produk = 'MyOh';

                                            }elseif ($t->tiket_produk == 2) {
                                                $tiket_produk = 'PYXIS';
                                            }else{
                                                $tiket_produk = 'ALCOR';
                                            }
                                        ?>

                                        <tr> 
                                            <td><?=$no++?></td>
                                            <td><?=$tiket_produk?></td>
                                            <td><?=$t->menu?></td>
                                            <td><?=substr($t->tiket_pesan , 0, 100).'...'?></td>
                                            <td><?=$t->tiket_create?></td>
                                            <td>
                                              <?php
                                              if ($t->tiket_status == 1) {
                                               ?>
                                               <a href="<?=base_url('admin/folup')?>/<?=$t->tiket_id?>" class="btn btn-success" alt = "Fol up to Production"><i class="fa fa-check"></i></a>
                                               <?php
                                               }elseif($t->tiket_status==2){
                                                echo "Ter-Fol-Up";
                                               }
                                               elseif ($t->tiket_status == 3) {
                                                echo "DONE silahkan balas ke Customer"; 
                                               }elseif ($t->tiket_status == 4) {
                                                 
                                                 echo "Terkirim ke customer";
                                               }else{
                                                echo "ERROR";
                                               }
                                                ?>
                                                <button class="btn btn-warning" id = "baris_<?=$id++?>" onclick="showModal('<?=$ids++?>')" data-tiket_id = "<?=$t->tiket_id?>" data-produk = "<?=$tiket_produk?>" data-menu = "<?= $t->menu?>" data-pesan = "<?=$t->tiket_pesan?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-exclamation"></i></button>
                                              
                                            </td>
                                        </tr>
                                        <?php
                                        }  ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
        <div class="modal fade" id="myModal" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <div class="form-group">
                        <input type="" name="" id="tiket_id" hidden>
                        <input class="form-control" type="" name="" value="" id="tiket_produk" readonly="" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="" name="" value="" id="menu" readonly="" >
                    </div>
                    <div class="form-group">
                        <textarea id="tiket_pesan" style="height: 300px" class="form-control"readonly=""></textarea>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a id="link"><button type="button" class="btn btn-primary">Balas Tiket</button></a>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
            function showModal(tiket_id) {
                $('#myModal').on('shown.bs.modal', function () {
                  var baris = 'baris_'+tiket_id;
                  const link = document.getElementById(baris);
                  var id = link.dataset.tiket_id;
                  var produk = link.dataset.produk;
                  var menu = link.dataset.menu;
                  var pesan = link.dataset.pesan;
                  $('#tiket_id').val(id);
                  $('#tiket_produk').val(produk);
                  $('#menu').val(menu);
                  $('#tiket_pesan').val(pesan);
                  $('#link').attr("href", "<?=base_url('admin/balas_tiket/')?>"+id);
                })
            }
        </script>