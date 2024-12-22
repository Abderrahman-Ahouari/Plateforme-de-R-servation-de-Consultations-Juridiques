<?php
include('connection.php');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== "lawyer") {
  header("location: http://localhost/Plateforme%20de%20R%C3%A9servation%20de%20Consultations%20Juridiques/lawyer_dashboard.php");
    exit();
}

// $lawyer_id =  $_SESSION['user_id']; 
$lawyer_id =  '1'; 


$get_lawyer_info = $conn->prepare("SELECT * FROM avocat WHERE avocat_id = ?");
$get_lawyer_info->bind_param("i", $lawyer_id);
$get_lawyer_info->execute();
$lawyer_info = $get_lawyer_info->get_result()->fetch_assoc();


$get_consultation_info = $conn->prepare("
    SELECT clients.nom, clients.prenom, clients.tele, consultation.consultation_day, consultation.consultation_id 
    FROM clients
    INNER JOIN consultation ON clients.client_id = consultation.client_id 
    WHERE consultation.id_avocat = ?;
");
$get_consultation_info->bind_param("i", $lawyer_id);
$get_consultation_info->execute();
$result2 = $get_consultation_info->get_result();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['consultation_id'], $_POST['action'])) {
        $consultation_id = $_POST['consultation_id'];
        $action = $_POST['action'];

        if ($action === 'accept') {
            $update_query = $conn->prepare("UPDATE consultation SET statu = 'confirmed' WHERE consultation_id = ?");
        } elseif ($action === 'reject') {
            $update_query = $conn->prepare("UPDATE consultation SET statu = 'canceled' WHERE consultation_id = ?");
        }

        if (isset($update_query)) {
            $update_query->bind_param("i", $consultation_id);
            $update_query->execute();
            $update_query->close();
        }
    } 
    $conn->close();
    header("Location: http://localhost/Plateforme%20de%20R%C3%A9servation%20de%20Consultations%20Juridiques/lawyer_dashboard.php");
    exit();
}


?>

   <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>My_Lawyer</title>
            <script src="https://cdn.tailwindcss.com"></script>
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="lawyer_dashboard.css">
        </head>
    <body>
      <section class="container">
        <div class="lawyer-info">
          <div class="avatar">
            <img src="avatar-placeholder.jpg" alt="Lawyer Avatar">
          </div>
          <div class="info ">
            <div><strong>First Name:</strong><?php echo $lawyer_info['nom'];?></div>
            <div><strong>Last Name:</strong> <?php echo $lawyer_info['prenom'];?></div>
            <div><strong>Email:</strong> <?php echo $lawyer_info['email'];?></div>
            <div><strong>Phone:</strong> <?php echo $lawyer_info['tele'];?></div>
            <div><strong>Speciality:</strong><?php echo $lawyer_info['specialité'];?></div>
          </div>
          <div class="bio">
            <strong>Biography:</strong>
            <p> <?php echo $lawyer_info['biographie'];?> </p>
          </div>
        </div>
    </section>

<section class="reservations container">
        <h2>Reservations Requests</h2>
        <div class="table-container">
          <table class="reservations-table">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Consultation Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
<?php while($consultations_info = $result2->fetch_assoc()){ ?>        
              <tr>
                <td><?php echo $consultations_info['nom']; ?></td>
                <td><?php echo $consultations_info['prenom']; ?></td>
                <td><?php echo $consultations_info['tele']; ?></td>
                <td><?php echo $consultations_info['consultation_day']; ?></td>
                <td class="">
        <form action="" method="post" style="display:inline;">
            <input type="hidden" name="consultation_id" value="<?php echo $consultations_info['consultation_id']; ?>">
            <button type="submit" name="action" value="accept" class="btn accept">Accept</button>
        </form>
        <form action="" method="post" style="display:inline;">
            <input type="hidden" name="consultation_id" value="<?php echo $consultations_info['consultation_id']; ?>">
            <button type="submit" name="action" value="reject" class="btn reject">Reject</button>
        </form>
    </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </section>




<section class="statistics container">
        <h2>Statistics</h2>
        <div class="stats-grid">
          <div class="stat-box">
            <h3>Pending Requests</h3>
            <p>15</p>
          </div>
          <div class="stat-box">
            <h3>Approved for Today</h3>
            <p>8</p>
          </div>
          <div class="stat-box">
            <h3>Approved for Tomorrow</h3>
            <p>5</p>
          </div>
        </div>
        <div class="next-client">
          <h3>Next Client Details</h3>
          <ul>
            <li><strong>First Name:</strong> Jane</li>
            <li><strong>Last Name:</strong> Smith</li>
            <li><strong>Email:</strong> jane.smith@example.com</li>
            <li><strong>Phone:</strong> +123456789</li>
            <li><strong>Consultation Day:</strong> 2024-12-19</li>
          </ul>
        </div>
      </section>

      

      
    </body>
    </html>
    
</body>
</html>