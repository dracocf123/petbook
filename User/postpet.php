<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="user.css">
    <style>
        .image-box {
            position: relative;
            width: 100%;
            max-width: 300px;
            height: 300px;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 15px;
        }
        .image-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
        .image-box label {
            position: absolute;
            bottom: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 5px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
    <script>
        function updateBreeds() {
            const typeSelect = document.querySelector('select[name="type"]');
            const breedSelect = document.querySelector('select[name="breed"]');
            const selectedType = typeSelect.value;
            // Fetch breed options using AJAX
            $.ajax({
                type: 'POST',
                url: 'breeddata.php',
                data: { type: selectedType },
                dataType: 'json',
                success: function(response) {
                    // Clear current breed options
                    breedSelect.innerHTML = '';

                    // Populate breed options with the response data
                    response.forEach(breed => {
                        const option = document.createElement('option');
                        option.value = breed;
                        option.textContent = breed;
                        breedSelect.appendChild(option);
                    });
                },
                error: function() {
                    console.error('Error fetching breed options');
                }
            });
        }

        // Call updateBreeds() on page load to set initial breed options
        document.addEventListener('DOMContentLoaded', () => {
            updateBreeds();
        });

        function getImagePreview(event, previewId) {
            var image = URL.createObjectURL(event.target.files[0]);
            var previewDiv = document.getElementById(previewId);
            previewDiv.innerHTML = '';
            var newimg = document.createElement('img');
            newimg.src = image;
            previewDiv.appendChild(newimg);
        }

        function openFileDialog(inputId) {
            document.getElementById(inputId).click();
        }
    </script>
</head>
<body>
    <?php 
    session_start();
    if (!isset($_SESSION['id_num'])) {
        header('location:../logout.php');
    }
    if ($_SESSION['role'] != "user") {
        header('location:../index.php');
    }
    $uid = $_SESSION['id_num'];
    include_once 'usernav.php';
    ?>
    <form method="POST" action="addpet.php" enctype="multipart/form-data">
        <div class="container">
            <div class="bg-light donation-card">
                <h5>Pet for adoption?</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="image-box">
                            <label onclick="openFileDialog('petImageInput')">Pet Image</label>
                            <div id="petImagePreview"><img src="default_pet_image.jpg" alt="Pet Image"></div>
                        </div>
                        <input type="file" id="petImageInput" name="petImage" style="display:none;" onchange="getImagePreview(event, 'petImagePreview')">
                    </div>
                    <div class="col-md-4">
                        <div class="image-box">
                            <label onclick="openFileDialog('govIdInput')">Government ID</label>
                            <div id="govIdPreview"><img src="default_gov_id_image.jpg" alt="Government ID Image"></div>
                        </div>
                        <input type="file" id="govIdInput" name="govId" style="display:none;" onchange="getImagePreview(event, 'govIdPreview')">
                    </div>
                    <div class="col-md-4">
                        <div class="image-box">
                            <label onclick="openFileDialog('selfieInput')">Selfie with the Pet</label>
                            <div id="selfiePreview"><img src="default_selfie_image.jpg" alt="Selfie with pet"></div>
                        </div>
                        <input type="file" id="selfieInput" name="selfie" style="display:none;" onchange="getImagePreview(event, 'selfiePreview')">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <table class="w-100">
                            <tr>
                                <td><label for="">Name of Pet:</label></td>
                                <td><input type="text" name="name" class="form-control form-control-sm"></td>
                            </tr>
                            <tr>
                                <td><label for="">Type:</label></td>
                                <td><select name="type" class="form-control form-control-sm" onchange="updateBreeds()">
                                    <option value="Cat">Cat</option>
                                    <option value="Dog">Dog</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td><label for="">Breed:</label></td>
                                <td><select name="breed" class="form-control form-control-sm"></select></td>
                            </tr>
                            <tr>
                                <td><label for="">Gender:</label></td>
                                <td><select name="gender" class="form-control form-control-sm">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select></td>
                            </tr>
                        </table>
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                        <button type="submit" name="petreg" class="mt-2 btn btn-primary">Post</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
