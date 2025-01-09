<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-section {
            border: 1px solid #ddd;
            padding: 20px;
            
           
        }
        .form-section h4 {
            background-color: #f8f9fa;
            padding: 10px;
            border: 1px solid #ddd;
            margin: -20px -20px 20px;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4">Part I. Personal Information</h3>
    <form>
        <!-- Full Name -->
        <div class="form-section border border-bottom-0">
            <h4>1. Full Name</h4>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="First Name">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="middleName" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" placeholder="Middle Name">
                </div>
            </div>
        </div>

        <!-- Date of Birth -->
        <div class="form-section border border-bottom-0 border border-top-0">
            <h4>2. Date of Birth</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" placeholder="Age">
                </div>
            </div>
        </div>

        <!-- Place of Birth -->
        <div class="form-section">
            <h4>3. Place of Birth</h4>
            <label for="placeOfBirth" class="form-label">Place of Birth</label>
            <input type="text" class="form-control" id="placeOfBirth" placeholder="Place of Birth">
        </div>

        <!-- Gender & Civil Status -->
        <div class="form-section">
            <h4>4. Gender & Civil Status</h4>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Civil Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="civilStatus" id="single" value="Single">
                        <label class="form-check-label" for="single">Single</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="civilStatus" id="married" value="Married">
                        <label class="form-check-label" for="married">Married</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="civilStatus" id="widowed" value="Widowed">
                        <label class="form-check-label" for="widowed">Widow/er</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- TIN/SSS/GSIS and Nationality -->
        <div class="form-section">
            <h4>5. TIN/SSS/GSIS</h4>
            <label for="tin" class="form-label">TIN/SSS/GSIS</label>
            <input type="text" class="form-control mb-3" id="tin" placeholder="Enter your TIN/SSS/GSIS number">
            <h4>6. Nationality</h4>
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" class="form-control" id="nationality" placeholder="Nationality">
        </div>

        <!-- Mailing Address -->
        <div class="form-section">
            <h4>7. Mailing Address</h4>
            <label for="address" class="form-label">Mailing Address</label>
            <input type="text" class="form-control mb-2" id="street" placeholder="#/Street">
            <input type="text" class="form-control mb-2" id="town" placeholder="Brgy/Town">
            <input type="text" class="form-control" id="city" placeholder="City/Province">
        </div>

        <!-- Occupation -->
        <div class="form-section">
            <h4>8. Occupation</h4>
            <label for="occupation" class="form-label">Specific Duties</label>
            <input type="text" class="form-control mb-2" id="specificDuties" placeholder="Specific Duties">
            <label for="employer" class="form-label">Name of Firm/Employer</label>
            <input type="text" class="form-control mb-2" id="employer" placeholder="Name of Firm/Employer">
            <label for="workAddress" class="form-label">Work/Business Address</label>
            <input type="text" class="form-control mb-2" id="workAddress" placeholder="Work/Business Address">
            <label for="businessNature" class="form-label">Nature of Business</label>
            <input type="text" class="form-control" id="businessNature" placeholder="Nature of Business">
        </div>

        <!-- Contact Info -->
        <div class="form-section">
            <h4>9. Contact Info</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="mobile" placeholder="Mobile Number">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
        </div>

        <!-- Council Membership -->
        <div class="form-section">
            <h4>10. Council Membership</h4>
            <label for="councilName" class="form-label">Council Name/Address</label>
            <input type="text" class="form-control mb-2" id="councilName" placeholder="Council Name/Address">
            <label for="councilNumber" class="form-label">Council #</label>
            <input type="text" class="form-control mb-2" id="councilNumber" placeholder="Council #">
            <label for="degreePresent" class="form-label">Degree at Present</label>
            <input type="text" class="form-control mb-2" id="degreePresent" placeholder="Degree at Present">
            <label for="initiationDate" class="form-label">Date of 1st Degree Initiation</label>
            <input type="date" class="form-control mb-2" id="initiationDate">
            <label class="form-label">Are you at present a member of good standing?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="goodStanding" id="yes" value="Yes">
                <label class="form-check-label" for="yes">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="goodStanding" id="no" value="No">
                <label class="form-check-label" for="no">No</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
