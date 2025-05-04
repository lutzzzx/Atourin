<!-- JAVASCRIPT -->
<script src="{{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/metismenujs/metismenujs.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/eva-icons/eva.min.js') }}"></script>
        <!-- alertifyjs js -->
<script src="{{ URL::asset('build/libs/alertifyjs/build/alertify.min.js') }}"></script>

<script>
    @if (session('success'))
        alertify.success('{{ session('success') }}');
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            alertify.error('{{ $error }}');
        @endforeach
    @endif
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const singleClickButtons = document.querySelectorAll('button[data-single-click]');
        singleClickButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                button.disabled = true;
                button.closest('form').submit();
            });
        });
    });
</script>
@yield('scripts')