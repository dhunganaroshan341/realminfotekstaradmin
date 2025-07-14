$(document).ready(function () {
    // Summer note
    $(".summernote").summernote({
        height: 300,
    });




    // Data Table
    var table = $("#show-client-data").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin/client",
        columns: [
            {
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

  $(document).on("click", ".addClientButton", function () {
        clearModal();
        $(".submitBtn").show();
        $(".updateBtn").hide();
        $(".labelPassword").show();
        $("#formMode").val("store");
        $("#password").prop("disabled", false);
        $("#formId")[0].reset();
        $("#formModal").modal("show");
    });

    $(document).on("click", ".editUserButton", function () {
        clearModal();
        $(".submitBtn").hide();
        $(".updateBtn").show();
        $(".labelPassword").hide();
        $("#formMode").val("update");
        $("#formId")[0].reset();
        $("#formModal").modal("show");

        let id = $(this).data("id");
        $("#formId").data("id", id); // store id in form for update

        $.ajax({
            type: "get",
            url: "/admin/client/" + id,
            success: function (response) {
                $("#full_name").val(response.message.name);
                $("#email").val(response.message.email);
                $("#address").val(response.message.address);
                $("#contact").val(response.message.contact);
                $("#description").summernote("code", response.message.description);

                if (response.message.image) {
                    $("#userImage").html(
                        `<img src="/uploads/${response.message.image}" width="100" height="100">`
                    );
                }
            }
        });
    });

    $(document).off("submit", "#formId").on("submit", "#formId", function (e) {
        e.preventDefault();
        $("#validationErrors").addClass("d-none").html("");
        let mode = $("#formMode").val();
        let formdata = new FormData(this);

        if (mode === "update") {
            formdata.append("_method", "put");
        }

        let id = $(this).data("id");
        let url = mode === "store" ? "/admin/client" : `/admin/client/${id}`;

        let $btn = mode === "store" ? $(".submitBtn") : $(".updateBtn");
        $btn.prop("disabled", true);

        $.ajax({
            type: "POST",
            url: url,
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success === true) {
                    Swal.fire({
                        icon: "success",
                        title: mode === "store" ? "Success" : "Updated",
                        text: mode === "store" ? "Client Added Successfully" : "Client Updated Successfully",
                        showConfirmButton: false,
                        timer: 1000
                    });

                    table.draw();
                    $("#formId")[0].reset();
                    $("#description").summernote("code", "");
                    $("#formModal").modal("hide");
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    let errorMessages = "<ul>";
                    $.each(errors, function (key, value) {
                        errorMessages += "<li>" + value[0] + "</li>";
                    });
                    errorMessages += "</ul>";
                    $("#validationErrors").removeClass("d-none").html(errorMessages);
                }
            },
            complete: function () {
                $btn.prop("disabled", false);
            }
        });
    });


    // Delete User
   // Delete
    $(document).on("click", ".deleteData", function () {
        var itemId = $(this).attr("data-id");
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
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: "DELETE",
                    success: function (response) {
                        if (response.success === true) {
                            Swal.fire("Deleted!", "Client has been deleted!", "success");
                            table.draw();
                        } else {
                            Swal.fire({
                                icon: "warning",
                                title: "Warning",
                                text: "Client already tagged in another menu",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function () {
                        Swal.fire("Error!", "An error occurred while deleting the item.", "error");
                    },
                });
            }
        });
    });
});
