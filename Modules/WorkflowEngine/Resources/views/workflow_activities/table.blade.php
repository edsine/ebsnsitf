<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="workflow-activities-table">
            <thead>
            <tr>
                <th>Workflow Step Id</th>
                <th>Status</th>
                <th>User Id</th>
                <th>Comment</th>
                <th>Action</th>
                <th>Action Date</th>
                <th>Workflow Instance Id</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workflowActivities as $workflowActivity)
                <tr>
                    <td>{{ $workflowActivity->workflow_step_id }}</td>
                    <td>{{ $workflowActivity->status }}</td>
                    <td>{{ $workflowActivity->user_id }}</td>
                    <td>{{ $workflowActivity->comment }}</td>
                    <td>{{ $workflowActivity->action }}</td>
                    <td>{{ $workflowActivity->action_date }}</td>
                    <td>{{ $workflowActivity->workflow_instance_id }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['workflowActivities.destroy', $workflowActivity->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('workflowActivities.show', [$workflowActivity->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('workflowActivities.edit', [$workflowActivity->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $workflowActivities])
        </div>
    </div>
</div>
