@section('auth_styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
@endsection

<table id="myTable" class="table table-striped">
    {{ $slot }}
</table>

@section('auth_scripts')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    <script>
        $("#myTable").DataTable({
            responsive: true,
            order: [
                [1, "asc"]
            ]
        });
    </script>
@endsection
