<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="documents-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Document Url</th>
                <th>Folder Id</th>
                <th>Created By</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{ $document->title }}</td>
                    <td>{{ $document->description }}</td>
                    <td>{{ $document->document_url }}</td>
                    <td>{{ $document->folder_id }}</td>
                    <td>{{ $document->created_by }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['documents.destroy', $document->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('documents.show', [$document->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('documents.edit', [$document->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $documents])
        </div>
    </div>
</div>
