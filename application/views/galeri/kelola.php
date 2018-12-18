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
                            <h3 class="panel-title">Galeri Ekstrakurikuler</h3>
                            
                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                            <table class="display" id="data">
                                <thead>
                                    <tr>
                                        <th>Dokumentasi</th>
                                        <th>Nama Ekstrakurikuler</th>
                                            
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php  foreach($set as $row){ ?>
                                     
                                    <tr>
                                        <td><img src="<?php echo base_url($row->path);?>" alt="<?php echo $row->nama_ekskul;?>" class="img-thumbnail" width="100" height="100"></td>
                                        <td><?php echo $row->nama_ekskul;?></td> 
                                       
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

