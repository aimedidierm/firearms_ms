<form action="/admin" method="POST">
    <input type="text" name="name" value="{{$data->names}}">
    <input type="email" name="email" value="{{$data->email}}">
    <input type="text" name="address" value="{{$data->address}}">
    <input type="password" name="firstPassword" placeholder="Password" required>
    <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
    <input type="submit">
</form>