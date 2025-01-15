</div>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Bundle JS (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Datatables -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>


<script>
var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function() {
    el.classList.toggle("toggled");
};
</script>

<script>
var BASE_URL = '<?php echo BASE_URL; ?>';

function logout() {
    Swal.fire({
        title: 'Are you sure you want to logout?',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        showCancelButton: true,
        confirmButtonText: `Logout`,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `${BASE_URL}api/logout.php`;
        }
    });
}
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        responsive: true,
        ordering: true,
        scrollY: '200px',
        scrollCollapse: true,
        paging: true,
        fixedHeader: true,
        stateSave: true,
        searching: true,
        info: true,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'colvis',
                className: 'btn btn-info',
                text: '<i class="fas fa-eye"></i> Column Visibility'
            },
            {
                extend: 'copyHtml5',
                className: 'btn btn-secondary',
                text: '<i class="fas fa-copy"></i> Copy'
            },
            {
                extend: 'excelHtml5',
                className: 'btn btn-success',
                text: '<i class="fas fa-file-excel"></i> Export to Excel'
            },
            {
                extend: 'csvHtml5',
                className: 'btn btn-warning',
                text: '<i class="fas fa-file-csv"></i> Export to CSV'
            },
            {
                extend: 'pdfHtml5',
                className: 'btn btn-danger',
                text: '<i class="fas fa-file-pdf"></i> Export to PDF'
            },
            {
                extend: 'print',
                className: 'btn btn-primary shadow',
                text: '<i class="fas fa-print"></i> Print'
            }
        ],
        order: [
            [0, 'asc']
        ], 
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
        language: {
            search: "Search Table:",
        }
    });
});
</script>

</body>

</html>