<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sub Cateegory</title>
</head>
<body>
    <form action="{{url('subcategory')}}" method='post'>
    @csrf
    <label> name </label>
    <input type="text" name='name'>
    <label> desc </label>
    <input type="text" name='description'>
    <label> catid </label>
    <input type="number" name='catid'>
    <input type="submit">
    </form>
</body>
</html>