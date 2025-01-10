</div>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Bundle JS (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


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
                window.location.href = `${BASE_URL}logout.php`;
            }
        });
    }
</script>


<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>