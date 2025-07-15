<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formId" class="form" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Add Client</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="validationErrors" class="alert alert-danger d-none"></p>
                    <div class="row">
                        <span class="mt-2 mb-2"><span class="text-danger">Note:</span> (<span
                                class="text-danger">*</span>) symbol represent that the field is required</span>
                        <div class="col-md-4">
                            @csrf
                            <label for="" class="form-label">Client Name<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="name" id="full_name" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                        </div>


                        <div class="col-md-4 mb-2">
                            <label for="" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="" class="form-label">Address<span class="text-danger">*</span></label>
                            <input type="text" name="address" id="address" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                        </div>

                        <div class="col-md-6 mt-2 mb-2">
                            <label for="" class="form-label">Phone Number<span
                                    class="text-danger">*</span></label>
                            <input type="number" name="contact" id="contact" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                        </div>

                        <div class="col-md-6 mt-2 mb-2">
                            <label for="" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                            <div id="userImage"> </div>
                        </div>

                        <div class="col-md-12 mt-4 mb-2">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control summernote" id="description" name="description" rows="4"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success submitBtn" data-action="">Submit</button>
                    <button type="submit" class="btn btn-success updateBtn" data-action="edit">Update
                        Client</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            // Summer note
            $(".summernote").summernote({
                height: 300,
            });

            // Data Table
            var table = $("#show-client-data").DataTable({
                processing: true,
                serverSide: true,
                ajax: "/admin/client",
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                    },
                    {
                        data: "image",
                        name: "image",
                    },
                    {
                        data: "name",
                        name: "name",
                    },
                    {
                        data: "email",
                        name: "email",
                    },
                    {
                        data: "address",
                        name: "address",
                    },
                    {
                        data: "contact",
                        name: "contact",
                    },
                    {
                        data: "status",
                        name: "status",
                    },
                    {
                        data: "action",
                        name: "action",
                        orderable: false,
                        searchable: false,
                    },
                ],
            });



            function clearModal() {
                $("#validationErrors").addClass("d-none").html("");
                $("#description").summernote("code", "");
                $("#userImage").html("");
            }

            $(document).on("click", ".addClientButton", function() {
                clearModal(); // Clear errors and reset fields
                $(".submitBtn").show();
                $("#password").prop("disabled", false);
                $(".updateBtn").hide();
                $(".labelPassword").show();

                $(".form").attr("id", "storeForm"); // safer
                $("#storeForm")[0].reset();

                $("#formModal").modal("show");
            });

            // Add and Store User Data
            $(document).off("submit", "#storeForm").on("submit", "#storeForm", function(event) {
                event.preventDefault();
                $(".submitBtn").prop("disabled", true);
                $("#validationErrors").addClass("d-none").html("");
                let formdata = new FormData(this);
                //  if (formId === "storeForm") {
                $.ajax({
                    type: "POST",
                    url: "/admin/client/",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success == true) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Client Added Successfully",
                                showConfirmButton: false,
                                timer: 1000
                            });

                            table.draw();
                            $("#description").summernote("code", "");
                            $("#formModal").modal("hide");
                            $("#storeForm")[0].reset();
                            // $("#storeUserData").trigger("reset");
                        }
                    },
                    error: function(response) {
                        if (response.status === 422) {
                            let errors = response.responseJSON.errors;
                            let errorMessages = "<ul>";
                            $.each(errors, function(key, value) {
                                errorMessages += "<li>" + value[0] +
                                    "</li>"; // Display the first error for each field
                            });
                            errorMessages += "</ul>";
                            $("#validationErrors")
                                .removeClass("d-none")
                                .html(errorMessages);
                        }
                    },
                    complete: function() {
                        $(".submitBtn").prop("disabled", false);
                    },
                });
                //  }
            });

            // Click and Edit User
            $(document).on("click", ".editUserButton", function() {
                clearModal();
                $(".submitBtn").hide();
                $(".labelPassword").hide();
                $(".updateBtn").show();
                $(".form").attr("id", "updateForm");
                $("#updateForm")[0].reset();
                $("#formModal").modal("show");
                let id = $(this).data("id");

                // $('#password').attr('required', false);
                // Fetch User Data

                $.ajax({
                    type: "get",
                    url: "/admin/client/" + id,
                    success: function(response) {
                        $("#full_name").val(response.message.name);
                        $("#email").val(response.message.email);
                        $("#address").val(response.message.address);
                        $("#contact").val(response.message.contact);
                        $("#description").summernote("code", response.message.description);

                        $("#userImage").html(
                            `<img src="/uploads/${response.message.image}" alt="User Image" width="100" height="100">`
                        );
                    },
                });

                // Edit and Submit User Data
                $(document)
                    .off("submit", "#updateForm")
                    .on("submit", "#updateForm", function(event) {
                        event.preventDefault();

                        let formdata = new FormData(this);
                        formdata.append("_method", "put");
                        $(".updateBtn").prop("disabled", true);
                        // console.log(formdata);
                        // if (formId === "updateForm") {
                        $.ajax({
                            type: "POST",
                            url: "/admin/client/" + id,
                            data: formdata,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                if (response.success == true) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Updated",
                                        text: "Client Updated Successfully",
                                        showConfirmButton: false,
                                        timer: 1000
                                    });
                                    $("#formModal").modal("hide");
                                    table.draw();
                                }
                            },
                            error: function(response) {
                                if (response.status === 422) {
                                    let errors = response.responseJSON.errors;
                                    let errorMessages = "<ul>";
                                    $.each(errors, function(key, value) {
                                        errorMessages += "<li>" + value[0] +
                                            "</li>"; // Display the first error for each field
                                    });
                                    errorMessages += "</ul>";
                                    $("#validationErrors")
                                        .removeClass("d-none")
                                        .html(errorMessages);
                                }
                            },
                            complete: function() {
                                $(".updateBtn").prop("disabled", false);
                            },
                        });
                        // }
                    });

            });


            // Delete User
            $(document).on("click", ".deleteData", function() {
                var itemId = $(this).attr("data-id");
                // console.log(itemId);
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/client/" + itemId,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "delete",
                            success: function(response) {
                                if (response.success == true) {
                                    Swal.fire(
                                        "Deleted!",
                                        "Client has been deleted!",
                                        "success"
                                    );
                                    table.draw();
                                } else {
                                    Swal.fire({
                                        icon: "warning",
                                        title: "Warning",
                                        text: "Client Already Tagged in anothe menu",
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });
                                }
                            },
                            error: function() {
                                Swal.fire(
                                    "Error!",
                                    "An error occurred while deleting the item.",
                                    "error"
                                );
                            },
                        });
                    }
                });
            });
        });
    </script>
@endpush
