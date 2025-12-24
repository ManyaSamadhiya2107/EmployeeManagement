<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Profile</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    padding: 20px;
}

.container {
    max-width: 1100px;
    margin: 0 auto;
}

.profile-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    overflow: hidden;

}


.profile-header {
    background: linear-gradient(135deg, #f3d7e8 0%, #e8d5f2 100%);
    padding: 40px;
    text-align: center;
}

.profile-pic {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    margin: 0 auto 20px;
    background: white;
    border: 4px solid white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 60px;
    overflow: hidden;
    position: relative;
    cursor: pointer;
}

.profile-pic img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.profile-pic-upload {
    display: none;
}

.profile-pic:hover {
    opacity: 0.8;
}

.profile-name {
    font-size: 28px;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.profile-email {
    color: #666;
    font-size: 14px;
    margin-bottom: 5px;
}

.profile-dob {
    color: #666;
    font-size: 14px;
}

.profile-content {
    padding: 40px;
}

.section {
    margin-bottom: 30px;
}

.section-title {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #e0e0e0;
}

.section-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-bottom: 30px;
}

.section-row.full {
    grid-column: 1 / -1;
}

.field-group {
    margin-bottom: 20px;
}

.field-label {
    font-weight: 600;
    color: #333;
    font-size: 14px;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.field-value {
    padding: 10px 12px;
    background: #f9f9f9;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    color: #555;
    font-size: 14px;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
}

.field-value:hover .edit-icon {
    opacity: 1;
}

.edit-icon {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    opacity: 0;
    transition: opacity 0.3s ease;
    color: #007bff;
    font-size: 16px;
}

.field-edit {
    display: none;
}

.field-edit input,
.field-edit select {
    width: 100%;
    padding: 10px 12px;
    border: 2px solid #007bff;
    border-radius: 6px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.field-edit-buttons {
    display: flex;
    gap: 10px;
    margin-top: 8px;
}

.btn-save {
    background: #28a745;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 13px;
    transition: background 0.3s ease;
}

.btn-save:hover {
    background: #218838;
}

.btn-cancel {
    background: #dc3545;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 13px;
    transition: background 0.3s ease;
}

.btn-cancel:hover {
    background: #c82333;
}

.list-section {
    background: #f9f9f9;
    padding: 15px;
    border-radius: 6px;
    margin-bottom: 15px;
}

.list-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background: white;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    margin-bottom: 8px;
}

.list-item:last-child {
    margin-bottom: 0;
}

.list-item-text {
    flex: 1;
    color: #555;
}

.list-item-edit {
    display: none;
    width: 100%;
    padding: 8px;
    margin-bottom: 8px;
    border: 1px solid #007bff;
    border-radius: 4px;
}

.btn-remove {
    background: #dc3545;
    color: white;
    border: none;
    padding: 6px 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    transition: background 0.3s ease;
    margin-left: 10px;
}

.btn-remove:hover {
    background: #c82333;
}

.btn-edit-item {
    background: #ffc107;
    color: #333;
    border: none;
    padding: 6px 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    margin-left: 5px;
}

.btn-edit-item:hover {
    background: #ffb300;
}

.add-btn {
    background: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    transition: background 0.3s ease;
    margin-top: 10px;
}

.add-btn:hover {
    background: #0056b3;
}

.upload-btn {
    background: #007bff;
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    font-weight: 600;
    transition: background 0.3s ease;
    margin-top: 10px;
}

.upload-btn:hover {
    background: #0056b3;
}

.success-message {
    background: #d4edda;
    color: #155724;
    padding: 12px;
    border-radius: 6px;
    margin-bottom: 20px;
    display: none;

}



.address-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 15px;
}

@media (max-width: 768px) {
    .section-row {
        grid-template-columns: 1fr;
    }

    .address-row {
        grid-template-columns: 1fr;
    }

    .profile-header {
        padding: 30px 20px;
    }

    .profile-content {
        padding: 20px;
    }
}
</style>
</head>
<body>
<div class="container">
    <div class="profile-card">
        @php
            $isOwner = Auth::id() === $user->id;
        @endphp
        <style>
             /* Conditionally hide specific elements if not owner */
             @if(!$isOwner)
                .edit-icon,
                .field-edit,
                .add-btn,
                .btn-remove,
                .profile-pic-upload,
                .btn-save,
                .btn-cancel,
                .field-value:hover .edit-icon {
                    display: none !important;
                }
                .field-value {
                    cursor: default;
                    pointer-events: none;
                    background: transparent;
                    border: none;
                    padding-left: 0;
                }
                .profile-pic {
                    cursor: default;
                    border-color: #f3d7e8;
                }
             @endif
        </style>
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-pic" onclick="document.getElementById('profile-pic-upload').click()">
                @if($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile">
                @else
                    👤
                @endif
                <input type="file" id="profile-pic-upload" class="profile-pic-upload" accept="image/*">
            </div>
            <div class="profile-name" id="display-name">{{ $user->name }}</div>
            <div class="profile-email">{{ $user->email }}</div>
            <div class="profile-dob">DOB - {{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('d M Y') : 'N/A' }}</div>
        </div>

        <!-- Profile Content -->
        <div class="profile-content">
            <div class="success-message" id="successMessage">Changes saved successfully!</div>

            <!-- Qualifications & Experiences -->
            <div class="section-row">
                <!-- Qualifications -->
                <div>
                    <div class="section-title">Qualifications</div>
                    <div class="list-section" id="qualifications-list">
                        @php $qualifications = json_decode($user->qualifications, true) ?? []; @endphp
                        @foreach($qualifications as $index => $qualification)
                            <div class="list-item" data-index="{{ $index }}">
                                <span class="list-item-text">{{ $qualification }}</span>
                                <button class="btn-remove" onclick="removeQualification({{ $index }})">Remove</button>
                            </div>
                        @endforeach
                    </div>
                    <button class="add-btn" onclick="addQualificationField()">+ Add Qualification</button>
                </div>

                <!-- Experiences -->
                <div>
                    <div class="section-title">Experiences</div>
                    <div class="list-section" id="experiences-list">
                        @php $experiences = json_decode($user->experience, true) ?? []; @endphp
                        @foreach($experiences as $index => $exp)
                            <div class="list-item" data-index="{{ $index }}">
                                <span class="list-item-text">{{ $exp }}</span>
                                <button class="btn-remove" onclick="removeExperience({{ $index }})">Remove</button>
                            </div>
                        @endforeach
                    </div>
                    <button class="add-btn" onclick="addExperienceField()">+ Add Experience</button>
                </div>
            </div>

            <!-- Addresses -->
            <div class="section">
                <div class="section-title">Current Address</div>
                <div class="address-row">
                    <div class="field-group">
                        <div class="field-label">Address Line 1</div>
                        <div class="field-value editable" data-field="current_address_line1">
                            {{ $user->current_address_line1 ?? 'Not provided' }}
                            <span class="edit-icon">✎</span>
                        </div>
                        <div class="field-edit">
                            <input type="text" value="{{ $user->current_address_line1 }}">
                            <div class="field-edit-buttons">
                                <button class="btn-save" onclick="saveField(this, 'current_address_line1')">Save</button>
                                <button class="btn-cancel" onclick="cancelEdit(this)">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-label">Address Line 2</div>
                        <div class="field-value editable" data-field="current_address_line2">
                            {{ $user->current_address_line2 ?? 'Not provided' }}
                            <span class="edit-icon">✎</span>
                        </div>
                        <div class="field-edit">
                            <input type="text" value="{{ $user->current_address_line2 }}">
                            <div class="field-edit-buttons">
                                <button class="btn-save" onclick="saveField(this, 'current_address_line2')">Save</button>
                                <button class="btn-cancel" onclick="cancelEdit(this)">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="address-row">
                    <div class="field-group">
                        <div class="field-label">City</div>
                        <div class="field-value editable" data-field="current_city">
                            {{ $user->current_city ?? 'Not provided' }}
                            <span class="edit-icon">✎</span>
                        </div>
                        <div class="field-edit">
                            <input type="text" value="{{ $user->current_city }}">
                            <div class="field-edit-buttons">
                                <button class="btn-save" onclick="saveField(this, 'current_city')">Save</button>
                                <button class="btn-cancel" onclick="cancelEdit(this)">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-label">State</div>
                        <div class="field-value editable" data-field="current_state">
                            {{ $user->current_state ?? 'Not provided' }}
                            <span class="edit-icon">✎</span>
                        </div>
                        <div class="field-edit">
                            <input type="text" value="{{ $user->current_state }}">
                            <div class="field-edit-buttons">
                                <button class="btn-save" onclick="saveField(this, 'current_state')">Save</button>
                                <button class="btn-cancel" onclick="cancelEdit(this)">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Permanent Address -->
            <div class="section">
                <div class="section-title">Permanent Address</div>
                <div class="address-row">
                    <div class="field-group">
                        <div class="field-label">Address Line 1</div>
                        <div class="field-value editable" data-field="permanent_address_line1">
                            {{ $user->permanent_address_line1 ?? 'Not provided' }}
                            <span class="edit-icon">✎</span>
                        </div>
                        <div class="field-edit">
                            <input type="text" value="{{ $user->permanent_address_line1 }}">
                            <div class="field-edit-buttons">
                                <button class="btn-save" onclick="saveField(this, 'permanent_address_line1')">Save</button>
                                <button class="btn-cancel" onclick="cancelEdit(this)">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-label">Address Line 2</div>
                        <div class="field-value editable" data-field="permanent_address_line2">
                            {{ $user->permanent_address_line2 ?? 'Not provided' }}
                            <span class="edit-icon">✎</span>
                        </div>
                        <div class="field-edit">
                            <input type="text" value="{{ $user->permanent_address_line2 }}">
                            <div class="field-edit-buttons">
                                <button class="btn-save" onclick="saveField(this, 'permanent_address_line2')">Save</button>
                                <button class="btn-cancel" onclick="cancelEdit(this)">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="address-row">
                    <div class="field-group">
                        <div class="field-label">City</div>
                        <div class="field-value editable" data-field="permanent_city">
                            {{ $user->permanent_city ?? 'Not provided' }}
                            <span class="edit-icon">✎</span>
                        </div>
                        <div class="field-edit">
                            <input type="text" value="{{ $user->permanent_city }}">
                            <div class="field-edit-buttons">
                                <button class="btn-save" onclick="saveField(this, 'permanent_city')">Save</button>
                                <button class="btn-cancel" onclick="cancelEdit(this)">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field-label">State</div>
                        <div class="field-value editable" data-field="permanent_state">
                            {{ $user->permanent_state ?? 'Not provided' }}
                            <span class="edit-icon">✎</span>
                        </div>
                        <div class="field-edit">
                            <input type="text" value="{{ $user->permanent_state }}">
                            <div class="field-edit-buttons">
                                <button class="btn-save" onclick="saveField(this, 'permanent_state')">Save</button>
                                <button class="btn-cancel" onclick="cancelEdit(this)">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
console.log('Profile script loaded');

// Edit field functionality - wait for DOM to be ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded');

    // Setup editable field click handlers
    document.querySelectorAll('.editable').forEach(field => {
        field.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Editable field clicked:', this.dataset.field);

            const parent = this.parentElement;
            const fieldValue = parent.querySelector('.field-value');
            const fieldEdit = parent.querySelector('.field-edit');

            if (fieldEdit) {
                fieldValue.style.display = 'none';
                fieldEdit.style.display = 'block';
                const input = fieldEdit.querySelector('input');
                if (input) {
                    input.focus();
                    input.select();
                }
            }
        });
    });

    console.log('Attached', document.querySelectorAll('.editable').length, 'editable field handlers');
});


function cancelEdit(btn) {
    const fieldEdit = btn.closest('.field-edit');
    const fieldValue = fieldEdit.previousElementSibling;

    fieldValue.style.display = 'block';
    fieldEdit.style.display = 'none';
}

function saveField(btn, fieldName) {
    const fieldEdit = btn.closest('.field-edit');
    const fieldValue = fieldEdit.previousElementSibling;
    const input = fieldEdit.querySelector('input');
    const newValue = input.value.trim();

    console.log('Saving field:', fieldName, 'New value:', newValue);

    $.ajax({
        url: '/profile/update',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        data: {
            _token: '{{ csrf_token() }}',
            field: fieldName,
            value: newValue
        },
        success: function(response) {
            console.log('Server response:', response);

            // Update display correctly - replace entire content
            const displayText = newValue || 'Not provided';
            fieldValue.innerHTML = displayText + ' <span class="edit-icon">✎</span>';
            fieldValue.style.display = 'block';
            fieldEdit.style.display = 'none';
            showSuccessMessage();
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            console.error('Response Text:', xhr.responseText);
            console.error('Status Code:', xhr.status);

            if (xhr.status === 422) {
                alert('Validation error: ' + xhr.responseJSON.message);
            } else {
                alert('Error updating profile: ' + (xhr.responseJSON?.message || error || 'Unknown error'));
            }

            // Hide edit mode even on error
            fieldValue.style.display = 'block';
            fieldEdit.style.display = 'none';
        }
    });
}

function addQualificationField() {
    const newQual = prompt('Enter qualification:');
    if (newQual && newQual.trim() !== '') {
        console.log('Adding qualification:', newQual);
        $.ajax({
            url: '/profile/add-qualification',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                _token: '{{ csrf_token() }}',
                qualification: newQual.trim()
            },
            success: function(response) {
                console.log('Add qualification success:', response);
                if (response.status === 'success') {
                    showSuccessMessage();
                    // Add to the list without reload
                    const listSection = document.getElementById('qualifications-list');
                    const newIndex = listSection.children.length; // Current count = new index
                    const newItem = document.createElement('div');
                    newItem.className = 'list-item';
                    newItem.dataset.index = newIndex; // Store index as data attribute

                    // Create span for text (text-only, safe)
                    const textSpan = document.createElement('span');
                    textSpan.className = 'list-item-text';
                    textSpan.textContent = newQual.trim();

                    // Create button with event handler using data attribute
                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'btn-remove';
                    removeBtn.textContent = 'Remove';
                    removeBtn.type = 'button';
                    removeBtn.onclick = function(e) {
                        e.preventDefault();
                        removeQualification(newIndex);
                    };

                    newItem.appendChild(textSpan);
                    newItem.appendChild(removeBtn);
                    listSection.appendChild(newItem);
                    console.log('Qualification added to UI at index:', newIndex);
                }
            },
            error: function(xhr, status, error) {
                console.error('Add qualification error:', status, error);
                alert('Error adding qualification: ' + (xhr.responseJSON?.message || error));
            }
        });
    }
}

function removeQualification(index) {
    console.log('Removing qualification at index:', index);


    if (confirm('Are you sure you want to remove this qualification?')) {
        $.ajax({
            url: '/profile/remove-qualification',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                _token: '{{ csrf_token() }}',
                index: index
            },
            success: function(response) {
                console.log('Remove qualification success:', response);
                if (response.status === 'success') {
                    showSuccessMessage();
                    // Remove the item from DOM
                    const items = document.querySelectorAll('#qualifications-list .list-item');
                    if (items[index]) {
                        items[index].style.opacity = '0';
                        items[index].style.transition = 'opacity 0.3s';
                        setTimeout(() => {
                            items[index].remove();
                            reindexLists();
                            console.log('Qualification removed from UI');
                        }, 300);
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error('Remove qualification error:', status, error);
                console.error('Response:', xhr.responseText);
                alert('Error removing qualification: ' + (xhr.responseJSON?.message || error));
            }
        });
    }
}

function addExperienceField() {
    const newExp = prompt('Enter work experience:');
    if (newExp && newExp.trim() !== '') {
        console.log('Adding experience:', newExp);
        $.ajax({
            url: '/profile/add-experience',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                _token: '{{ csrf_token() }}',
                experience: newExp.trim()
            },
            success: function(response) {
                console.log('Add experience success:', response);
                if (response.status === 'success') {
                    showSuccessMessage();
                    // Add to the list without reload
                    const listSection = document.getElementById('experiences-list');
                    // New item is appended, so its index is the current length (before append? No, index = length)
                    // Wait, existing items 0..N-1. New item is N. Length is N. Correct.
                    const newIndex = listSection.children.length;

                    const newItem = document.createElement('div');
                    newItem.className = 'list-item';
                    newItem.dataset.index = newIndex;

                    const textSpan = document.createElement('span');
                    textSpan.className = 'list-item-text';
                    textSpan.textContent = newExp.trim();

                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'btn-remove';
                    removeBtn.textContent = 'Remove';
                    removeBtn.type = 'button';
                    removeBtn.onclick = function(e) {
                         e.preventDefault();
                         removeExperience(newIndex);
                    };

                    newItem.appendChild(textSpan);
                    newItem.appendChild(removeBtn);
                    listSection.appendChild(newItem);
                    console.log('Experience added to UI at index:', newIndex);

                    // Re-index just to be safe (though append matches standard index)
                    reindexLists();
                }
            },
            error: function(xhr, status, error) {
                console.error('Add experience error:', status, error);
                alert('Error adding experience: ' + (xhr.responseJSON?.message || error));
            }
        });
    }
}

function removeExperience(index) {
    console.log('Removing experience at index:', index);

    if (confirm('Are you sure you want to remove this experience?')) {
        $.ajax({
            url: '/profile/remove-experience',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                _token: '{{ csrf_token() }}',
                index: index
            },
            success: function(response) {
                console.log('Remove experience success:', response);
                if (response.status === 'success') {
                    showSuccessMessage();
                    const items = document.querySelectorAll('#experiences-list .list-item');
                    // Find the item with the correct data-index (since DOM order might match, but let's be properly robust)
                    // Actually, if we re-index on every change, the DOM order index matches the data-index.
                    // So items[index] should be correct IF we re-indexed previously.

                    if (items[index]) {
                        items[index].style.opacity = '0';
                        setTimeout(() => {
                            items[index].remove();
                            reindexLists(); // Critical step to keep indices in sync with server array_values
                        }, 300);
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error('Remove experience error:', status, error);
                alert('Error removing experience: ' + (xhr.responseJSON?.message || error));
            }
        });
    }
}

function reindexLists() {
    // Re-index Qualifications
    document.querySelectorAll('#qualifications-list .list-item').forEach((item, idx) => {
        item.dataset.index = idx;
        const btn = item.querySelector('.btn-remove');
        if(btn) {
            // Remove old onclick attribute if present (Blade generated)
            btn.removeAttribute('onclick');
            // set new handler
            btn.onclick = function(e) { e.preventDefault(); removeQualification(idx); };
        }
    });

    // Re-index Experiences
    document.querySelectorAll('#experiences-list .list-item').forEach((item, idx) => {
        item.dataset.index = idx;
        const btn = item.querySelector('.btn-remove');
        if(btn) {
            btn.removeAttribute('onclick');
            btn.onclick = function(e) { e.preventDefault(); removeExperience(idx); };
        }
    });

    console.log('Lists re-indexed');
}

// Profile picture upload
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('profile-pic-upload');
    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            console.log('Profile picture selected:', file?.name, file?.size);

            if (file) {
                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('profile_picture', file);

                $.ajax({
                    url: '/profile/upload-picture',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log('Picture upload success:', response);
                        const profilePic = document.querySelector('.profile-pic');
                        const reader = new FileReader();
                        reader.onload = function(readEvent) {
                            profilePic.innerHTML = '<img src="' + readEvent.target.result + '" alt="Profile">';
                        };
                        reader.readAsDataURL(file);
                        showSuccessMessage();
                    },
                    error: function(xhr, status, error) {
                        console.error('Picture upload error:', status, error);
                        console.error('Response:', xhr.responseText);
                        alert('Error uploading picture: ' + (xhr.responseJSON?.message || error));
                    }
                });
            }
        });
    }
});

function showSuccessMessage() {
    const msg = document.getElementById('successMessage');
    if (msg) {
        msg.style.display = 'block';
        setTimeout(function() {
            msg.style.display = 'none';
        }, 3000);
    }
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}
</script>
</body>
</html>
