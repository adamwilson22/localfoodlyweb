@extends('layouts.vendor.app')

@section('title', __('Review'))

@push('css_or_js')
@endpush

<body class="">
    @section('content')
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm">
                        <h1 class="page-header-title">Review</h1>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row mb-5">
                <div class="col-xl-4 col-lg-6">
                    <div class="inline-select">
                        <label for="" class="">Sort by</label>
                        <select id="" class="custom-select custom-select-lg">
                            <option selected>High Rated</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 mt-lg-0 mt-3 text-lg-right">
                    <ul class="nav nav-tabs nav-review" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-reviews-tab" data-toggle="tab" href="#all-reviews"
                                role="tab" aria-controls="all-reviews" aria-selected="true">All Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="replied-reviews-tab" data-toggle="tab" href="#replied-reviews"
                                role="tab" aria-controls="replied-reviews" aria-selected="false">Replied Reviews</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="all-reviews" role="tabpanel" aria-labelledby="all-reviews-tab">
                    <div class="customer">
                        <div class="row">
                            @foreach ($customerReviews as $review)
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body review-list" id="review_id-{{ $review->review_id }}"
                                            data-review-id="{{ $review->review_id }}">
                                            <div class="detail">
                                                <div class="info">
                                                    <img src="{{ $review->customer_image }}" alt="">
                                                    <span>
                                                        <h4>{{ $review->f_name }}</h4>
                                                        <p>{{ $review->email }}</p>
                                                    </span>
                                                </div>
                                                <div class="rating">
                                                    <p class=""><i class="icon-star_icon"></i> {{ $review->rating }}
                                                    </p>
                                                </div>
                                            </div>
                                            <p>{{ $review->comment }}
                                            </p>
                                            <div class="detail mt-5 mb-0">
                                                <div class="info">
                                                    <img class="radius-6" src="{{ $review->food_image }}" alt="">
                                                    <span>
                                                        <h4>{{ $review->food_name }}</h4>
                                                        <p>{{ $review->food_desc }}</p>
                                                    </span>
                                                </div>
                                                <a href="#" id="saveReview" data-toggle="modal"
                                                    data-target="#sellerReplyModal" class="btn btn-primary btn-lg">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- Replied Reviews Section Starts here --}}

                            {{-- MODAL FOR SAVIG SELLER REPLY ON CUSTOMER REVIEW --}}

                            <div class="modal fade" id="sellerReplyModal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add a Response</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="comment">Comment</label>
                                                <textarea class="form-control" id="comment" name="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" id="saveChangesBtn" class="btn btn-primary">Save
                                                changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- MODAL FOR SAVIG SELLER REPLY ON CUSTOMER REVIEW --}}

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="replied-reviews" role="tabpanel" aria-labelledby="replied-reviews-tab">
                    <div class="customer">
                        <div class="row">
                            @foreach ($repliedReviews as $review)
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body review-list">
                                            <div class="detail">
                                                <div class="info">
                                                    <img src="{{ $review->customer_image }}" alt="">
                                                    <span>
                                                        <h4>{{ $review->f_name }}</h4>
                                                        <p>{{ $review->email }}</p>
                                                    </span>
                                                </div>
                                                <div class="rating">

                                                    <p class=""><i class="icon-star_icon"></i>
                                                        {{ $review->rating }}</p>
                                                </div>
                                            </div>
                                            <p>{{ $review->comment }}
                                            </p>
                                            <div class="collapse" id="collapseExample">
                                                <div class="mt-4">
                                                    <p><a href="#">@ {{ $review->f_name }}</a>
                                                        {{ $review->seller_reply }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="detail mt-5 mb-0">
                                                <div class="info">
                                                    <img class="radius-6" src="{{ $review->food_image }}"
                                                        alt="">
                                                    <span>
                                                        <h4>{{ $review->food_name }}</h4>
                                                        <p>{{ $review->food_desc }}</p>
                                                    </span>
                                                </div>
                                                <a class="" data-toggle="collapse" href="#collapseExample"
                                                    role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    View Reply
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endsection
</body>
@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(document).ready(function() {
            const saveChangesBtn = document.querySelector('#saveChangesBtn');
            var review_id = 0;

            $('div[id^="review_id-"]').on('click', function() {
                review_id = $(this).data('review-id');
                console.log(`The Review ID is: ${review_id}`);
            });
            // Add an event listener to the button
            saveChangesBtn.addEventListener('click', (event) => {

                var comment = document.querySelector('#comment').value;
                console.log(review_id);
                console.log(comment);

                // Make the Axios request
                if (comment.trim()) {
                    axios.post('/vendor-panel/addon/save-review', {
                            reviewID: review_id,
                            sellerComment: comment
                        })
                        .then(response => {
                            console.log(response.data);
                            // Close the modal
                            $('#sellerReplyModal').modal('hide');
                            document.querySelector('#comment').value = "";
                            window.location.reload();
                        })
                        .catch(error => {
                            console.log(error.response.data);
                        });
                } else {
                    alert('Add a comment!');
                    return;
                }
            });
        });
    </script>
@endpush
