<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="workflow-steps-table">
            <thead>
            <tr>
                <th>Workflow Id</th>
                <th>Step Order</th>
                <th>Parent Step Id</th>
                <th>Next Approved Id</th>
                <th>Next Rejected Id</th>
                <th>Actor Type Id</th>
                <th>Actor Role Id</th>
                <th>Step Activity Id</th>
                <th>Step Type Id</th>
                <th>Step Name</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workflowSteps as $workflowStep)
                <tr>
                    <td>{{ $workflowStep->workflow_id }}</td>
                    <td>{{ $workflowStep->step_order }}</td>
                    <td>{{ $workflowStep->parent_step_id }}</td>
                    <td>{{ $workflowStep->next_approved_id }}</td>
                    <td>{{ $workflowStep->next_rejected_id }}</td>
                    <td>{{ $workflowStep->actor_type_id }}</td>
                    <td>{{ $workflowStep->actor_role_id }}</td>
                    <td>{{ $workflowStep->step_activity_id }}</td>
                    <td>{{ $workflowStep->step_type_id }}</td>
                    <td>{{ $workflowStep->step_name }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['workflowSteps.destroy', $workflowStep->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('workflowSteps.show', [$workflowStep->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('workflowSteps.edit', [$workflowStep->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $workflowSteps])
        </div>
    </div>
</div>
