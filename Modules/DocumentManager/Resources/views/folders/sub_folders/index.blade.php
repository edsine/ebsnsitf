<div class="card-body p-5">
    <div class="row">
        <div class="col-sm-6">
            <h3>Sub-Folders</h3>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-primary float-end" data-toggle="modal" data-target="#createFolderModal">
                Create Folder
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="folders-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sub_folders as $sub_folder)
                    <tr>
                        <td><i class="fa fa-folder"></i> {{ $sub_folder->name }}</td>
                        <td>{{ $sub_folder->description }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['folders.destroy', $sub_folder->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('folders.show', [$sub_folder->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('folders.edit.sub_folders', [$sub_folder->id, $folder->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $sub_folders])
        </div>
    </div>
</div>

@include('documentmanager::folders..sub_folders.create_modal')
