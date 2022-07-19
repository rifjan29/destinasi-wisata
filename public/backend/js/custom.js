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

});
