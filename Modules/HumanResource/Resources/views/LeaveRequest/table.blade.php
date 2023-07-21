<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="departments-table">
            <thead>
            <tr>
                <th> STATFF ID</th>
                <th>TYPE OF LEAVE</th>
                <th>NEW LEAVE DATE</th>
                <th>NUMBER OF DAYS</th>
                <th>OFFICER RELIEVER</th>
                <th>LEAVE END DATE</th>
                <th>SUPERVISOR APPROVAL</th>
                <th>MD HR STATUS</th>
                <th>LEAVER OFFICER STATUS</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            
            <tbody>
            @foreach($leaverequest as $leaves)
                <tr>
                    <td>{{ $leaves->id }}</td>
                    <td>{{ $leaves->type }}</td>
                    <td>{{ $leaves->date_start_new}}</td>
                    <td>{{ $leaves->number_days }}</td>
                    
                    <td>{{ $leaves->officer_relieve }}</td>
                    <td>{{ $leaves->end_date }}</td>
                    
                    {{-- <td>{{ $leaves->branch ? $leaves->branch->branch_name : '' }}</td> --}}
                    {{-- <td>
                        <img style="width: 50px;height: 50px" src="{{ url('storage/') }}{!! '/'.$leaves->signature !!}" alt="Image">
                    </td> --}}
                    <td>
                        <p> @if (isset($leaves->regional_manager_status) && $leaves->regional_manager_status == 1)
                            <span class="btn btn-sm btn-success">Approved</span>
                        @else
                            <span class="btn btn-sm btn-secondary">Unapproved</span>
                        @endif
                            </p>
                        </td>
                    <td>
                        <p> @if (isset($leaves->head_office_status) && $leaves->head_office_status == 1)
                            <span class="btn btn-sm btn-success">Approved</span>
                        @else
                            <span class="btn btn-sm btn-secondary">Unapproved</span>
                        @endif
                            </p>
                        </td>
                    <td>
                        <p> @if (isset($leaves->head_office_status) && $leaves->head_office_status == 1)
                            <span class="btn btn-sm btn-success">Approved</span>
                        @else
                            <span class="btn btn-sm btn-secondary">Unapproved</span>
                        @endif
                            </p>
                        {{ $leaves->medical_team_status }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['leave_request.destroy', $leaves->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('leave_request.show', [$leaves->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('leave_request.edit', [$leaves->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $leaverequest]) 
        </div>
    </div>
</div>
