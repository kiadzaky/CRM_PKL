<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                             Forms Page <small>Best form elements.</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Forms</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
		
            <div id="page-inner"> 
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <?php 
                                            $tiket_produk = '';
                                            if ($tiket['tiket_produk'] == 1) {
                                                $tiket_produk = 'MyOh';

                                            }elseif ($tiket['tiket_produk'] == 2) {
                                                $tiket_produk = 'PYXIS';
                                            }else{
                                                $tiket_produk = 'ALCOR';
                                            }
                                        ?>
                                        <div class="form-group">
                                            <label>Produk</label>
                                            
                                            <input class="form-control" placeholder="Enter text" value="<?=$tiket_produk?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Menu</label>
                                            <input class="form-control" placeholder="Enter text" value="<?=$tiket['menu']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Pesan</label>
                                            <textarea style="height: 300px" class="form-control" placeholder="Enter text" readonly=""><?=$tiket['tiket_pesan']?></textarea>
                                        </div>
                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <form role="form" method="POST" >
                                        <div class="form-group">
                                            <label>Balas</label>
                                            <input type="" name="tiket_id" value="<?=$tiket['tiket_id']?>" hidden >
                                            <input type="" name="balas_tiket_id" value="<?=$balas_tiket['balas_tiket_id']?>" hidden>
                                            <textarea name="balas_tiket" style="height: 300px" class="form-control" placeholder="Enter text" required="" ><?=$balas_tiket['balas_tiket_pesan']?></textarea>
                                        </div>
                                        <?php if ($balas_tiket['balas_tiket_pesan'] <> '') {
                                            echo '<button type="submit" name="submit" class="btn btn-success">Edit</button>';
                                        }else{
                                            echo '<button type="submit" name="submit" class="btn btn-success">Balas</button>';
                                        } ?>
                                        
                                    </form>
                                    <br>    
                                        <a href="<?=base_url('admin/e_ticket')?>"><button type="reset" class="btn btn-danger">Kembali</button></a>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>