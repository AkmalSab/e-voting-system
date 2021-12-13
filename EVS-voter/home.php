<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Voting System</title>
  <link rel="icon" href="../images/Logo_E-Undi.png" type="image/x-icon">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bonos-voter.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <p class="logo">EVS</p>
    <nav>
      <ul class="nav__links">
        <li><a href="home.php">Election</a></li>
        <li><a href="nomination.php">Nomination</a></li>
      </ul>
    </nav>
    <a class="cta" href="logout.php">Logout</a>

  </header>

  <div class="div1">
    <h1 class="title">Election</h1>
    <div class="history">
      <a href="#">Enroll Election</a>
    </div>

    <div class="container">
      <div class="row">
        <div class="cs-12">

          <div>
            <table>
              <thead>
                <tr class="trh">

                  <th>Election Title</th>
                  <th>Election Start</th>
                  <th>Election End</th>
                  <th>Candidates</th>
                  <th>Result</th>
                  <th>Voting</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'php/session.php';
                $query = "SELECT *, positions.status AS stat, positions.id AS id FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id LEFT JOIN enroll ON enroll.position_id=positions.id where enroll.voters_id ='" . $voter['id'] . "' GROUP BY positions.id";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                while ($row = mysqli_fetch_array($result)) {
                  $id = $row['id'];
                  $description = $row['description'];
                  if ($row['stat'] == 'Ongoing') {
                    echo "
                        <tr>
                          <td style='text-transform: uppercase; padding-left: 100px;'>" . $row['description'] . "</td>
                          <td style='text-transform: uppercase; padding-left: 100px;'>" . $row['startdate'] . "</td>
                          <td style='text-transform: uppercase; padding-left: 100px;'>" . $row['enddate'] . "</td>
                          <td>
                            <a href='view_candidate.php?id=" . $row['position_id'] . "'> View </a>
                          </td>
                          <td>
                            <a href='view_result.php?id=" . $row['position_id'] . "'> View </a>
                          </td>
                          <td>
                            <a href='vote_candidate.php?id=" . $row['position_id'] . "'> View </a>
                          </td>
                        </tr>
                      ";
                  } elseif ($row['stat'] == 'Pending') {
                    echo "
                        <tr>
                          <td style='text-transform: uppercase; padding-left: 100px;'>" . $row['description'] . "</td>
                          <td style='text-transform: uppercase; padding-left: 100px;'>" . $row['startdate'] . "</td>
                          <td style='text-transform: uppercase; padding-left: 100px;'>" . $row['enddate'] . "</td>
                          <td>
                            <a href='view_candidate.php?id=" . $row['position_id'] . "'> View </a>
                          </td>
                          <td>
                            <a href='view_result.php?id=" . $row['position_id'] . "'> View </a>
                          </td>
                          <td>
                            <a href='vote_candidate.php?id=" . $row['position_id'] . "'> View </a>
                          </td>
                        </tr>
                      ";
                  }
                }
                ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

  </div>
  </div>
  </div>
</body>

</html>