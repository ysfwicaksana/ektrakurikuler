<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                <a href="#" class="act-btn" data-toggle="modal" data-target="#myModal">+</a>
				    <?php echo $this->session->flashdata('notify');?>
				    <?php echo validation_errors();?>
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Kelola Ekskul</h3>
							<p class="panel-subtitle">Admin / Data Ekstrakurikuler</p>
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
							                <button class="btn btn-warning" onclick="edit_supplier(<?php echo $row->id_ekskul;?>)"><i class="fa fa-edit"></i> Edit</button>   
							                <button class="btn btn-success" onclick="dokumentasi(<?php echo $row->id_ekskul;?>)"><i class="fa fa-camera"></i> Unggah</button>
							                 <?php echo anchor('ekskul/destroy/'.$row->id_ekskul,'<button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>');
                                             ?>
                                             <?php echo anchor('ekskul/data-pendaftar/'.$row->id_ekskul,'<button class="btn btn-primary"><i class="fa fa-list"></i> Lihat Pendaftar</button>');
                                             ?>

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

<script>
    
    function dokumentasi(id){
        $('#form')[0].reset();
        $("#dokumentasi").modal('show');
        $('#id_ekskul').val(id);
        $('[name=submit]').val('Tambah').show();
        $('.modal-footer').show();

    }   
   
    function edit_supplier(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('ekskul/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_ekskul"]').val(data.id_ekskul);
            $('[name="nama_ekskul"]').val(data.nama_ekskul);
            $('[name="penanggung_jawab"]').val(data.penanggung_jawab);
            $('[name="lokasi"]').val(data.lokasi);
            $('[name="hari"]').val(data.hari);
            $('[name="jam_mulai"]').val(data.jam_mulai);
            $('[name="jam_selesai"]').val(data.jam_selesai);
            $('#myModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Ekskul'); // Set title to Bootstrap modal title
            $('[name=submit]').val('Edit').show();
            $('.modal-footer').show();
            $('#form').attr('action','<?php echo site_url('ekskul/update');?>');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax'+jqXHR);
        }
    });
    }
    
   
</script>
<div id="dokumentasi" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Dokumentasi</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('dokumentasi/create',array('id' => 'form' ,'class' => 'dropzone'));?>
                <input type="hidden" name="id_ekskul" id="id_ekskul">
            </div>
            <div class="modal-footer">
            <input type="submit" name="submit" value="Selesai" class="btn btn-success" id="button-disabled">
            <?php echo form_close();?>
        </div>
        </div>
    </div>

</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Siswa</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('ekskul/create',array('id' => 'form'));?>
        
         
                <input type="hidden"  name="id_ekskul"/>

                <div class="form-group" id="pengguna">
                    <label>Nama Ekstrakurikuler</label>
                    <input type="text" name="nama_ekskul" class="form-control">
                </div>
               
                <div class="form-group" id="email">
                    <label>Penanggung Jawab</label>
                    <input type="text" name="penanggung_jawab" class="form-control">
                </div>
                 
                <div class="form-group" id="email">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control">
                </div>

                <div class="form-group" id="email">
                    <label>Hari</label>
                    <select name="hari" class="form-control">
                        <option value="senin">Senin</option>
                        <option value="selasa">Selasa</option>
                        <option value="rabu">Rabu</option>
                        <option value="kamis">Kamis</option>
                        <option value="jumat">Jumat</option>
                        <option value="sabtu">Sabtu</option>
                        <option value="minggu">Minggu</option>
                    </select>
                </div>
                <div class="form-group" id="email">
                    <label>Jam Mulai</label>
                    <input type="time" name="jam_mulai" id="jam_mulai" class="form-control">
                </div>
                 <div class="form-group" id="email">
                    <label>Jam Selesai</label>
                    <input type="time" name="jam_selesai" id="jam_selesai" class="form-control">
                </div>
        <div class="modal-footer">
            <input type="submit" name="submit" value="Tambah" class="btn btn-success" id="button-disabled">
            <?php echo form_close();?>
        </div>
      </div>
      
    </div>

  </div>
</div>

