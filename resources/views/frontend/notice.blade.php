<!-- Modal -->
@if (isset($notice) && $notice != null)
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ $notice->title ?? 'Notice' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card" style="width: 100%;">
                        <img src="{{ asset('uploads/' . $notice->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            {{-- <h5 class="card-title">{{ $notice->title }}</h5> --}}
                            <p class="card-text">{!! $notice->description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif
