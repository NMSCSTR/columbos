<?php include '../../includes/admin_header.php'; ?>
<title>Plan Details</title>
<?php include '../../includes/admin_sidebar.php'; ?>

<?php

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0; 

if ($id > 0) {
    $sql = "SELECT * FROM `fraternal_benefits` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $details = mysqli_fetch_assoc($result);
    } else {
        echo "No record found.";
        exit;
    }
} else {
    echo "Invalid ID.";
    exit;
}
?>

<!-- Page Content -->
<div class="container-fluid my-4">
    <div class="card shadow-lg border-0">
        <div class="row g-0">
            <!-- Image Section -->
            <div class="col-md-4">
                <?php if (!empty($details['image'])): ?>
                <img src="<?php echo BASE_URL . 'uploads/' . $details['image']; ?>" alt="Plan Image"
                    class="img-fluid rounded-start">
                <?php else: ?>
                <img src="path_to_default_image.jpg" alt="No Image Available" class="img-fluid rounded-start">
                <?php endif; ?>
            </div>
            <!-- Details Section -->
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $details['name']; ?></h3>
                    <p class="card-text"><strong>Type:</strong> <?php echo $details['type']; ?></p>
                    <p class="card-text"><strong>Contribution Period:</strong>
                        <?php echo $details['contribution_period']; ?></p>
                    <p class="card-text"><strong>About:</strong> <?php echo $details['about']; ?></p>
                    <p class="card-text"><strong>Benefits:</strong> <?php echo $details['benefits']; ?></p>
                    <button class="btn btn-danger" onClick="deletePlan(<?php echo $details['id']; ?>)">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
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
        .then(response => { 
            if (response.data.success) {
                Swal.fire('Success', response.data.message, 'success').then(() => {
                    window.location.href = 'fraternal_benefits.php';
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
function updatePlan() {
    const BASE_URL = "<?php echo BASE_URL; ?>";
    const formData = new FormData();

    // Collect data from the form
    formData.append('id', document.getElementById('id').value);
    formData.append('type', document.getElementById('type').value);
    formData.append('name', document.getElementById('name').value);
    formData.append('about', document.getElementById('about').value);
    formData.append('benefits', document.getElementById('benefits').value);
    formData.append('contribution_period', document.getElementById('contribution_period').value);
    formData.append('image', document.getElementById('image').files[0]);

    // Send request using axios
    axios.put(`${BASE_URL}api/planApiController.php`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data' // Correct header for FormData
            }
        })
        .then(response => {
            if (response.data.success) {
                Swal.fire('Success', response.data.message, 'success').then(() => {
                    window.location.href = 'fraternal_benefits.php';
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