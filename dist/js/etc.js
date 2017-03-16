$(document).ready(function(){
    $('#listparent').on('change',function(k){
       var e = $('#listparent option:selected').val();
       $('#parent_id').val(e);
    });
    $('#list_news').on('change',function(k){
       var ek = $('#list_news option:selected').val();
       $('#news_id').val(ek);
    });
    $('#list_kate').on('change',function(k){
       var ep = $('#list_kate option:selected').val();
       $('#Categories_id').val(ep);
    });
     $('#listlevel').on('change',function(k){
       var ed = $('#listlevel option:selected').val();
       $('#level').val(ed);
    });
     $('#listunit').on('change',function(k){
       var et = $('#listunit option:selected').val();
       $('#parent_unit').val(et);
    });
      $('#listeselon').on('change',function(k){
       var etw = $('#listeselon option:selected').val();
       $('#eselon').val(etw);
    });
       $('#listsatuankerja').on('change',function(k){
           var etwi = $('#listsatuankerja option:selected').val();
           $('#parent_satuan_kerja').val(etwi);
        });
       $('#metode').on('click',function(){
           var etwi = $('#metode option:selected').val();
           if(etwi =='transfer'){
            $('#akun_bank').show();
           } else if(etwi == 'cod'){
            $('#akun_bank').hide();
           } 
        });
      $(".textarea").wysihtml5();
      $(".select2").select2();
      $("#table1").DataTable();
      $.datepicker.setDefaults($.datepicker.regional['id']);
      $('#tanggal_lulus').datepicker({format: 'dd MM yyyy'});
      $('#tanggal_sttb').datepicker({format: 'dd MM yyyy'});
      $('#tanggal_pengangkatan_cpns').datepicker({format: 'dd MMy yyy'});
      $('#tanggal_sk_pangkat').datepicker({format: 'dd MM yyyy'});
      $('#tanggal_mulai_pangkat').datepicker({format: 'dd MM yyyy'});
      $('#tanggal_selesai_pangkat').datepicker({format: 'dd MM yyyy'});
      $('#tanggal_sk_jabatan').datepicker({format: 'dd MM yyyy'});
      $('#tanggal_mulai_jabatan').datepicker({format: 'dd MM yyyy'});
      $('#tanggal_selesai_jabatan').datepicker({format: 'dd MM yyyy'});
      $('#tmt_eselon').datepicker({format: 'dd MM yyyy'});
      $('#tanggal_lahir').datepicker({format: 'dd MM yyyy'});
      $('#tanggal_nikah').datepicker({format: 'dd MM yyyy'});
      $('#tanggal_cerai').datepicker({format: 'dd MM yyyy'});
      $('#tanggal').datepicker({format: 'yyyy-mm-dd'});
  });
$(document).ajaxStart(function() { Pace.restart(); });
/*
 * Documentation JS script
 */
