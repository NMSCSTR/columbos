<?php include '../../includes/admin_header.php'; ?>
<title>List of Councils</title>
<?php include '../../includes/admin_sidebar.php'; ?>

<!-- Page Content -->

<div class="container-fluid px-4">
    <h3 class="fs-2 mb-3">Manage councils</h3>
    <table id="example" class="table table-sm display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>COUNCIL NUMBER</th>
                <th>COUNCIL NAME</th>
                <th>UNIT MANAGER</th>
                <th>FRATERNAL COUNSELOR</th>
                <th>DATE ESTABLISHED</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $fetch_councils = mysqli_query($conn, "SELECT * FROM council");
                while ($user = mysqli_fetch_assoc($fetch_councils)) {
            ?>
            <tr>
                <td><?php echo $user['council_number'] ?></td>
                <td><?php echo $user['council_name'] ?></td>
                <td><?php echo $user['unit_manager_id'] ?></td>
                <td><?php echo $user['fraternal_counselor_id'] ?></td>
                <td><?php echo $user['date_established'] ?></td>
                <td>
                    <button onclick="deleteUser(<?php echo $user['id']; ?>)" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </td>
            </tr>  
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /#page-content-wrapper -->

<script>
function deleteCouncil(councilId) {
    const BASE_URL = "<?php echo BASE_URL; ?>";

    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(`${BASE_URL}/api/authApiController.php?action=deleteUser`, {
                    id: userId
                })
                .then(response => {
                    if (response.data.success) {
                        Swal.fire('Deleted!', response.data.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', response.data.message, 'error');
                    }
                })
                .catch(() => Swal.fire('Error', 'An unexpected error occurred.', 'error'));
        }
    });
}
</script>





<?php include '../../includes/admin_footer.php'; ?>