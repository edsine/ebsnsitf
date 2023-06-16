<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="form-fields-table">
            <thead>
            <tr>
                <th>Form</th>
                <th>Field Name</th>
                <th>Field Type</th>
                <th>Field Label</th>
                <th>Field Options</th>
                <th>Is Required</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($formFields as $formField)
                <tr>
                    <td>{{ $formField->form ? $formField->form->form_name : '' }}</td>
                    <td>{{ $formField->field_name }}</td>
                    <td>{{ $formField->fieldType ? $formField->fieldType->field_type : '' }}</td>
                    <td>{{ $formField->field_label }}</td>
                    <td>{{ $formField->field_options }}</td>
                    <td>{{ $formField->is_required ? 'Yes' : 'No' }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['formFields.destroy', $formField->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('formFields.show', [$formField->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('formFields.edit', [$formField->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $formFields])
        </div>
    </div>
</div>
