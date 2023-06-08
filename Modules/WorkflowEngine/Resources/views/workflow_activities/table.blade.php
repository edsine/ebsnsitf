<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="workflow-activities-table">
            <thead>
                <tr>
                    <th>Workflow Step</th>
                    <th>Status</th>
                    <th>User</th>
                    <th>Comment</th>
                    <th>Action</th>
                    <th>Action Date</th>
                    {{-- <th>Workflow Instance</th> --}}
                    <th>Workflow</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workflowActivities as $workflowActivity)
                    <tr>
                        <td>{{ $workflowActivity->workflowStep ? $workflowActivity->workflowStep->step_name : '' }}</td>
                        <td>{{ $workflowActivity->status }}</td>
                        <td>{{ $workflowActivity->user ? $workflowActivity->user->name : '' }}</td>
                        <td>{{ $workflowActivity->comment }}</td>
                        <td>{{ $workflowActivity->action }}</td>
                        <td>{{ $workflowActivity->action_date }}</td>
                        {{-- <td>{{ $workflowActivity->workflowInstance ? $workflowActivity->workflowInstance : '' }}</td> --}}
                        <td>{{ $workflowActivity->workflowInstance ? ($workflowActivity->workflowInstance->workflow ? $workflowActivity->workflowInstance->workflow->workflow_name : '') : '' }}
                        </td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['workflowActivities.destroy', $workflowActivity->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('workflowActivities.show', [$workflowActivity->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $workflowActivities])
        </div>
    </div>
</div>
