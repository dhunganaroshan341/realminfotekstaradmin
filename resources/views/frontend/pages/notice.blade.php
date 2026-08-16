@if (isset($notice) && $notice != null)
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ $notice->title ?? 'Notice' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-0">
                    @if (!empty($notice->url))
                        <a href="{{ $notice->url }}" target="_blank" class="text-decoration-none text-dark d-block">
                    @endif

                    <div class="card border-0" style="width: 100%;">
                        <img src="{{ asset('uploads/' . $notice->image) }}" class="card-img-top" alt="Notice Image">
                        <div class="card-body">
                            <p class="card-text">{!! $notice->description !!}</p>
                        </div>
                    </div>

                    @if (!empty($notice->url))
                        </a>
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif
