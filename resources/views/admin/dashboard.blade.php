<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Employee List</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f3e5f5; /* Light purple background */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #333;
        }

        .user-info {
            font-size: 14px;
            color: #333;
        }

        .logout-btn {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
            cursor: pointer;
            border: none;
            background: none;
        }

        .logout-btn:hover {
            text-decoration: underline;
        }

        .list-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            flex-grow: 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            text-align: left;
            font-size: 14px;
            font-weight: 600;
            color: #333;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        td {
            padding: 20px 0;
            font-size: 14px;
            color: #555;
            border-bottom: 1px solid #f9f9f9;
        }

        .action-link {
            color: #4facfe;
            text-decoration: none;
            font-weight: 500;
        }

        .action-link:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: auto;
            padding-top: 20px;
            font-weight: 600;
            color: #333;
        }
        
        /* Logout Form Styling */
        form.logout-form {
            display: inline;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Employee List</h1>
        <div class="user-info">
            Hi, Admin 
            <form action="/admin/logout" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Log Out</button>
            </form>
        </div>
    </div>

    <div class="list-card">
        <table>
            <thead>
                <tr>
                    <th style="width: 25%">Name</th>
                    <th style="width: 30%">Email</th>
                    <th style="width: 25%">Qualification</th>
                    <th style="width: 20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        {{-- Assuming qualification is stored as JSON or string. Decoding if valid json, else showing as is --}}
                        @if(is_string($employee->qualifications) && is_array(json_decode($employee->qualifications, true)))
                             {{ implode(', ', json_decode($employee->qualifications, true)) }}
                        @else
                             {{ $employee->qualifications ?? 'N/A' }}
                        @endif
                    </td>
                    <td><a href="/admin/employee/{{ $employee->id }}" class="action-link">View</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 40px;">No employees found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    

</body>
</html>
