    <div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formId" class="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <p id="validationErrors" class="alert alert-danger d-none"></p>
                        <div class="row">
                            <span class="mt-2 mb-4">
                                <span class="text-danger">Note:</span>
                                (<span class="text-danger">*</span>) indicates required fields
                            </span>

                            <!-- Displaying page name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Page</label>
                                <p class="form-control-plaintext" id="page"></p>
                            </div>

                            <!-- Displaying section name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Section</label>
                                <p class="form-control-plaintext" id="section"></p>
                            </div>

                            <!-- Title input -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Enter title" />
                            </div>

                            <!-- Image upload -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" id="image" class="form-control" />
                                <div class="mt-2" id="bannerImage"></div> <!-- image preview will be shown here -->
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 mt-4 mb-2">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea id="description" class="form-control summernote"
                                    name="description" rows="4"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer with action buttons -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success updateBtn" data-action="edit">Update Page Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
