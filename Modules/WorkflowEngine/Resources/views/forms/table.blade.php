<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="forms-table">
            <thead>
                <tr>
                    <th>Form Name</th>
                    <th>Has Workflow</th>
                    <th>Workflow</th>
                    <th>Table</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                    <tr>
                        <td>{{ $form->form_name }}</td>
                        <td>{{ $form->has_workflow ? 'Yes' : 'No' }}</td>
                        <td>{{ $form->workflow ? $form->workflow->workflow_name : '' }}</td>
                        <td>
                            {!! Form::open(['route' => ['forms.table.store', $form->id], 'method' => 'post']) !!}
                            <div class='btn-group'>
                                {!! Form::button('Create', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-success btn-xs',
                                    'onclick' => "return confirm('Are you sure?, You will not be able to delete or edit form')",
                                ]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['forms.destroy', $form->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('forms.formFields.create', [$form->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('forms.show', [$form->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('forms.edit', [$form->id]) }}" class='btn btn-default btn-xs'>
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
            @include('adminlte-templates::common.paginate', ['records' => $forms])
        </div>
    </div>
</div>
