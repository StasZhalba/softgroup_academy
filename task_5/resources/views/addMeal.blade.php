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
    <center><h1>Add meal</h1></center>
    <form action="/task_5/meal/save" method="post">
        {{csrf_field()}}
        <label for="mealName">Назва страви: </label>
        <input type="text" id="mealName" name="mealName" required><br>
        <select name="cuisines" required>
            <option value="">Вибрати</option>
            @foreach($cuisines as $cuisine)
                <option value="{{$cuisine->id}}">{{$cuisine->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Save">
    </form>
</div>
</body>
</html>