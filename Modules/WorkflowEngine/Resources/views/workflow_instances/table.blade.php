<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="workflow-instances-table">
            <thead>
                <tr>
                    <th>Workflow</th>
                    <th>Started By</th>
                    <th>Date Completed</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workflowInstances as $workflowInstance)
                    <tr>
                        <td>{{ $workflowInstance->workflow ? $workflowInstance->workflow->workflow_name : '' }}</td>
                        <td>{{ $workflowInstance->startedBy ? $workflowInstance->startedBy->name : '' }}</td>
                        <td>{{ $workflowInstance->date_completed }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['workflowInstances.destroy', $workflowInstance->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('workflowInstances.show', [$workflowInstance->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
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
            @include('adminlte-templates::common.paginate', ['records' => $workflowInstances])
        </div>
    </div>
</div>
