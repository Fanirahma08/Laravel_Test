<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Employee</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('employees.create') }}" class="btn btn-md btn-success mb-3">ADD EMPLOYEE</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">ADDRES</th>
                                <th scope="col">ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($employees as $employee)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/employees/'.$employee->image) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->username }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->addres }}</td>
                         
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Employee Data Not Available.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
