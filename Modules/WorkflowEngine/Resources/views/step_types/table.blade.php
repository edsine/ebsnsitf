<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="step-types-table">
            <thead>
            <tr>
                <th>Step Type</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stepTypes as $stepType)
                <tr>
                    <td>{{ $stepType->step_type }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['stepTypes.destroy', $stepType->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('stepTypes.show', [$stepType->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('stepTypes.edit', [$stepType->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $stepTypes])
        </div>
    </div>
</div>
