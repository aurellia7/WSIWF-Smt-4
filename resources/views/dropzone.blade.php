<html>

<head>
    <title>Dropzone Image Upload in Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>

<script type="text/javascript">
    Dropzone.options.imageUpload = {
        maxFiles: 5,
        parallelUploads: 5, //jml file yang diupload bersamaan
        maxFilesize: 10, 
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        createImageThumbnails: true,
        autoProcessQueue: false,
        uploadMultiple: true,

        init: function () {
            var myDropzone = this;

            // AKSI KETIKA BUTTON UPLOAD DI KLIK
            $("#button").click(function (e) {
                e.preventDefault();
                myDropzone.processQueue();
            });

            this.on('sending', function (file, xhr, formData) {
                var data = $("#image-upload").serializeArray();
                $.each(data, function (key, el) {
                    formData.append(el.name, el.value);
                });
            });

            this.on('successmultiple', function (files, response) {
                console.log("Successfully uploaded files: ", response.success);
                alert("Upload Berhasil: " + response.success.join(', '));
            });

            this.on('errormultiple', function (files, response) {
                console.log("Failed to upload files: ", response);
                alert("Upload Gagal. Periksa kembali file yang diupload.");
            });
        }
    };
</script>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Dropzone Image Upload in Laravel</h1><br>
                <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data"
                    class="dropzone" id="image-upload">
                    @csrf
                    <h3 class="text-center">Upload Multiple Images</h3>
                </form>
            </div>
        </div>
        <div class="text-center mt-3">
            <button type="button" id="button" class="btn btn-primary">Upload</button>
        </div>
    </div>
</body>

</html>
