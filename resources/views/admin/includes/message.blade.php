@if (session('success'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
            });
        });
    </script>
@elseif (session('errors'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Gagal!',
                text: '{{ session('errors')->first() }}',
                icon: 'error',
            });
        });
    </script>
@endif
