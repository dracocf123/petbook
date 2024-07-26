<?php 
session_start();
if(!isset($_SESSION['id_num'])){
   header('location:adminlogout.php');
 }
if($_SESSION['role']!="admin"){
    header('location:adminlogout.php');
}
include_once 'topnavbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
<main >
    <div class="container">
    <div class="filter-container-css">
        <select id="filter-dropdown">
            <option value="">All</option>
            <option value="Cat">Cat</option>
            <option value="Dog">Dog</option>
            <!-- Add more filter options as needed -->
        </select>
        <input type="text" id="filter-input" placeholder="Search...">
        <button id="apply-filter">Search</button>
    </div>
    <div class="card-container-css" id="card-container">
        <!-- Cards will be inserted here dynamically -->
    </div>
    <div class="pagination-css">
        <button id="prev" onclick="prevPage()">Prev</button>
        <span id="page-info"></span>
        <button id="next" onclick="nextPage()">Next</button>
    </div>
    </div>
  </main>
  <script>
    const cardContainer = document.getElementById('card-container');
    const pageInfo = document.getElementById('page-info');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const filterDropdown = document.getElementById('filter-dropdown');
    const filterInput = document.getElementById('filter-input');
    const applyFilterButton = document.getElementById('apply-filter');

    let cards = [];
    let filteredCards = [];
    const cardsPerPage = 8;
    let currentPage = 1;

    function fetchCards() {
        fetch('scriptdata/petdata.php')
            .then(response => response.json())
            .then(data => {
                cards = data;
                filteredCards = cards; // Initialize filteredCards with all cards
                renderCards();
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function applyFilter() {
        const selectedFilter = filterDropdown.value;
        const searchText = filterInput.value.toLowerCase();

        filteredCards = cards.filter(card => {
            const matchesType = selectedFilter === '' || card.type === selectedFilter;
            const matchesSearch = card.name.toLowerCase().includes(searchText);
            return matchesType && matchesSearch;
        });

        currentPage = 1; // Reset to first page when applying filter
        animateCards();
    }

    function animateCards() {
        // Add class to fade out old cards
        const existingCards = document.querySelectorAll('.card-css');
        existingCards.forEach(card => {
            card.classList.remove('show');
            card.classList.add('fade-out');
        });

        // Wait for fade-out to complete before rendering new cards
        setTimeout(() => {
            renderCards(); // Render new cards
        }, 500); // Match this duration with CSS fade-out duration

        // Remove fade-out class after the animation
        setTimeout(() => {
            const cardsToShow = cardContainer.querySelectorAll('.card-css');
            cardsToShow.forEach(card => {
                card.classList.remove('fade-out');
            });
        }, 1000); // Allow time for cards to fade in
    }

    function renderCards() {
        cardContainer.innerHTML = ''; // Clear container

        const start = (currentPage - 1) * cardsPerPage;
        const end = start + cardsPerPage;
        const cardsToShow = filteredCards.slice(start, end);

        cardsToShow.forEach(cardData => {
            const card = document.createElement('div');
            const cardimg = document.createElement('img');
            card.className = 'card-css show'; // Add 'show' class to make it visible
            cardimg.src = cardData.petimage;
            cardimg.className = 'cardimg';
            card.appendChild(cardimg);
            cardContainer.appendChild(card);

            card.onclick = () => {
                openNewPageWithUrl(cardData.petid);
            };
        });

        updatePagination();
    }

    function openNewPageWithUrl(petid) {
        const newPageUrl = `petview.php?petid=${encodeURIComponent(petid)}`;
        window.open(newPageUrl, '_blank');
    }

    function updatePagination() {
        const totalPages = Math.ceil(filteredCards.length / cardsPerPage);
        pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === totalPages;
    }

    function nextPage() {
        if (currentPage < Math.ceil(filteredCards.length / cardsPerPage)) {
            currentPage++;
            animateCards();
        }
    }

    function prevPage() {
        if (currentPage > 1) {
            currentPage--;
            animateCards();
        }
    }

    // Add event listeners
    applyFilterButton.addEventListener('click', applyFilter);
    filterInput.addEventListener('input', applyFilter);
    filterDropdown.addEventListener('change', applyFilter);

    document.addEventListener('DOMContentLoaded', fetchCards);
</script>
</body>
</html>