<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <div class="panel-title">Data Ekskul</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php foreach ($set_siswa as $row_siswa) { ?>
                                        <?php $date = date_create($row_siswa->tanggal_lahir); $new_date = date_format($date,"d-F-Y"); ?>

                                            <label>Nama : </label> <?php echo $row_siswa->nama_siswa;?> <br/>
                                            <label>Kelas : </label> <?php echo $row_siswa->kelas;?><?php echo $row_siswa->jurusan;?><?php echo $row_siswa->rombel;?> <br/>
                                            <label>TTL  : </label> <?php echo $row_siswa->tempat_lahir;?>, <?php echo $new_date;?> <br/>
                                            <label for="nis">NIS :</label> <?php echo $row_siswa->nis;?>
                                        <?php } ?>        
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <label>Total Ekskul yang Diikuti: </label> <font color="red"><?php echo $total_ekskul;?></font>/3<br/>
                                        
                                    </div>
                                </div>
                                <?php if(empty($set_ekskul)) { ?>
                                    <div class="alert alert-danger">
                                        Anda belum mengikuti ekstrakurikuler satu pun
                                    </div>

                                <?php } else { ?>

                                    <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Ekstrakurikuler</th>
                                        <th>Lokasi</th>
                                        <th>Jadwal Ekskul</th>
                                        <th>Tanggal Daftar</th>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach($set_ekskul as $row_ekskul) { ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $row_ekskul->nama_ekskul;?></td>
                                                <td><?php echo $row_ekskul->lokasi;?></td>
                                                <td><?php echo $row_ekskul->hari;?>, <?php echo $row_ekskul->jam_mulai;?> - <?php echo $row_ekskul->jam_selesai;?></td>
                                                <td><?php echo $row_ekskul->tanggal_daftar;?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                <a href="#" class="act-btn" data-toggle="modal" data-target="#myModal">+</a>
				    <?php echo $this->session->flashdata('notify');?>
				    <?php echo validation_errors();?>
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Registrasi Ekskul</h3>
							<p class="panel-subtitle">User / Registrasi Ekskul</p>
						</div>
						<div class="panel-body">
						   <div class="table-responsive">
							<table class="display" id="data">
							    <thead>
							        <tr>
                                        <th>Nama Ekstrakurikuler</th>
							            <th>Penanggung Jawab</th>
							            <th>Lokasi Ekskul</th>
							            <th>Jadwal Ekskul</th>      
                                        <th>Opsi</th>
							        </tr>
							    </thead>
							    <tbody>
							        
                                    <?php  foreach($set as $row){ ?>
                                     
                                    <tr>
                                        <td><?php echo $row->nama_ekskul;?></td>
							            <td><?php echo $row->penanggung_jawab;?></td> 
							            <td><?php echo $row->lokasi;?></td>
                                        <td><?php echo $row->hari;?>, <?php echo $row->jam_mulai;?> - <?php echo $row->jam_selesai;?></td>
                                       
							            <td>
							                 <?php echo anchor('user/registered/'.$row->id_ekskul,'<button class="btn btn-success"><i class="fa fa-check"></i> Registrasi</button>',array('onclick' => 'return confirm("Anda yakin ingin mengikuti ekskul ini?")'));?> 
							            </td>
							            </tr>
							         <?php } ?>   
							        
							    </tbody>
							</table>
						</div>
                        </div>
					</div>
				
			<!-- END MAIN CONTENT -->
		</div>
    </div>
</div>