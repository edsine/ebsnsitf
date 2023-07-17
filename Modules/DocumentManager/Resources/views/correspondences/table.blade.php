<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="correspondences-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Subject</th>
                    <th class="min-w-200px">Date</th>
                    <th class="min-w-200px">Sender</th>
                    <th class="min-w-200px">Document URL</th>
                    <th class="min-w-200px">Assign</th>
                    <th class="min-w-200px">View Assignment</th>
                    <th class="min-w-200px">Reference Number</th>
                    <th class="min-w-200px">Description</th>
                    <th class="min-w-200px">Comments</th>
                    <th class="min-w-120px" colspan="1">Action</th>
                    <th class="min-w-200px text-end rounded-end"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($correspondences as $correspondence)
                    @php
                        $latestDocumentUrl = $correspondence->document
                            ->documentVersions()
                            ->latest()
                            ->first()
                            ? $correspondence->document
                                ->documentVersions()
                                ->latest()
                                ->first()->document_url
                            : '#';
                    @endphp
                    <tr class="fw-bold text-muted bg-light">
                        <td>{{ $correspondence->subject }}</td>
                        <td>{{ $correspondence->date }}</td>
                        <td>{{ $correspondence->sender }}</td>
                        <td><a target="_blank" href="{{ asset($latestDocumentUrl) }}">View</a>
                        </td>
                        <td style="width: 120px;">
                            <a class="open-modal-departments" href="#" data-toggle="modal"
                                data-target="#assignToDepartmentsModal" data-memo={{ $memo->id }}>Departments</a>
                            <a class="open-modal-users" href="#" data-toggle="modal"
                                data-target="#assignToUsersModal" data-memo={{ $memo->id }}>Users</a>
                        </td>
                        <td style="width: 120px;">
                            <a href="{{ route('memos.assignedDepartments', [$memo->id]) }}">Departments</a>
                            <a href="{{ route('memos.assignedUsers', [$memo->id]) }}">Users</a>
                        </td>
                        <td>{{ $correspondence->reference_number }}</td>
                        <td>{{ $correspondence->description }}</td>
                        <td>{{ $correspondence->comments }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['correspondences.destroy', $correspondence->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('correspondences.show', [$correspondence->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('correspondences.edit', [$correspondence->id]) }}"
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
                        <th class="min-w-200px text-end rounded-end"></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $correspondences])
        </div>
    </div>
</div>

@include('documentmanager::correspondences.assign_to_departments_modal')
@include('documentmanager::correspondences.assign_to_users_modal')

@push('page_scripts')
    {{-- @if ($errors->has('subject') || $errors->has('answer_1') || $errors->has('answer_2') || $errors->has('answer_3'))
        <script>
            $('#feedbackModal').modal();
        </script>
    @endif --}}

    <script>
        $(document).on("click", ".open-modal-users", function() {
            let correspondenceId = $(this).data('correspondence');
            $(".modal-body #user_correspondence_id").val(correspondenceId);
        });

        $(document).on("click", ".open-modal-departments", function() {
            let correspondenceId = $(this).data('correspondence');
            $(".modal-body #department_correspondence_id").val(correspondenceId);
        });
    </script>
@endpush
