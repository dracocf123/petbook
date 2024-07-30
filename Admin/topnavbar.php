<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-sm bg-black navbar-dark">
        <div class="container">
          <!-- offcanvas trigger -->
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
          </button>
          <!-- offcanvas trigger end -->
          <a class="navbar-brand fw-bold" href="adminhome.php">Paws-Connect</a>
        </div>
      </nav>
      <!-- offcanvas sidebar -->
<div class="offcanvas offcanvas-start bg-black text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-body p-0">
    <nav class="navbar-dark">
        <ul class="navbar-nav">
            <li class="sidelink mt-4">
                <a href="adminhome.php" class="nav-link px-3 active"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                <hr class="dropdown-divider"/>
                <a href="pets.php" class="nav-link px-3 active"><i class="fa-solid fa-paw"></i> Pets</a>
                <hr class="dropdown-divider"/>
                <a href="shelter.php" class="nav-link px-3 active"><i class="fa-solid fa-building-shield"></i> Shelter Panel</a>
                <hr class="dropdown-divider"/>
                <a href="breed.php" class="nav-link px-3 active"><i class="fa-solid fa-file-contract"></i> Add Breed</a>
                <hr class="dropdown-divider"/>
                <a href="status.php" class="nav-link px-3 active"><i class="fa-solid fa-file-contract"></i> Status</a>
                <hr class="dropdown-divider"/>
                <a href="adminlogout.php" class="nav-link child active p-3 log"><i class="fa-solid fa-right-from-bracket"></i> Log out</a> 
            </li>
        </ul>
    </nav>
  </div>
</div>
<!-- offcanvas sidebar -->
</body>
</html>