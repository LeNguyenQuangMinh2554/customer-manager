<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .logo {
            width: 140px;
            margin-bottom: 10px;
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,.08);
        }
        .table thead th {
            background-color: #0d6efd;
            color: #fff;
            white-space: nowrap;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f5f7fb;
        }
        .btn-sm {
            border-radius: 8px;
        }
        .search-form input {
            border-radius: 12px 0 0 12px;
        }
        .search-form button {
            border-radius: 0 12px 12px 0;
        }
        .action-btns .btn {
            margin: 2px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        {{-- Header --}}
        <div class="text-center mb-4">
            <img src="https://customer-manager-static-minh-2025.s3.ap-southeast-2.amazonaws.com/logo.jpg" 
                 alt="Logo" class="logo img-fluid">
            <h2 class="fw-bold">Customer Management</h2>
        </div>

        {{-- Action buttons --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
            <div class="d-flex gap-2">
                <a href="{{ route('customers.create') }}" class="btn btn-primary">
                    ➕ Add Customer
                </a>
                <a href="{{ route('customers.export') }}" class="btn btn-success">
                    ⬇ Export CSV
                </a>
            </div>
            <form action="{{ route('customers.index') }}" method="GET" class="search-form d-flex">
                <input type="text" name="search" class="form-control" 
                       placeholder="Search by name or email" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary">Search</button>
            </form>
        </div>

        {{-- Success alert --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Customer table --}}
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0 align-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">
                                    Name 
                                    <a href="{{ route('customers.index', ['sort' => 'name', 'direction' => 'asc']) }}">↑</a>
                                    <a href="{{ route('customers.index', ['sort' => 'name', 'direction' => 'desc']) }}">↓</a>
                                </th>
                                <th scope="col">
                                    Email 
                                    <a href="{{ route('customers.index', ['sort' => 'email', 'direction' => 'asc']) }}">↑</a>
                                    <a href="{{ route('customers.index', ['sort' => 'email', 'direction' => 'desc']) }}">↓</a>
                                </th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col" class="text-center">Actions</th>
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
                                    <td class="text-center">
                                        <div class="action-btns d-flex justify-content-center flex-wrap">
                                            <a href="{{ route('customers.show', $customer) }}" class="btn btn-info btn-sm text-white">View</a>
                                            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-3 d-flex justify-content-center">
            {{ $customers->onEachSide(1)->links('pagination::bootstrap-5') }}

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
