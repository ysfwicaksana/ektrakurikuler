

$(document).ready(function(){
    $("#data").DataTable();
    
    
    $("#tanggal-pembelian").datepicker({
        dateFormat : "yy-mm-dd"
    });
    
    $("#kategori").select2({ placeholder: "Pilih Kategori", allowClear: true });
    $("#bagian").select2({ placeholder: "Pilih Bagian", allowClear: true });
    $("#status").select2({ placeholder: "Pilih Bagian", allowClear: true });
    $("#supplier").select2({placeholder: "Pilih Bagian", allowClear: true });
});


