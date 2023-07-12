<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="departments-table ">
            <thead>
            <tr>
                {{-- <th> TRAVEL PURPOSE</th> --}}
                <th>DESTINATION</th>
                <th>NUMBER OF DAYS</th>
                <th>TRAVEL DATE</th>
                <th>ARRIVAL DATE</th>
                <th>ESTIMATED EXPENSES</th>
                <th>SUPERVISOR STATUS</th>
                <th>HOD STATUS</th>
                <th>MD STATUS</th>
                <th>ACCOUNT STATUS</th>
                <th>APPROVAL STATUS</th>
                <th>STATUS</th>
                {{-- <th>UPLOADED DOC</th> --}}
                <th>ACCOUNT STATUS</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dtarequests as $dtarequests)
                <tr>
                    <td>{{ $dtarequests->destination }}</td>
                    <td>{{ $dtarequests->number_days }}</td>
                    <td>{{ $dtarequests->travel_date}}</td>
                    <td>{{ $dtarequests->arrival_date}}</td>
                    <td>{{ $dtarequests->estimated_expenses}}</td>
                    <td>{{ $dtarequests->supervisor_status}}</td>
                    <td>{{ $dtarequests->hod_status}}</td>
                    <td>{{ $dtarequests->md_status}}</td>
                    <td>{{ $dtarequests->account_status}}</td>
                    <td>{{ $dtarequests->approval_status}}</td>
                    <td>{{ $dtarequests->status}}</td>
                    
                    <td>
                        <p> @if (isset($dtarequests->regional_manager_status) && $dtarequests->regional_manager_status == 1)
                            <span class="btn btn-sm btn-success">Approved</span>
                        @else
                            <span class="btn btn-sm btn-danger">Unapproved</span>
                        @endif
                            </p>
                        </td>
                    <td>
                        <p> @if (isset($dtarequests->head_office_status) && $dtarequests->head_office_status == 1)
                            <span class="btn btn-sm btn-success">Approved</span>
                        @else
                            <span class="btn btn-sm btn-danger">Unapproved</span>
                        @endif
                            </p>
                        </td>
                    <td>
                        <p> @if (isset($dtarequests->head_office_status) && $dtarequests->head_office_status == 1)
                            <span class="btn btn-sm btn-success">Approved</span>
                        @else
                            <span class="btn btn-sm btn-danger">Unapproved</span>
                        @endif
                            </p>
                        {{ $dtarequests->medical_team_status }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['dtarequests.destroy', $dtarequests->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('dtarequests.show', [$dtarequests->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('dtarequests.edit', [$dtarequests->id]) }}"
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
            {{-- @include('adminlte-templates::common.paginate', ['records' => $dtarequests]) --}}
        </div>
    </div>
</div>
