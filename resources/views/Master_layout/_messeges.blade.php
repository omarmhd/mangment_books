

@if (session('success'))

    <script>
        toastr.success('{!!session('success')!!}', 'success!', {
            closeButton: true
        });

    </script>
@elseif(session('error'))

    <script>
        toastr.error('{!!session('error')!!}', 'Error!', {
            closeButton: true
        });

    </script>

@endif
