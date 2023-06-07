<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="workflows-table">
            <thead>
            <tr>
                <th>Workflow Name</th>
                <th>Workflow Type Id</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workflows as $workflow)
                <tr>
                    <td>{{ $workflow->workflow_name }}</td>
                    <td>{{ $workflow->workflow_type_id }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['workflows.destroy', $workflow->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('workflows.show', [$workflow->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('workflows.edit', [$workflow->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $workflows])
        </div>
    </div>
</div>
