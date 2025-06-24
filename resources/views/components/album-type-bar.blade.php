<div class="container-fluid bg-light border-top py-3">
    <div class="row justify-content-center">
        <div class="col-md-9 d-flex justify-content-around">
            <a href="{{ route('gallery') }}"
                class="btn btn-outline-secondary {{ request()->query('type') === null ? 'active' : '' }}">
                <i class="fas fa-layer-group me-1"></i> All Albums
            </a>
            <a href="{{ route('gallery', ['type' => 'image']) }}"
                class="btn btn-outline-primary {{ request()->query('type') === 'image' ? 'active' : '' }}">
                <i class="fas fa-image me-1"></i> Image Albums
            </a>
            <a href="{{ route('gallery', ['type' => 'pdf']) }}"
                class="btn btn-outline-danger {{ request()->query('type') === 'pdf' ? 'active' : '' }}">
                <i class="fas fa-file-pdf me-1"></i> PDF Albums
            </a>
            <a href="{{ route('gallery', ['type' => 'video']) }}"
                class="btn btn-outline-dark {{ request()->query('type') === 'video' ? 'active' : '' }}">
                <i class="fas fa-video me-1"></i> Video Albums
            </a>
        </div>
    </div>
</div>
