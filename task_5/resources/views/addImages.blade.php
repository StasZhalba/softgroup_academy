<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <title>Upload a image</title>
</head>
<body>
<br>
<div class="col-lg-offset-4 col-lg-4">
    <center><h1>Upload file</h1></center>
    <form action="/task_5/store" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
        <input type="file" name="image[]" multiple accept="image/*">
        <br>
        <input type="submit" value="Upload">
    </form>
</div>
</body>
</html>