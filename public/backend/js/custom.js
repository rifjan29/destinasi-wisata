$(document).ready(function() {
    // photos preview
    $('#photos').change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $('#photosPreview')
                .attr("src",event.target.result);
            };
            reader.readAsDataURL(file);
        }
    })

    // kabupaten
    $('#provinsi').change(function(){
        var id_provinsi = $(this).val();
        if (id_provinsi) {
            $.ajax({
                type: "GET",
                url: "/getkab?provinsiId="+id_provinsi,
                // dataType: "JSON",
                success: function (data) {
                    $('#kabupaten').html(data);
                    // console.log(data);
                    // for (let i = 0; i < data.length;i++) {
                    //     let result = data[i];
                    //     // console.log(result);
                    //     $('#kabupaten').append('<option value="'+data[i].id+'">'+data[i].type +''+data[i].name+'</option>');
                    // }
                    // $.each(data, function(result){
                    //     // console.log(result);
                    // })
                    // $('#kabupaten').empty();
                    // $('#kabupaten').append('<option value="0"> Masukkan Keyword Kota/Kabupaten </option>')
                }
            })
        } else {
            $('#kabupaten').append('<option value="0"> Masukkan Keyword Kota/Kabupaten </option>')
        }
    })
    // kecamatan
    $('#kabupaten').change(function() {
        var id_kabupaten = $(this).val();
        if (id_kabupaten) {
            $.ajax({
                type: "GET",
                url: "/getkec?kabupatenId="+id_kabupaten,
                dataType: "JSON",
                success: function (data) {
                    // console.log(data);
                    $('#kecamatan').empty();
                    $('#kecamatan').append('<option> Masukkan Keyword Kecamatan </option>')
                    $.each(data, function(nama,id){
                        $('#kecamatan').append('<option value="'+id+'">'+nama+'</option>');
                    })
                }
            })
        }else{
            $('#kecamatan').append('<option> Masukkan Keyword Kecamatan </option>')

        }
    })
});
