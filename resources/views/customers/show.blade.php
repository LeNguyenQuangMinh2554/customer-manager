<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,.08);
        }
        .detail-label {
            font-weight: 600;
            color: #495057;
            width: 120px;
        }
        .detail-row {
            padding: .6rem 0;
            border-bottom: 1px solid #e9ecef;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .btn {
            border-radius: 10px;
            padding: .55rem 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card p-4">
                    <h3 class="mb-4 text-center fw-bold">👤 Customer Details</h3>
                    
                    <div class="detail-row d-flex">
                        <div class="detail-label">ID:</div>
                        <div>{{ $customer->id }}</div>
                    </div>
                    <div class="detail-row d-flex">
                        <div class="detail-label">Name:</div>
                        <div>{{ $customer->name }}</div>
                    </div>
                    <div class="detail-row d-flex">
                        <div class="detail-label">Email:</div>
                        <div>{{ $customer->email }}</div>
                    </div>
                    <div class="detail-row d-flex">
                        <div class="detail-label">Phone:</div>
                        <div>{{ $customer->phone }}</div>
                    </div>
                    <div class="detail-row d-flex">
                        <div class="detail-label">Address:</div>
                        <div>{{ $customer->address }}</div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('customers.index') }}" class="btn btn-primary">
                            ← Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
