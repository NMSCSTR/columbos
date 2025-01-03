<?php
include '../../includes/header.php';
?>

<!-- Register -->
<main class="mt-4">
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 p-4 shadow rounded bg-white">
                <form method="POST" action="">
                    <div class="text-center mb-4">
                        <img class="mb-3 img-fluid" src="https://visitaiglesia.net/wp-content/uploads/2019/04/11.jpg" alt="Logo" width="100" height="100">
                        <h1 class="h3">Register</h1>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control shadow" name="firstname" id="floatingFirstname" placeholder="First Name" value="">
                        <label for="floatingFirstname">First Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control shadow" name="lastname" id="floatingLastname" placeholder="Last Name" value="">
                        <label for="floatingLastname">Last Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control shadow" name="kcfapicode" id="floatingKcfapicode" placeholder="KCFAPI Code" value="">
                        <label for="floatingKcfapicode">KCFAPI Code</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control shadow" name="email" id="floatingEmail" placeholder="name@example.com" value="">
                        <label for="floatingEmail">Email Address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control shadow" name="phone_number" id="floatingPhoneNumber" placeholder="Phone Number" value="">
                        <label for="floatingPhoneNumber">Phone Number</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select shadow" name="role" id="floatingRole">
                            <option value="" disabled>Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="unit-manager">Unit Manager</option>
                            <option value="fraternal-counselor">Fraternal Counselor</option>
                            <option value="family-member">Family Member</option>
                        </select>
                        <label for="floatingRole">Role</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control shadow" name="password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control shadow" name="password_confirmation" id="floatingPasswordConfirmation" placeholder="Confirm Password">
                        <label for="floatingPasswordConfirmation">Confirm Password</label>
                    </div>

                    <button class="btn btn-primary w-100 py-2 mb-3" type="submit">Register</button>
                    <p class="text-center">Already have an account? <a href="">Sign in</a></p>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
include '../../includes/footer.php';
?>

