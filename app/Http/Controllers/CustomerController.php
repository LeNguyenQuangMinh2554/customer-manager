<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomersExport;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        // Tìm kiếm
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }

        // Sắp xếp
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            $direction = $request->input('direction', 'asc');
            $query->orderBy($sort, $direction);
        }

        $customers = $query->paginate(5); // Phân trang, 5 item/trang

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        Customer::create($request->all());

        return Redirect::route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $customer->update($request->all());

        return Redirect::route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return Redirect::route('customers.index')->with('success', 'Customer deleted successfully.');
    }

    public function export()
    {
        return Excel::download(new CustomersExport, 'customers.csv');
    }
}