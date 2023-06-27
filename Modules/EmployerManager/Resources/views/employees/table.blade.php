<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="employees-table">
            <thead>
            <tr>
                <th>Employer Id</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Date Of Birth</th>
                <th>Gender</th>
                <th>Marital Status</th>
                <th>Email</th>
                <th>Employment Date</th>
                <th>Address</th>
                <th>Local Govt Area</th>
                <th>State Of Origin</th>
                <th>Phone Number</th>
                <th>Means Of Identification</th>
                <th>Identity Number</th>
                <th>Identity Issue Date</th>
                <th>Identity Expiry Date</th>
                <th>Next Of Kin</th>
                <th>Next Of Kin Phone</th>
                <th>Monthly Renumeration</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->employer_id }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->middle_name }}</td>
                    <td>{{ $employee->date_of_birth }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->marital_status }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->employment_date }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->local_govt_area }}</td>
                    <td>{{ $employee->state_of_origin }}</td>
                    <td>{{ $employee->phone_number }}</td>
                    <td>{{ $employee->means_of_identification }}</td>
                    <td>{{ $employee->identity_number }}</td>
                    <td>{{ $employee->identity_issue_date }}</td>
                    <td>{{ $employee->identity_expiry_date }}</td>
                    <td>{{ $employee->next_of_kin }}</td>
                    <td>{{ $employee->next_of_kin_phone }}</td>
                    <td>{{ $employee->monthly_renumeration }}</td>
                    <td>{{ $employee->status }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('employees.show', [$employee->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('employees.edit', [$employee->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $employees])
        </div>
    </div>
</div>
