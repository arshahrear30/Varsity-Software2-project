<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"><title>Attendance</title></head>
<body>
<h2>Record Attendance</h2>
<form method="post">
    <select name="student_id">
        <option value="">Select Student</option>
        <?php
        $students = $conn->query("SELECT * FROM students");
        while ($s = $students->fetch_assoc())
            echo "<option value='{$s['id']}'>{$s['name']}</option>";
        ?>
    </select>

    <select name="course_id">
        <option value="">Select Course</option>
        <?php
        $courses = $conn->query("SELECT * FROM courses");
        while ($c = $courses->fetch_assoc())
            echo "<option value='{$c['id']}'>{$c['course_name']}</option>";
        ?>
    </select>

    <input type="date" name="date" required>
    <select name="status">
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
    </select>
    <button type="submit">Save</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sid = $_POST['student_id'];
    $cid = $_POST['course_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $conn->query("INSERT INTO attendance (student_id, course_id, date, status) VALUES ($sid, $cid, '$date', '$status')");
    echo "Attendance saved!";
}
?>
</body>
</html>
