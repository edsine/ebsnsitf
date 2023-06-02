<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="field-types-table">
            <thead>
            <tr>
                <th>Field Type</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fieldTypes as $fieldType)
                <tr>
                    <td>{{ $fieldType->field_type }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['fieldTypes.destroy', $fieldType->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('fieldTypes.show', [$fieldType->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('fieldTypes.edit', [$fieldType->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $fieldTypes])
        </div>
    </div>
</div>
