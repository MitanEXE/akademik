function getkelas() {
  var ProgramKeahlian = document.getElementById("ProgramKeahlian").value;
  var pilihan = null;
  switch(ProgramKeahlian) {
    case "Rekayasa Perangkat Lunak (RPL)":
        pilihan = "1";
        break;
        case "Accounting (ACC)" : 
        pilihan = "2";
        break;
        case "Marketing (MKT)" : 
        pilihan = "3";
        break;
        case "Sekolah Menengah Pertama (SMP)" : 
        pilihan = "4";
        break;
        case "Sekolah Dasar (SD)" : 
        pilihan = "5";
        break;
  }

  // clear daftar
  var listkelas = document.getElementById("listkelas");
  while (listkelas.firstChild) {
      listkelas.removeChild(listkelas.firstChild);
  }


  $.ajax({
    url:'../akademik/kelas/listkelas/' + pilihan,
    type:'GET',
    dataType: 'json',
    success: function( json ) {
      $.each(json, function(i, value) {
        $('#listkelas')
        .append($('<option selected>' + value["kode_kelas"] + '</option>')
          .attr('value', value["kode_kelas"]));
      });
    }
  });
}