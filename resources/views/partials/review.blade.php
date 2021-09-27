<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModal">{{ __('messages.reviews') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('review.custom') }}" id="reviewForm">
                    @csrf

                    <input name="review" type="hidden" value="1">

                    <div class="form-group">
                        <textarea  id="review-message" name="review-message" cols="30" rows="4" class="form-control" placeholder="{{ __('messages.reviews') }}"></textarea>
                        @if ($errors->has('review-message'))
                        <span class="text-danger">{{ $errors->first('review-message') }}</span>
                    @endif  
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-secondary">
                                {{ __('messages.leavereview') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if (count($errors) > 0 && old('review') )
<script type="text/javascript">
    $( document ).ready(function() {
         $('#reviewModal').modal('show');
    });
</script>
@endif