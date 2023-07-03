<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="memos-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created By</th>
                    <th>Document URL</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memos as $memo)
                    @php
                        $latestDocumentUrl = $memo->document
                            ->documentVersions()
                            ->latest()
                            ->first()
                            ? $memo->document
                                ->documentVersions()
                                ->latest()
                                ->first()->document_url
                            : '#';
                    @endphp
                    <tr>
                        <td>{{ $memo->title }}</td>
                        <td>{{ $memo->description }}</td>
                        <td>{{ $memo->createdBy ? $memo->createdBy->email : '' }}</td>
                        <td><a target="_blank" href="{{ asset($latestDocumentUrl) }}">View</a>
                        </td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['memos.destroy', $memo->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('memos.memoVersions.index', [$memo->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('memos.edit', [$memo->id]) }}" class='btn btn-default btn-xs'>
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
            @include('adminlte-templates::common.paginate', ['records' => $memos])
        </div>
    </div>
</div>
