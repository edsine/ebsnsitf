<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="employers-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">ECS Number</th>
                    <th class="min-w-200px">Company Name</th>
                    <th class="min-w-200px">Company Email</th>
                    <th class="min-w-200px">Address</th>
                    <th class="min-w-200px">Rc Number</th>
                    <th class="min-w-200px">Company Phone</th>
                    <th class="min-w-200px">Local Govt</th>
                    <th class="min-w-200px">State</th>
                    <th class="min-w-200px">Business Area</th>
                    <th class="min-w-200px">Status</th>

                    <th class="min-w-120px" colspan="1">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employers as $employer)
                    <tr>
                        <td>{{ $employer->ecs_number }}</td>
                        <td>{{ $employer->company_name }}</td>
                        <td>{{ $employer->company_email }}</td>
                        <td>{{ $employer->company_address }}</td>
                        <td>{{ $employer->company_rcnumber }}</td>
                        <td>{{ $employer->company_phone }}</td>
                        <td>
                            @if($employer->company_localgovt)
                            {{$employer->localGovernment->name}}
                            @else
                            Not Specified
                            @endif
                        </td>
                        <td>{{ $employer->state->name }}</td>
                        <td>{{ $employer->business_area }}</td>
                        <td>
                            @if ($employer->status == 1)
                                Registered
                            @else
                                Pending
                            @endif
                        </td>

                        <td style="width: 120px">
                            {!! Form::open(['route' => ['employers.destroy', $employer->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('employers.show', [$employer->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('employers.edit', [$employer->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('employer.employees', [$employer->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-user"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!}
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