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