<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="forms-table">
            <thead>
            <tr>
                <th>Form Name</th>
                <th>Has Workflow</th>
                <th>Workflow Id</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($forms as $form)
                <tr>
                    <td>{{ $form->form_name }}</td>
                    <td>{{ $form->has_workflow }}</td>
                    <td>{{ $form->workflow_id }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['forms.destroy', $form->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('forms.show', [$form->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('forms.edit', [$form->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $forms])
        </div>
    </div>
</div>
