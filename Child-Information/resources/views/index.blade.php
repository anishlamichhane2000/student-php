
<!DOCTYPE html>
<html>
<head>
    <title>Child Information System</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Child Information System</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form id="childForm" action="/save" method="post">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>Child First Name</th>
                    <th>Child Last Name</th>
                    <th>Child Age</th>
                    <th>Gender</th>
                    <th></th> <!-- For Delete button column -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="child_first_name[]" required></td>
                    <td><input type="text" name="child_last_name[]" required></td>
                    <td><input type="number" name="child_age[]" required></td>
                    <td>
                        <select name="child_gender[]" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                    <td><button type="button" class="deleteRowButton">Delete</button></td>
                </tr>
            </tbody>
        </table>

        <label>Different Address?</label>
        <input type="checkbox" id="differentAddressCheckbox">
        
        <div id="addressFields">
            <!-- Address fields (disabled by default) -->
            Child Address: <input type="text" name="child_address[]" disabled><br>
            Child City: <input type="text" name="child_city[]" disabled><br>
            Child State: <input type="text" name="child_state[]" disabled><br>
            Child Country: <input type="text" name="child_country[]" disabled><br>
            Child Zip Code: <input type="text" name="child_zip[]" disabled><br>
        </div>

        <button type="submit">Save</button>
        <button type="button" id="addChildButton">Add New</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Toggle address fields
            $('#differentAddressCheckbox').on('change', function() {
                $('#addressFields input').prop('disabled', !this.checked);
            });

            // Add new row
            $('#addChildButton').on('click', function() {
                var newRow = `
                    <tr>
                        <td><input type="text" name="child_first_name[]" required></td>
                        <td><input type="text" name="child_last_name[]" required></td>
                        <td><input type="number" name="child_age[]" required></td>
                        <td>
                            <select name="child_gender[]" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </td>
                        <td><button type="button" class="deleteRowButton">Delete</button></td>
                    </tr>
                `;
                $('tbody').append(newRow);
            });

            // Delete row
            $(document).on('click', '.deleteRowButton', function() {
                $(this).closest('tr').remove();
            });

            // Submit form
            $('#childForm').on('submit', function(event) {
                event.preventDefault();
                
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Child information saved successfully.');
                        location.reload();
                    },
                    error: function(xhr) {
                        // Handle validation errors
                        var errors = xhr.responseJSON.errors;
                        for (var field in errors) {
                            alert(errors[field][0]);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
