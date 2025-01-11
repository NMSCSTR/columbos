<?php include '../../includes/admin_header.php'; ?>
<title>List of Users</title>
<?php include '../../includes/admin_sidebar.php'; ?>

<!-- Page Content -->

<div class="container-fluid px-4">
    <h3 class="fs-2 mb-3">List of users</h3>
    <table id="example" class="table table-sm display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>FIRSTNAME</th>
                <th>LASTNAME</th>
                <th>KCFAPICODE</th>
                <th>EMAIL</th>
                <th>PHONE NUMBER</th>
                <th>ROLE</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $fetch_users = mysqli_query($conn, "SELECT * FROM users WHERE role != 'admin'");
                while ($user = mysqli_fetch_assoc($fetch_users)) {
            ?>
            <tr>
                <td><?php echo $user['firstname'] ?></td>
                <td><?php echo $user['lastname'] ?></td>
                <td><?php echo $user['kcfapicode'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['phone_number'] ?></td>
                <td><?php echo $user['role'] ?></td>
                <td>
                    <button onclick="deleteUser(<?php echo $user['id']; ?>)" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </td>
            <tr>  
                
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /#page-content-wrapper -->

<script>
function deleteUser(userId) {
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