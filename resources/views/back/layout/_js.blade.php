<script src="{{ url('assets/back') }}/js/bundle.js?ver=3.0.3"></script>
<script src="{{ url('assets/back') }}/js/scripts.js?ver=3.0.3"></script>
<script src="{{ url('assets/back') }}/js/libs/datatable-btns.js?ver=3.0.3"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            showConfirmButton: true,
            timer: false,
        });
    </script>
@endif

<script>
    function deleteUser(url) {
        
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Data Berhasil Dihapus',
                    showConfirmButton: true,
                    timer: false,
                }).then(() => {
                    window.location.href = url;
                });
            }
        });
    }
</script>