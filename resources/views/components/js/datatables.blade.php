<script src="{{asset('dashboard_assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script>
    let datatable_language_url = '{{app()->getLocale()=='ar'?asset('dashboard_assets/plugins/custom/datatables/ar.json'):asset('dashboard_assets/plugins/custom/datatables/en.json')}}';
    let option = {
        processing: true,
        searching: true,
        scrollX: true,
        lengthMenu: [5, 10, 25, 50],
        order: [],
        pageLength: 10,
        language: {
            url: datatable_language_url,
        },
        @if(count($data) <= 5)
        bPaginate: false,
        bInfo: false,
        @endif
        buttons: [
            {
                extend: 'excel',
                text: '{{__('dashboard.Export to ')}} excel',
                exportOptions: {
                    columns: 'th:not(.no-export)'
                }
            },
        ],
        columnDefs: [
            { targets: 'no-sort', orderable: false },
            { targets: 'no-column', visible: false },
        ],
    }
    let Dtable = $("#datatable").DataTable(option);
    console.log(Dtable)
    $(document).ready(function() {
        $('#export_excel').on('click', function (e) {
            e.preventDefault();
            Dtable.button(0).trigger();
        });
        $('#search').keyup(function(){
            Dtable.search($(this).val()).draw();
        });
        $('#filter_reset').on('click', function (){
            $('#search').val('');
            Dtable.search('').draw();
        });
    });

</script>
