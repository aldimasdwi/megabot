<script>
    (function($) {

        "use strict";


        // Setup CSRF In Ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // get color code
        $(document).on('change', '#color_picker', function(e) {
            e.preventDefault();
            $('#shadow_color').val(this.value);
        });

        //user status swich
        $(document).on('change', '#status', function() {
            let status = $(this).prop('checked') == true ? 1 : 0;
            var id = this.value;
            var url = '{{ route('user.status', ':id') }}',
                url = url.replace(":id", id);
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    status: status,
                    _method: 'PUT'
                },
                success: function(data) {
                    //   
                }
            });
        });

        // loader
        $(window).on('load', function() {
            setTimeout(function() {
                $('.jstree-loader').fadeOut('slow');
                $('#treeBasic').show();
            }, 500);
            $('.jstree-loader').remove('slow');
        });

        //Remove unnecessary Title in Table Checkbox        
        if (document.querySelector(".title")) {
            document.querySelector(".title").removeAttribute("title")
        }

        // get color code
        $(document).on('change', '#color-box', function(e) {
            e.preventDefault();
            $('#primary_color').val(this.value);
        });
        $(document).on('change', '#color-box-2', function(e) {
            e.preventDefault();
            $('#secondary_color').val(this.value);
        });
    })(jQuery);
</script>
