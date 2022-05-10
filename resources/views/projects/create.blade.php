<form action="/project" method="POST">
    @csrf
    <input type="text" name="title">
    <input type="text" name="description">
    <input type="submit" value="submit">
</form>
