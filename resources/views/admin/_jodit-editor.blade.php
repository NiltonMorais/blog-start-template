@push('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.css">
@endpush

@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.js"></script>
    <script>
        var editor = new Jodit('#content',{
            height: 500
        });
    </script>
@endpush