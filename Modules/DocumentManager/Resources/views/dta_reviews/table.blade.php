<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="dta-reviews-table">
            <thead>
            <tr class="fw-bold text-muted bg-light">
                <th class="min-w-200px">Dta Reviewid</th>
                <th class="min-w-200px">Officer Id</th>
                <th class="min-w-200px">Comments</th>
                <th class="min-w-200px">Review Status</th>
                <th class="min-w-200px">Status</th>
                <th class="min-w-120px" colspan="1">Action</th>
            															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
            </thead>
            <tbody>
            @foreach($dtaReviews as $dtaReview)
                <tr class="fw-bold text-muted bg-light">
                    <td>{{ $dtaReview->dta_reviewid }}</td>
                    <td>{{ $dtaReview->officer_id }}</td>
                    <td>{{ $dtaReview->comments }}</td>
                    <td>{{ $dtaReview->review_status }}</td>
                    <td>{{ $dtaReview->status }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['dtaReviews.destroy', $dtaReview->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('dtaReviews.show', [$dtaReview->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('dtaReviews.edit', [$dtaReview->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $dtaReviews])
        </div>
    </div>
</div>
