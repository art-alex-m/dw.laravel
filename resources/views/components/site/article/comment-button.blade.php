<button type="button"
        {{$attributes}}
        class="btn btn-outline-success comments-all">Показать все
</button>
@once
    @push('body-bottom')
        <script>
            jQuery(function ($) {
                $('button.comments-all').on('click', function () {
                    let btn = $(this);
                    let commentsContainer = $('#' + btn.data('container-id'));
                    $.get(btn.data('url'))
                        .done(function (data) {
                            commentsContainer.empty().html(data);
                            btn.hide();
                        });
                })
            });
        </script>
    @endpush
@endonce