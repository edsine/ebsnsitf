<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="workflow-steps-table">
            <thead>
                <tr>
                    <th>Workflow</th>
                    <th>Step Order</th>
                    <th>Parent Step</th>
                    <th>Next Approved</th>
                    <th>Next Rejected</th>
                    <th>Actor Type</th>
                    <th>Actor Role</th>
                    <th>Step Activity</th>
                    <th>Step Type</th>
                    <th>Step Name</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workflowSteps as $workflowStep)
                    <tr>
                        <td>{{ $workflowStep->workflow ? $workflowStep->workflow->workflow_name : '' }}</td>
                        <td>{{ $workflowStep->step_order }}</td>
                        <td>{{ $workflowStep->parentStep ? $workflowStep->parentStep->step_name : '' }}</td>
                        <td>{{ $workflowStep->nextApproved ? $workflowStep->nextApproved->step_name : '' }}</td>
                        <td>{{ $workflowStep->nextRejected ? $workflowStep->nextRejected->step_name : '' }}</td>
                        <td>{{ $workflowStep->actorType ? $workflowStep->actorType->actor_type : '' }}</td>
                        <td>{{ $workflowStep->actorRole ? $workflowStep->actorRole->actor_role : '' }}</td>
                        <td>{{ $workflowStep->stepActivity ? $workflowStep->stepActivity->step_activity : '' }}</td>
                        <td>{{ $workflowStep->stepType ? $workflowStep->stepType->step_type : '' }}</td>
                        <td>{{ $workflowStep->step_name }}</td>
                        <td style="width: 120px">
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
            @include('adminlte-templates::common.paginate', ['records' => $workflowSteps])
        </div>
    </div>
</div>
