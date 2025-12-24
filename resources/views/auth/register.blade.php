<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Registration</title>
<link rel="stylesheet" href="/css/style.css">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f5f5f5;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.container {
    width: 100%;
    max-width: 1000px;
}

.form-wrapper {
    background: white;
    border-radius: 10px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    animation: slideUp 0.5s ease-out;
}

.profile-pic-container {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}

.profile-avatar {
    width: 120px;
    height: 120px;
    background: #f0f0f0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 50px;
    color: #999;
    margin-bottom: 10px;
    border: 2px solid #e0e0e0;
    overflow: hidden;
}

.profile-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.upload-btn {
    background: #007bff;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 20px;
    cursor: pointer;
    font-size: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.upload-btn:hover {
    background: #0056b3;
    transform: translateY(-2px);
}

.file-upload-hidden {
    display: none;
}

.form-section {
    padding: 40px;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
}

.form-section h1 {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 15px;
    text-align: left;
}


h1 {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
    font-size: 24px;
    font-weight: 600;
    width: 100%;
    grid-column: 1 / -1;
}

.section-title {
    color: #333;
    margin-top: 20px;
    margin-bottom: 12px;
    font-size: 14px;
    font-weight: 600;
}

.section-subtitle {
    color: #999;
    margin-bottom: 10px;
    font-size: 12px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 15px;
}

.form-row.full {
    grid-column: 1 / -1;
}

.form-group {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    font-size: 13px;
}

input, select, textarea {
    padding: 10px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    transition: all 0.3s ease;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

input:focus, select:focus, textarea:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
}

input::placeholder, textarea::placeholder {
    color: #999;
}

textarea {
    resize: vertical;
    min-height: 80px;
}

.dynamic-field-group {
    margin-bottom: 15px;
}

.field-item {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-bottom: 10px;
}

.field-item input {
    flex: 1;
}

.remove-btn {
    background: #dc3545;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 8px 12px;
    cursor: pointer;
    font-size: 12px;
    transition: background 0.3s ease;
}

.remove-btn:hover {
    background: #c82333;
}

.add-link {
    color: #007bff;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: color 0.3s ease;
    margin-top: 5px;
}

.add-link:hover {
    color: #0056b3;
    text-decoration: underline;
}

button[type="submit"] {
    padding: 12px 30px;
    background: blue;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 30px;
    text-transform: uppercase;
    letter-spacing: 1px;
    width: 100%;
}



.login-link {
    text-align: center;
    margin-top: 20px;
    color: #666;
    font-size: 14px;
}

.login-link a {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.login-link a:hover {
    color: #764ba2;
    text-decoration: underline;
}

@media (max-width: 768px) {
    .form-wrapper {
        flex-direction: column;
    }

    .profile-section {
        width: 100%;
        padding: 30px;
    }

    .form-section {
        width: 100%;
        padding: 30px;
    }

    .form-row {
        grid-template-columns: 1fr;
    }
}
</style>
</head>
<body>
<div class="container">
    <div class="form-wrapper">
        <!-- Form Section -->
        <div class="form-section">
            @if ($errors->any())
                <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 6px; margin-bottom: 20px;">
                    <strong>Registration Error:</strong>
                    <ul style="margin: 10px 0 0 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="/register" enctype="multipart/form-data">
                @csrf
                <h1>
                    <span>Employee Registration Form</span>
                    <div class="profile-pic-container">
                        <div class="profile-avatar">👤</div>
                        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="file-upload-hidden">
                        <button type="button" class="upload-btn" onclick="document.getElementById('profile_picture').click()">Upload Profile</button>
                    </div>
                </h1>

                <!-- Basic Information -->
                <div class="form-row full">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" placeholder="John Doe" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="dob">Date of Birth *</label>
                        <input type="date" id="dob" name="date_of_birth" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" placeholder="your@email.com" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" id="password" name="password" placeholder="Enter password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Re-Password *</label>
                        <input type="password" id="confirm_password" name="password_confirmation" placeholder="Confirm password" required>
                    </div>
                </div>
                <p style="color: #999; font-size: 12px; margin-bottom: 15px;">Use A-Z, a-z, 0-9, !@#$%^ in password</p>

                <!-- Qualifications -->
                <div class="dynamic-field-group">
                    <div class="section-title">Add your Qualifications</div>
                    <div class="section-subtitle">Qualifications 1</div>
                    <div id="qualifications-container">
                        <div class="field-item">
                            <input type="text" name="qualifications[]" placeholder="Enter qualification">
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="add-link" onclick="addQualification()">+ Add Qualification</a>
                </div>

                <!-- Experiences -->
                <div class="dynamic-field-group">
                    <div class="section-title">Add your Experiences</div>
                    <div class="section-subtitle">Experiences 1</div>
                    <div id="experience-container">
                        <div class="field-item">
                            <input type="text" name="experience[]" placeholder="Enter work experience">
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="add-link" onclick="addExperience()">+ Add Experience</a>
                </div>

                <!-- Permanent Address -->
                <div class="dynamic-field-group">
                    <div class="section-title">Permanent Address</div>
                    <div class="form-row full">
                        <div class="form-group">
                            <input type="text" name="permanent_address_line1" placeholder="Line 1" required>
                        </div>
                    </div>
                    <div class="form-row full">
                        <div class="form-group">
                            <input type="text" name="permanent_address_line2" placeholder="Line 2">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="permanent_city" placeholder="City" required>
                        </div>
                        <div class="form-group">
                            <select name="permanent_state" required>
                                <option value="">Select State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Current Address -->
                <div class="dynamic-field-group">
                    <div class="section-title">Current Address</div>
                    <div class="form-row full">
                        <div class="form-group">
                            <input type="text" name="current_address_line1" placeholder="Line 1" required>
                        </div>
                    </div>
                    <div class="form-row full">
                        <div class="form-group">
                            <input type="text" name="current_address_line2" placeholder="Line 2">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="current_city" placeholder="City" required>
                        </div>
                        <div class="form-group">
                            <select name="current_state" required>
                                <option value="">Select State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit">Submit</button>
            </form>
            <div class="login-link">
                Already have an account? <a href="/login">Login here</a>
            </div>
        </div>
    </div>
</div>

<script>
function addQualification() {
    const container = document.getElementById('qualifications-container');
    const fieldItem = document.createElement('div');
    fieldItem.className = 'field-item';
    fieldItem.innerHTML = `
        <input type="text" name="qualifications[]" placeholder="Enter qualification">
        <button type="button" class="remove-btn" onclick="this.parentElement.remove()">Remove</button>
    `;
    container.appendChild(fieldItem);
}

function addExperience() {
    const container = document.getElementById('experience-container');
    const fieldItem = document.createElement('div');
    fieldItem.className = 'field-item';
    fieldItem.innerHTML = `
        <input type="text" name="experience[]" placeholder="Enter work experience">
        <button type="button" class="remove-btn" onclick="this.parentElement.remove()">Remove</button>
    `;
    container.appendChild(fieldItem);
}

// File upload preview
document.getElementById('profile_picture').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            const avatar = document.querySelector('.profile-avatar');
            avatar.innerHTML = `<img src="${event.target.result}" alt="Profile">`;
        };
        reader.readAsDataURL(file);

        // Show the profile picture container
        document.querySelector('.profile-pic-container').classList.add('visible');
    }
});

// Form submission to ensure all data is properly sent
document.querySelector('form').addEventListener('submit', function(e) {
    // The form will submit with all data including the file
    console.log('Form submitted with profile picture file');
});
</script>
</body>
</html>
