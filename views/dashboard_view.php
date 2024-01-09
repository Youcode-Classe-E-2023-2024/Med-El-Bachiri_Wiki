<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="py-20 bg-red-500">
    <h1>add category</h1>
    <label for="catName">cat name :</label>
    <input id="catName" type="text">
    <button onclick="addCat()" type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
        Add
    </button>
</div>

<div>
    <p>display categories here</p>
    <div id="catGoHere">

    </div>
</div>
</body>
</html>