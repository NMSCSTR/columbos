<?php include '../../includes/admin_header.php'; ?>
<title>List of Users</title>
<?php include '../../includes/admin_sidebar.php'; ?>

<!-- Page Content -->

<div class="container-fluid px-4">
    <h3 class="fs-2 mb-3">List of users</h3>
    <div class="d-flex justify-content-between">
        <span class="badge text-bg-warning p-2 position-relative mb-5 shadow">
            Pending Users Approval
            <span class=" position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                99+
                <span class="visually-hidden">unread messages</span>
            </span>
        </span>
        <span class="badge text-bg-success p-2 position-relative mb-5 shadow">
            Approved Users
            <span class=" position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                99+
                <span class="visually-hidden">unread messages</span>
            </span>
        </span>
    </div>
    <table id="example" class="table table-sm display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>FIRSTNAME</th>
                <th>LASTNAME</th>
                <th>KCFAPICODE</th>
                <th>EMAIL</th>
                <th>PHONE NUMBER</th>
                <th>ROLE</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $fetch_users = mysqli_query($conn, "SELECT * FROM users WHERE role != 'admin'");
                while ($user = mysqli_fetch_assoc($fetch_users)) {
            ?>
            <tr>    
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