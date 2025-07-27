<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Student System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">
    <header class="dashboard-header">
        <h1>🎓 Student Dashboard</h1>
        <div class="user-info">
            <span>Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?></span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </header>

    <main class="dashboard-main">
        <div class="card-grid">
            <a href="student_form.php" class="dashboard-card">➕ Add Student</a>
            <a href="view_students.php" class="dashboard-card">👥 View Students</a>
            <a href="course.php" class="dashboard-card">📚 Add Course</a>
            <a href="grade.php" class="dashboard-card">📝 Add Grades</a>
            <a href="attendance.php" class="dashboard-card">📅 Record Attendance</a>
        </div>
    </main>
</body>
</html>
