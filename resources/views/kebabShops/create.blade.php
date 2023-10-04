<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- add form to create new kebabShop -->
    <form action="{{ route('shops.store')}}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}"><br>
        @error('name')
            <small>{{$message}}</small><br>
        @enderror

        <label for="description">Description:</label>
        <input type="text" name="description" value="{{ old('description') }}"><br>

        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ old('address') }}"><br>
        @error('address')
            <small>{{$message}}</small><br>
        @enderror

        <label for="latitude">Latitude:</label>
        <input type="text" name="latitude" value="{{ old('latitude') }}"><br>
        @error('latitude')
            <small>{{$message}}</small><br>
        @enderror

        <label for="longitude">Longitude:</label>
        <input type="text" name="longitude" value="{{ old('longitude') }}"><br>
        @error('longitude')
            <small>{{$message}}</small><br>
        @enderror

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ old('phone') }}"><br>
        @error('phone')
            <small>{{$message}}</small><br>
        @enderror

        <label for="is_open">Is Open:</label>
        <input type="checkbox" name="is_open" {{ old('is_open') ? 'checked' : '' }}><br>
        
        <label for="open_time">Open Time:</label>
        <input type="text" name="open_time" value="{{ old('open_time') }}"><br>
        @error('open_time')
            <small>{{$message}}</small><br>
        @enderror

        <label for="close_time">Close Time:</label>
        <input type="text" name="close_time" value="{{ old('close_time') }}"><br>
        @error('close_time')
            <small>{{$message}}</small><br>
        @enderror

        <label for="image">Image:</label>
        <input type="text" name="image" value="{{ old('image') }}"><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>