<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="folders-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Branch</th>
                    <th>Department</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                @foreach ($folders as $folder)
                    <tr>
                        <td>{{ $folder->name }}</td>
                        <td>{{ $folder->description }}</td>
                        <td>{{ $folder->branch ? $folder->branch->branch_name : '' }}</td>
                        <td>{{ $folder->department ? $folder->department->name : '' }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['folders.destroy', $folder->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('folders.show', [$folder->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('folders.edit', [$folder->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
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
            @include('adminlte-templates::common.paginate', ['records' => $folders])
        </div>
    </div>
</div>
