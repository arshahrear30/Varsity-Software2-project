<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"><title>Add Grade</title></head>
<body>
<h2>Assign Grade</h2>
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

    <input type="text" name="grade" placeholder="Grade (e.g., A+)" required>
    <button type="submit">Submit</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sid = $_POST['student_id'];
    $cid = $_POST['course_id'];
    $grade = $_POST['grade'];
    $conn->query("INSERT INTO grades (student_id, course_id, grade) VALUES ($sid, $cid, '$grade')");
    echo "Grade added!";
}
?>
</body>
</html>
