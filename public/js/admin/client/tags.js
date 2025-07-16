// $(document).ready(function () {
// $(function () {
//         let tags = [];

//         function renderTags() {
//             $('#tagContainer').empty();
//             tags.forEach((tag, index) => {
//                 $('#tagContainer').append(`
//                     <span class="tag">
//                         ${tag}
//                         <span class="remove-tag ms-1" data-index="${index}">&times;</span>
//                     </span>
//                 `);
//             });
//             $('#post_tags').val(tags.join(','));
//         }

//         $('#addTagButton').on('click', function () {
//             const value = $('#tagInput').val().trim();
//             if (value !== '' && !tags.includes(value)) {
//                 tags.push(value);
//                 renderTags();
//                 $('#tagInput').val('');
//             }
//         });

//         $(document).on('click', '.remove-tag', function () {
//             const index = $(this).data('index');
//             tags.splice(index, 1);
//             renderTags();
//         });

//         $('#formModal').on('hidden.bs.modal', function () {
//             tags = [];
//             renderTags();
//             $('#tagInput').val('');
//         });
//     });
// });
