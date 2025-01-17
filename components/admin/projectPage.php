<?php
session_start();
if (!isset($_SESSION['signedIn'])) {
    header("Location: ../../index.html");
    exit();
}
include '../../_api/_db.php';
$uname = $_SESSION['uname'];
$aID = $_SESSION['aID'];

$chk_sql = "SELECT * FROM `admin` WHERE a_id ='$aID';";
$res_chk = mysqli_query($con, $chk_sql);
$row = mysqli_fetch_assoc($res_chk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWANIMS</title>
    <link rel="icon" href="../../img/SWAN-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Kelly+Slab&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="../../css/style.css">

</head>

<body class="flex flex-col h-screen justify-between overflow-hidden">
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap flex-col p-4 md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 md:mb-0" href="projectList.php">
                <img class="bg-none h-16 w-72" src="../../img/logo.png">
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900 font-semibold"></a>
                <a class="mr-5 hover:text-gray-900 font-semibold"></a>
            </nav>
            <button
                class="inline-flex items-center bg-blue-600 border-0 py-1 px-3 focus:outline-none hover:bg-blue-900 rounded text-base text-white font-bold border-2 border-blue-900 mx-2 md:mt-0"
                onclick="window.location.href='../main.php'">
                Home
            </button>

            <p class="flex title-font font-medium items-center text-gray-900 md:mb-0 ml-4 mr-2" href="#">

                <?php
                if (!isset($_SESSION['signedIn'])) {
                    echo 'Hi, ' . $uname;
                } else {
                    echo 'Admin, ' . $uname;
                }
                ?>

            </p>

            <div class="relative">
                <button id="dropdownButton" class="flex items-center focus:outline-none">
                    <?php
                    if (strcmp($row['a_gender'], 'M') == 0) {
                        echo '<img class="bg-none h-16 w-16 rounded-full" src="../../img/male.png" alt="User Avatar">';
                    } elseif (strcmp($row['a_gender'], 'F') == 0) {
                        echo '<img class="bg-none h-16 w-16 rounded-full" src="../../img/female.png" alt="User Avatar">';
                    } else {
                        echo '<img class="bg-none h-16 w-16 rounded-full" src="../../img/gender_none.png" alt="User Avatar">';
                    }
                    ?>
                </button>

                <div id="dropdownMenu" class="hidden absolute right-0 bg-white border-2 border-green-700 shadow-lg rounded-md w-32 mt-2">
                    <ul class="text-black font-bold">
                        <li>
                            <a href="#" class="block px-4 py-1 hover:bg-green-500">Profile</a>
                        </li>
                        <hr class="border-t-2 border-green-800">
                        <li>
                            <a href="../../_api/_logout.php" class="block px-4 py-1 hover:bg-green-500">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section class="flex flex-col h-screen overflow-hidden mx-auto auto-container">
        <div id="viewPageComponent" class="flex justify-end items-center p-4 bg-white border-b">
            <label for="viewPerPage" class="text-gray-700 font-bold mr-2">View per page:</label>
            <select id="viewPerPage" class="border-2 border-blue-700 rounded p-2 text-gray-700 font-bold">
                <option value="5" class="text-gray-700 font-bold">5</option>
                <option value="10" class="text-gray-700 font-bold" selected>10</option>
                <option value="15" class="text-gray-700 font-bold">15</option>
                <option value="20" class="text-gray-700 font-bold">20</option>
            </select>
        </div>

        <div id="tableComponent" class="flex-grow overflow-auto bg-white rounded-lg border-2 border-grey-300">
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse shadow-md">
                    <thead class="bg-blue-600 text-white sticky top-0 z-10">
                        <tr>
                            <th class="border-2 border-blue-700 px-4 py-2">Column 1</th>
                            <th class="border-2 border-blue-700 px-4 py-2">Column 2</th>
                            <th class="border-2 border-blue-700 px-4 py-2">Column 3</th>
                            <th class="border-2 border-blue-700 px-4 py-2">Column 4</th>
                            <th class="border-2 border-blue-700 px-4 py-2">Column 5</th>
                            <th class="border-2 border-blue-700 px-4 py-2">Column 6</th>
                            <th class="border-2 border-blue-700 px-4 py-2">Column 7</th>
                            <th class="border-2 border-blue-700 px-4 py-2">Column 8</th>
                            <th class="border-2 border-blue-700 px-4 py-2">Column 9</th>
                            <th class="border-2 border-blue-700 px-4 py-2">Column 10</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" class="bg-white">
                        <!-- Rows will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>
        </div>

        <div id="paginationComponent" class="flex justify-between items-center p-4 bg-whiet border-t">
            <button id="prevPage" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800 border-2 border-blue-800 font-bold">Previous</button>
            <div id="pageNumbers" class="flex space-x-2"></div>
            <button id="nextPage" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800 border-2 border-blue-800 font-bold">Next</button>
        </div>
    </section>



    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center text-gray-900 md:mb-0"
                href="https://cse.iitkgp.ac.in/~smisra/swan/index.html" target="_blank">
                <img class="bg-none h-10 w-10" src="../../img/SWAN-logo.png">
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">©
                2024 SWANIMS —
                <a href="https://cse.iitkgp.ac.in/~smisra/swan/index.html"
                    class="font-semibold text-blue-600 ml-1 hover:text-green-900" rel="noopener noreferrer"
                    target="_blank">@swanlab</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                        </path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none"
                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                        </path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </footer>
    <script>
        // JavaScript to toggle dropdown visibility
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', () => {
            if (dropdownMenu.classList.contains('hidden')) {
                dropdownMenu.classList.remove('hidden');
            } else {
                dropdownMenu.classList.add('hidden');
            }
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
    <script>
        // Sample Data
        const tableData = Array.from({
            length: 200
        }, (_, i) => [
            `Row ${i + 1} Col 1`,
            `Row ${i + 1} Col 2`,
            `Row ${i + 1} Col 3`,
            `Row ${i + 1} Col 4`,
            `Row ${i + 1} Col 5`,
            `Row ${i + 1} Col 6`,
            `Row ${i + 1} Col 7`,
            `Row ${i + 1} Col 8`,
            `Row ${i + 1} Col 9`,
            `Row ${i + 1} Col 10`
        ]);

        // DOM Elements
        const tableBody = document.getElementById('tableBody');
        const viewPerPage = document.getElementById('viewPerPage');
        const prevPage = document.getElementById('prevPage');
        const nextPage = document.getElementById('nextPage');
        const pageNumbers = document.getElementById('pageNumbers');

        // Pagination Variables
        let currentPage = 1;
        let rowsPerPage = parseInt(viewPerPage.value);
        const maxVisiblePages = 5; // Maximum number of page buttons to show at once

        // Render Table
        function renderTable(page, rowsPerPage) {
            tableBody.innerHTML = '';
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            const rowsToRender = tableData.slice(start, end);
            rowsToRender.forEach(row => {
                const rowElement = document.createElement('tr');
                row.forEach(cell => {
                    const cellElement = document.createElement('td');
                    cellElement.textContent = cell;
                    cellElement.className = 'border border-gray-300 px-4 py-2 text-center';
                    rowElement.appendChild(cellElement);
                });
                tableBody.appendChild(rowElement);
            });
        }

        // Render Pagination
        function renderPagination() {
            pageNumbers.innerHTML = '';
            const totalPages = Math.ceil(tableData.length / rowsPerPage);

            const startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
            const endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

            if (startPage > 1) {
                const firstPage = createPageButton(1);
                pageNumbers.appendChild(firstPage);
                if (startPage > 2) {
                    const ellipsis = document.createElement('span');
                    ellipsis.textContent = '...';
                    ellipsis.className = 'px-2';
                    pageNumbers.appendChild(ellipsis);
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                const pageButton = createPageButton(i);
                pageNumbers.appendChild(pageButton);
            }

            if (endPage < totalPages) {
                if (endPage < totalPages - 1) {
                    const ellipsis = document.createElement('span');
                    ellipsis.textContent = '...';
                    ellipsis.className = 'px-2';
                    pageNumbers.appendChild(ellipsis);
                }
                const lastPage = createPageButton(totalPages);
                pageNumbers.appendChild(lastPage);
            }

            prevPage.disabled = currentPage === 1;
            nextPage.disabled = currentPage === totalPages;
        }

        // Create a Page Button
        function createPageButton(page) {
            const pageButton = document.createElement('button');
            pageButton.textContent = page;
            pageButton.className =
                'px-4 py-2 border border-gray-300 rounded hover:bg-green-600 hover:text-white border-2 border-green-700 font-bold' +
                (page === currentPage ? ' bg-blue-600 text-white' : '');
            pageButton.addEventListener('click', () => {
                currentPage = page;
                renderTable(currentPage, rowsPerPage);
                renderPagination();
            });
            return pageButton;
        }

        // Event Listeners
        viewPerPage.addEventListener('change', () => {
            rowsPerPage = parseInt(viewPerPage.value);
            currentPage = 1;
            renderTable(currentPage, rowsPerPage);
            renderPagination();
        });

        prevPage.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderTable(currentPage, rowsPerPage);
                renderPagination();
            }
        });

        nextPage.addEventListener('click', () => {
            const totalPages = Math.ceil(tableData.length / rowsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                renderTable(currentPage, rowsPerPage);
                renderPagination();
            }
        });

        // Initial Render
        renderTable(currentPage, rowsPerPage);
        renderPagination();
    </script>
    <script>
        document.body.style.zoom = "95%";
    </script>
</body>

</html>