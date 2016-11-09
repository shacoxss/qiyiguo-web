<!-- DataTables JavaScript -->
<script src={{asset("vendor/datatables/js/jquery.dataTables.min.js")}}></script>
<script src={{asset("vendor/datatables-plugins/dataTables.bootstrap.min.js")}}></script>
<script src={{asset("vendor/datatables-responsive/dataTables.responsive.js")}}></script>
<script>
    $(document).ready(function() {
        $('#dataTables-userlist').DataTable({
            columnDefs: [
                {orderable : false, targets: [0]}
            ],
            responsive: true,
            pageLength:10,
            sPaginationType: "full_numbers",
            oLanguage: {
                oPaginate: {
                    sFirst: "<<",
                    sPrevious: "<",
                    sNext: ">",
                    sLast: ">>"
                }
            }
        });
    });
</script>