<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="departments-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Branch</th>
                <th>Documents</th>
                <th>Regional Manager Status</th>
                <th>Head Office Status</th>
                <th>Medical Team Status</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dtarequests as $dtarequests)
                <tr>
                    <td>{{ $dtarequests->name }}</td>
                    <td>{{ $dtarequests->description }}</td>
                    <td>{{ $dtarequests->branch ? $dtarequests->branch->branch_name : '' }}</td>
                    <td>
                        <img style="width: 50px;height: 50px" src="{{ url('storage/') }}{!! '/'.$dtarequests->images !!}" alt="Image">
                    </td>
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
