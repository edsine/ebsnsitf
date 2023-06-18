<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="employers-table">
            <thead>
            <tr>
                <th>ECS Number</th>
                <th>Company Name</th>
                <th>Company Email</th>
                <th>Address</th>
                <th>Rc Number</th>
                <th>Phone</th>
                <th>Local Govt</th>
                <th>State</th>
                <th>Business Area</th>
                <th>Inspection Status</th>

                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employers as $employer)
                <tr>
                    <td>{{ $employer->ecs_number }}</td>
                    <td>{{ $employer->company_name }}</td>
                    <td>{{ $employer->company_email }}</td>
                    <td>{{ $employer->company_address }}</td>
                    <td>{{ $employer->company_rcnumber }}</td>
                    <td>{{ $employer->company_phone }}</td>
                    <td>{{ $employer->company_localgovt }}</td>
                    <td>{{ $employer->company_state }}</td>
                    <td>{{ $employer->business_area }}</td>
                    <td>{{ $employer->inspection_status }}</td>

                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['employers.destroy', $employer->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('employers.show', [$employer->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('employers.edit', [$employer->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="{{ route('employer.employees', [$employer->id]) }}"
                                class='btn btn-default btn-xs'>
                                 <i class="far fa-user"></i>
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
            @include('adminlte-templates::common.paginate', ['records' => $employers])
        </div>
    </div>
</div>
