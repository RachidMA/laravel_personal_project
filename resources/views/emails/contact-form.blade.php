<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Email</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Contact Form Email</h1>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $data['name'] }}</p>
                <p><strong>Email:</strong> {{ $data['email'] }}</p>
                <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
                <p><strong>Message:</strong></p>
                <p>{{ $data['message'] }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Handyman:</strong></p>
                <p><strong>Name:</strong> {{ $data['handyman']->full_name }}</p>
                <p><strong>Email:</strong> {{ $data['handyman']->user->email }}</p>
                <p><strong>Phone:</strong> {{ $data['handyman']->phone }}</p>
            </div>
        </div>
    </div>
</body>
</html>
