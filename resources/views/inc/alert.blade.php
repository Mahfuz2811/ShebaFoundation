@if(session('swt.title'))
    <script>
        swal({
            title: '{{ session('swt.title') }}',
            text: '{{ session('swt.text') }}',
            type: '{{ session('swt.type') }}',
            showCloseButton: true,
            animation: false,
            customClass: 'animated tada',
            timer: 15000
        })
    </script>
@endif