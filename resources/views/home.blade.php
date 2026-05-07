<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #f4f5f7;
            --white: #ffffff;
            --primary: #1a56db;
            --primary-dark: #1345b7;
            --primary-light: #ebf0ff;
            --success: #057a55;
            --success-light: #def7ec;
            --danger: #c81e1e;
            --danger-light: #fde8e8;
            --text: #111928;
            --text-secondary: #374151;
            --muted: #6b7280;
            --border: #d1d5db;
            --border-light: #e5e7eb;
            --radius: 6px;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
            --shadow: 0 1px 3px rgba(0,0,0,0.08), 0 4px 12px rgba(0,0,0,0.04);
        }

        body {
            font-family: 'IBM Plex Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            font-size: 14px;
            line-height: 1.5;
        }

        /* TOP BAR */
        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 56px;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .topbar-brand {
            font-size: 15px;
            font-weight: 600;
            color: var(--text);
            letter-spacing: -0.2px;
        }
        .topbar-brand span {
            color: var(--primary);
        }
        .topbar-nav {
            display: flex;
            gap: 2px;
        }
        .nav-link {
            padding: 7px 14px;
            border-radius: var(--radius);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            color: var(--muted);
            transition: all 0.15s;
            letter-spacing: 0.1px;
        }
        .nav-link:hover, .nav-link.active {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
        }

        /* PAGE */
        .page {
            max-width: 1240px;
            margin: 0 auto;
            padding: 36px 40px 60px;
        }

        /* PAGE HEADING */
        .page-heading {
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-light);
        }
        .page-heading h1 {
            font-size: 20px;
            font-weight: 600;
            letter-spacing: -0.3px;
            color: var(--text);
        }
        .page-heading p {
            font-size: 13px;
            color: var(--muted);
            margin-top: 3px;
        }

        /* CARD */
        .card {
            background: var(--white);
            border: 1px solid var(--border-light);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            margin-bottom: 20px;
            overflow: hidden;
        }
        .card-header {
            padding: 14px 24px;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fafafa;
        }
        .card-title {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .record-count {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 12px;
            color: var(--muted);
            background: var(--bg);
            border: 1px solid var(--border-light);
            padding: 2px 9px;
            border-radius: 4px;
        }
        .card-body { padding: 20px 24px; }

        /* FORM */
        .form-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: flex-end;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
            flex: 1;
            min-width: 110px;
        }
        .form-group label {
            font-size: 11.5px;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .form-control {
            padding: 8px 11px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 13.5px;
            color: var(--text);
            background: var(--white);
            outline: none;
            transition: border 0.15s, box-shadow 0.15s;
            width: 100%;
        }
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26,86,219,0.08);
        }
        .form-control::placeholder { color: #9ca3af; }

        /* BUTTONS */
        .btn {
            padding: 8px 16px;
            border-radius: var(--radius);
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 13.5px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.15s;
            white-space: nowrap;
            display: inline-block;
            text-decoration: none;
            text-align: center;
            letter-spacing: 0.1px;
        }
        .btn-primary {
            background: var(--primary);
            color: #fff;
        }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-success {
            background: var(--success-light);
            color: var(--success);
            border: 1px solid #a7f3d0;
        }
        .btn-success:hover { background: var(--success); color: #fff; border-color: var(--success); }
        .btn-danger {
            background: var(--danger-light);
            color: var(--danger);
            border: 1px solid #fca5a5;
        }
        .btn-danger:hover { background: var(--danger); color: #fff; border-color: var(--danger); }
        .btn-sm { padding: 5px 12px; font-size: 12.5px; }

        /* TABLE */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        thead tr { background: #f9fafb; }
        th {
            padding: 10px 16px;
            text-align: left;
            font-size: 11.5px;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.6px;
            border-bottom: 1px solid var(--border-light);
            white-space: nowrap;
        }
        td {
            padding: 12px 16px;
            font-size: 13.5px;
            border-bottom: 1px solid var(--border-light);
            vertical-align: middle;
            color: var(--text-secondary);
        }
        td.id-cell {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 12.5px;
            color: var(--muted);
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: #f9fafb; }

        /* BADGE */
        .badge {
            display: inline-block;
            padding: 2px 9px;
            border-radius: 4px;
            font-size: 11.5px;
            font-weight: 600;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }
        .badge-active { background: var(--success-light); color: var(--success); }
        .badge-inactive { background: var(--danger-light); color: var(--danger); }

        /* INLINE EDIT */
        .edit-row { display: flex; gap: 6px; flex-wrap: wrap; align-items: center; margin-bottom: 6px; }
        .edit-row .form-control { padding: 5px 8px; font-size: 12.5px; flex: 1; min-width: 70px; }
        .edit-row select.form-control { flex: 0 0 95px; }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 52px 24px;
            color: var(--muted);
        }
        .empty-state .empty-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 4px;
        }
        .empty-state .empty-sub { font-size: 13px; }

        /* DIVIDER */
        .divider {
            height: 1px;
            background: var(--border-light);
            margin: 4px 0 10px;
        }
    </style>
</head>
<body>

    {{-- TOP NAVIGATION --}}
    <header class="topbar">
        <div class="topbar-brand">Student <span>Management System</span></div>
        <nav class="topbar-nav">
            <a class="nav-link {{ request()->is('students') ? 'active' : '' }}" href="/students">All Students</a>
            <a class="nav-link {{ request()->is('students/active') ? 'active' : '' }}" href="/students/active">Active Students</a>
            <a class="nav-link {{ request()->is('students/gmail') ? 'active' : '' }}" href="/students/gmail">Gmail Students</a>
            <span style="margin-left:12px; font-size:13px; color:var(--muted); align-self:center;">
                {{ auth()->user()->name }}
                <span style="background:var(--primary-light);color:var(--primary);padding:2px 8px;border-radius:4px;font-size:11px;font-weight:700;text-transform:uppercase;margin-left:4px;">{{ auth()->user()->role }}</span>
            </span>
            <form method="POST" action="/logout" style="margin-left:8px;">
                @csrf
                <button type="submit" class="btn" style="background:var(--danger-light);color:var(--danger);font-size:13px;padding:6px 14px;">Logout</button>
            </form>
        </nav>
    </header>

    <main class="page">

        {{-- PAGE HEADING --}}
        <div class="page-heading">
            <h1>{{ $title ?? 'Students List' }}</h1>
            <p>Manage student records — add, update, or remove entries below.</p>
        </div>

        {{-- ADD STUDENT FORM - Admin only --}}
        @if(auth()->user()->role === 'admin')
        <div class="card">
            <div class="card-header">
                <span class="card-title">Add New Student</span>
            </div>
            <div class="card-body">
                <form action="/students/add" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Juan Dela Cruz" required>
                        </div>
                        <div class="form-group" style="flex:0 0 85px">
                            <label>Age</label>
                            <input class="form-control" type="number" name="age" placeholder="20" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address" placeholder="City, Province" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control" type="email" name="email" placeholder="email@example.com" required>
                        </div>
                        <div class="form-group" style="flex:0 0 120px">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex:0 0 auto">
                            <label>&nbsp;</label>
                            <button class="btn btn-primary" type="submit">Add Student</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif

        {{-- STUDENTS TABLE --}}
        <div class="card">
            <div class="card-header">
                <span class="card-title">Student Records</span>
                <span class="record-count">{{ count($students) }} {{ count($students) == 1 ? 'record' : 'records' }}</span>
            </div>
            <div class="table-wrap">
                @if(count($students) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td class="id-cell">#{{ $student->id }}</td>
                        <td style="font-weight:500; color:var(--text)">{{ $student->name }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <span class="badge {{ $student->status == 'active' ? 'badge-active' : 'badge-inactive' }}">
                                {{ ucfirst($student->status) }}
                            </span>
                        </td>
                        <td>
                            @if(auth()->user()->role === 'admin')
                            <form action="/students/update/{{ $student->id }}" method="POST">
                                @csrf
                                <div class="edit-row">
                                    <input class="form-control" type="text" name="name" value="{{ $student->name }}" required>
                                    <input class="form-control" type="number" name="age" value="{{ $student->age }}" required style="flex:0 0 60px">
                                    <input class="form-control" type="text" name="address" value="{{ $student->address }}" required>
                                    <input class="form-control" type="email" name="email" value="{{ $student->email }}" required>
                                    <select class="form-control" name="status">
                                        <option value="active" {{ $student->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $student->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    <button class="btn btn-success btn-sm" type="submit">Update</button>
                                    <a href="/students/delete/{{ $student->id }}"
                                       onclick="return confirm('Are you sure you want to delete {{ $student->name }}? This action cannot be undone.')">
                                        <button class="btn btn-danger btn-sm" type="button">Delete</button>
                                    </a>
                                </div>
                            </form>
                            @else
                                <span style="font-size:12px; color:var(--muted)">View only</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                <div class="empty-state">
                    <div class="empty-title">No student records found</div>
                    <div class="empty-sub">Use the form above to add your first student.</div>
                </div>
                @endif
            </div>
        </div>

    </main>

</body>
</html>
