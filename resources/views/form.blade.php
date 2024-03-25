<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/form/submit" method="POST">
        <label for="name">
            <input type="text" name="name">
        </label>
        <input type="submit" value="SUBMIT">
        <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
    </form>
</body>

</html>