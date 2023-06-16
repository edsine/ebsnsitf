<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="document-versions-table">
            <thead>
            <tr>
                <th>Version Number</th>
                <th>Document Id</th>
                <th>Document Url</th>
                <th>Created By</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documentVersions as $documentVersion)
                <tr>
                    <td>{{ $documentVersion->version_number }}</td>
                    <td>{{ $documentVersion->document_id }}</td>
                    <td>{{ $documentVersion->document_url }}</td>
                    <td>{{ $documentVersion->created_by }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['documentVersions.destroy', $documentVersion->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('documentVersions.show', [$documentVersion->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('documentVersions.edit', [$documentVersion->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $documentVersions])
        </div>
    </div>
</div>
