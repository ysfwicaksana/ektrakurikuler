<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/klorofil-common.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/main.js');?>"></script>
<script src="<?php echo base_url('assets/js/toastr.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.timepicker.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dropzone.js');?>"></script>
<script type="text/javascript">
     <?php if($this->session->flashdata('success')){?>
        toastr.success("<?php echo $this->session->flashdata('success');?>");
     <?php } else if($this->session->flashdata('danger')){ ?>
        toastr.error("<?php echo $this->session->flashdata('danger');?>");
     <?php } else if($this->session->flashdata('warning')){ ?>
        toastr.warning("<?php echo $this->session->flashdata('warning');?>");
     <?php } else if($this->session->flashdata('info')){ ?>
        toastr.info("<?php echo $this->session->flashdata('info');?>");

     <?php } ?>
    //script untuk jadwal kegiatan 
    $(document).ready(function(){
        $("#jenis-kegiatan").select2();
        $("#partisipan").select2();
         $("#tanggal-mulai").datepicker({
              dateFormat: "yy-mm-dd"
         });
        $("#tanggal-selesai").datepicker({
             dateFormat: "yy-mm-dd"
        });
        $("#jam_mulai").timepicker({
            timeFormat:'H:i:s',
        })
        $("#jam_selesai").timepicker({
            timeFormat:'H:i:s',
        })
       
        $('[name="confirm"]').keyup(function(e){
            
            e.preventDefault();
            
            var confirm = $('[name="confirm"]').val();
            var password = $('[name="password"]').val();
            
            if(confirm == ''){
                $('#notif-confirm').text('*Sesuaikan Dengan Password Diatas').css({'color':'red','font-weight':'bold'});
                $("#button-disabled").attr('disabled','disabled');
            } else {
                
                if(confirm != password){
                    $('#notif-confirm').text(' Tidak Sesuai Dengan Password Diatas').css('color','red');
                    $("#button-disabled").attr('disabled','disabled');
                
                } else {
                   $('#notif-confirm').text(' Telah Sesuai Dengan Password Diatas').css('color','green');
                   $("#button-disabled").removeAttr('disabled','disabled');

                }
                
            }
        }); 
    });
    
  
</script>


</body>
</html>


