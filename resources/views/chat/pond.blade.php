<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroChat</title>

</head>
<body>

<link rel="stylesheet" type="text/css" href="/package/build/assets/css/chat.css"/>

<input type="file" id="form" name="file" onchange="" class="custom-file-input" id="chooseFile">

<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet"/>

<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="form"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

    FilePond.setOptions({
        server: {
            url: "/fileUpload",
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        }
    })
    console.log(pond.name);
</script>

</body>
</html>
