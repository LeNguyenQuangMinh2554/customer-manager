<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Customer Details</h2>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $customer->id }}</p>
                <p><strong>Name:</strong> {{ $customer->name }}</p>
                <p><strong>Email:</strong> {{ $customer->email }}</p>
                <p><strong>Phone:</strong> {{ $customer->phone }}</p>
                <p><strong>Address:</strong> {{ $customer->address }}</p>
                <a href="{{ route('customers.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</body>
</html>