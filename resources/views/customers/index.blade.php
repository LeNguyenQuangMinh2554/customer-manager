<img src="https://customer-manager-static-minh-2025.s3.ap-southeast-2.amazonaws.com/logo.jpg" alt="Logo" class="img-fluid" style="width: 150px; height: auto; margin-bottom: 20px;">
    <!DOCTYPE html>
    <html>
    <head>
        <title>Customer Management</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { padding-top: 20px; }
            .table-container { margin-top: 20px; }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="text-center">
                <h2 class="mt-5">Customer Management</h2>
                <a href="{{ route('customers.create') }}" class="btn btn-outline-primary mb-3">Add New Customer</a>
                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif
            </div>
            <div class="table-container">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>
                                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-outline-info btn-sm me-1">View</a>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-outline-warning btn-sm me-1">Edit</a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
               {{ $customers->links() }}
            </div>
            </div>
        </div>
    </body>
    </html>