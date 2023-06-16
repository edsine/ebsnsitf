<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="workflow-types-table">
            <thead>
            <tr>
                <th>Workflow Type</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workflowTypes as $workflowType)
                <tr>
                    <td>{{ $workflowType->workflow_type }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['workflowTypes.destroy', $workflowType->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('workflowTypes.show', [$workflowType->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('workflowTypes.edit', [$workflowType->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $workflowTypes])
        </div>
    </div>
</div>
