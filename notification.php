<?php 
    include('config.php');
?>


<?php
//Function to send notification (you can customize this based on your notification method, e.g., email, in-app notification)
function sendNotification($taskName, $DueDate) {
    // Code to send notification
    // For example, you could send an email or trigger a real-time in-app notification
    // Replace this with your preferred notification method
    $message = "Task: " . $taskName . " is due on " . $DueDate;
    // Sample code to send email notification (you would need to set up a mail server for this)
    mail("user@example.com", "Task Due Date Reminder", $message);
}

// Get current date
$currentDate = date('Y-m-d');

// Query to select tasks with approaching due dates
$sql = "SELECT TaskID, TaskName, DueDate FROM tasks WHERE DueDate = DATE_ADD('$currentDate', INTERVAL 1 DAY)";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Send notifications for each task with approaching due date
        sendNotification($row['TaskName'], $row['DueDate']);
    }
} else {
    echo "No tasks with approaching due dates.";
}

$conn->close();
?>
<script>
function sendNotification(message, notificationTime) {
  const now = new Date();
  const notificationDateTime = new Date(now);
  
  // Parse the notificationTime in 'HH:mm' format
  const [hours, minutes] = notificationTime.split(':');
  
  // Set the desired notification time
  notificationDateTime.setHours(Number(hours), Number(minutes), 0, 0);
  
  // Calculate the time difference between now and the notification time
  const delayInMilliseconds = notificationDateTime - now;
  
  if (delayInMilliseconds <script 0) {
    console.log('Notification time has already passed.');
    return;
  }

  setTimeout(() => showNotification(message), delayInMilliseconds);
}

function showNotification(message) {
  if (Notification.permission === 'granted') {
    new Notification('Notification', { body: message });
  }
}

// Request permission for notifications
if (Notification.permission !== 'granted') {
  Notification.requestPermission();
}

// Schedule the notification at 20:30
sendNotification('Notification at 14:18', '14:18 ');
</script>
