  $(document).ready(function() {
            let tags = [];

            function renderTags() {
                $('#tagContainer').empty();
                tags.forEach((tag, index) => {
                    $('#tagContainer').append(`
                    <span class="tag">
                        ${tag}
                        <span class="remove-tag" data-index="${index}">&times;</span>
                    </span>
                `);
                });
                $('#post_tags').val(tags.join(','));
            }

            $('#addTagButton').on('click', function() {
                let value = $('#tagInput').val().trim();
                if (value && !tags.includes(value)) {
                    tags.push(value);
                    renderTags();
                    $('#tagInput').val('');
                }
            });

            $(document).on('click', '.remove-tag', function() {
                const index = $(this).data('index');
                tags.splice(index, 1);
                renderTags();
            });

            // Optional: reset tags when modal closes
            $('#formModal').on('hidden.bs.modal', function() {
                tags = [];
                renderTags();
                $('#tagInput').val('');
            });
        });
