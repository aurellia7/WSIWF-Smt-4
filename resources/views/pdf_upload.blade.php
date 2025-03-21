<!DOCTYPE html>
<html>
<head>
    <title>Dropzone PDF Upload in Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Dropzone PDF Upload in Laravel</h1><br>
                <form action="{{ route('pdf.store') }}" method="POST" enctype="multipart/form-data"
                      class="dropzone" id="pdf-upload">
                    @csrf
                </form>
                <button type="button" id="button" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        Dropzone.options.pdfUpload = {
            maxFiles: 5,
            maxFilesize: 500,
            acceptedFiles: ".pdf",
            addRemoveLinks: true,
            autoProcessQueue: false,
            parallelUploads: 5,
            uploadMultiple: true,

            init: function () {
                var myDropzone = this;

                $("#button").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });

                myDropzone.on("success", function(file) {
                    console.log("Successfully uploaded: " + file.name);
                });

                myDropzone.on("error", function(file, response) {
                    console.log("Failed to upload: " + file.name);
                });
            }
        };
    </script>
</body>
</html>
