<?php include '../../includes/admin_header.php'; ?>
<title>Plan Details</title>
<?php include '../../includes/admin_sidebar.php'; ?>

<!-- Page Content -->

<div class="container-fluid">
    <div class="card p-3 shadow">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <img src="<?php echo BASE_URL . 'uploads/' . $details['image'] ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

<script>
    const BASE_URL = "<?php echo BASE_URL; ?>";
    function deletePlan(id) {
        axios.delete(`${BASE_URL}api/planApiController.php?id=${id}`)
        .then(() => {
            if (response.data.success) {
                Swal.fire('Success', response.data.message, 'success').then(() => {
                    location.reload();
                });
            } else {
                console.log(response.data);
                Swal.fire('Error', response.data.message, 'error');
            }
        })
        .catch(error => {
            console.log(error);
            Swal.fire('Error', 'An error occurred', 'error');
        });
    }
</script>



<?php include '../../includes/admin_footer.php'; ?>