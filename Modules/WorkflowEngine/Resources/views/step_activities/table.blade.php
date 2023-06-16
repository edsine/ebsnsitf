<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="step-activities-table">
            <thead>
            <tr>
                <th>Step Activity</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stepActivities as $stepActivity)
                <tr>
                    <td>{{ $stepActivity->step_activity }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['stepActivities.destroy', $stepActivity->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('stepActivities.show', [$stepActivity->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('stepActivities.edit', [$stepActivity->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $stepActivities])
        </div>
    </div>
</div>
