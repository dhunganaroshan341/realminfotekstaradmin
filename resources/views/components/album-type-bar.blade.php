<div class="container-fluid bg-light border-top py-3">
    <div class="row justify-content-center">
        <div class="col-12 px-3">
            <div class="row row-cols-2 row-cols-md-4 g-2 justify-content-center">
                <div class="col d-flex justify-content-center">
                    <a href="{{ route('gallery') }}"
                        class="btn btn-outline-secondary w-100 {{ request()->query('type') === null ? 'active' : '' }}">
                        <i class="fas fa-layer-group me-1"></i> All
                    </a>
                </div>
                <div class="col d-flex justify-content-center">
                    <a href="{{ route('gallery', ['type' => 'image']) }}"
                        class="btn btn-outline-primary w-100 {{ request()->query('type') === 'image' ? 'active' : '' }}">
                        <i class="fas fa-image me-1"></i> Images
                    </a>
                </div>
                <div class="col d-flex justify-content-center">
                    <a href="{{ route('gallery', ['type' => 'pdf']) }}"
                        class="btn btn-outline-danger w-100 {{ request()->query('type') === 'pdf' ? 'active' : '' }}">
                        <i class="fas fa-file-pdf me-1"></i> PDFs
                    </a>
                </div>
                <div class="col d-flex justify-content-center">
                    <a href="{{ route('gallery', ['type' => 'video']) }}"
                        class="btn btn-outline-dark w-100 {{ request()->query('type') === 'video' ? 'active' : '' }}">
                        <i class="fas fa-video me-1"></i> Videos
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
