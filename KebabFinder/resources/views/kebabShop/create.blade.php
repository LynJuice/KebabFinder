<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- add form to create new kebabShop -->
    <form action="kebabStore" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"><br>

        <label for="description">Description:</label>
        <input type="text" name="description" id="description"><br>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address"><br>

        <label for="latitude">Latitude:</label>
        <input type="text" name="latitude" id="latitude"><br>

        <label for="longitude">Longitude:</label>
        <input type="text" name="longitude" id="longitude"><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone"><br>

        <label for="is_open">Is Open:</label>
        <input type="checkbox" name="is_open" id="is_open"><br>

        <label for="open_time">Open Time:</label>
        <input type="text" name="open_time" id="open_time"><br>

        <label for="close_time">Close Time:</label>
        <input type="text" name="close_time" id="close_time"><br>

        <label for="image">Image:</label>
        <input type="text" name="image" id="image"><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>