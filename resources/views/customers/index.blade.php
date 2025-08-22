<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
        }
        .search-form {
            max-width: 400px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <img src="https://customer-manager-static-minh-2025.s3.ap-southeast-2.amazonaws.com/logo.jpg" alt="Logo" class="logo">
            <h2>Customer Management</h2>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('customers.create') }}" class="btn btn-primary">Add New Customer</a>
            <a href="{{ route('customers.export') }}" class="btn btn-success">Export to CSV</a>
        </div>
        <form action="{{ route('customers.index') }}" method="GET" class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary">Search</button>
            </div>
        </form>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name <a href="{{ route('customers.index', ['sort' => 'name', 'direction' => 'asc']) }}">↑</a> <a href="{{ route('customers.index', ['sort' => 'name', 'direction' => 'desc']) }}">↓</a></th>
                    <th>Email <a href="{{ route('customers.index', ['sort' => 'email', 'direction' => 'asc']) }}">↑</a> <a href="{{ route('customers.index', ['sort' => 'email', 'direction' => 'desc']) }}">↓</a></th>
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
                            <a href="{{ route('customers.show', $customer) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
</body>
</html>