<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My_Lawyer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="user_profile.css">
</head>
<body>
    <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="https://flowbite.com" class="flex items-center">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                </a>
                <div class="flex items-center lg:order-2">

                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">

                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">our Lawyers</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">profile</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Login</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="container w-8/12" >
        <div class="user-info">
          <h2>User Information</h2>
          <p><strong>First Name:</strong> John</p>
          <p><strong>Last Name:</strong> Doe</p>
          <p><strong>Email:</strong> john.doe@example.com</p>
          <p><strong>Phone:</strong> +123456789</p>
          <button class="btn" id="edit-btn">Edit Info</button>
        </div>
      </div>
      
      <div class="popup" id="popup">
        <div class="popup-content">
          <span class="close" id="close-popup">&times;</span>
          <h3>Edit User Information</h3>
          <form id="edit-form">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" value="John">
      
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" value="Doe">
      
            <label for="email">Email</label>
            <input type="email" id="email" value="john.doe@example.com">
      
            <label for="phone">Phone</label>
            <input type="text" id="phone" value="+123456789">
      
            <button type="button" class="btn" id="save-btn">Save</button>
          </form>
        </div>
      </div>
      


      <section class="consultations-section">
        <h2>Your Consultations</h2>
        <table class="consultations-table">
            <thead>
                <tr>
                    <th>Lawyer's Name</th>
                    <th>Phone</th>
                    <th>Consultation Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="consultations-list">
                <!-- Example Row -->
                <tr>
                    <td>John Doe</td>
                    <td>+123456789</td>
                    <td>2024-12-20</td>
                    <td>Pending</td>
                    <td>
                        <button class="modify-btn green-btn">Modify</button>
                        <button class="cancel-btn red-btn">Cancel</button>
                    </td>
                </tr>
            </tbody>
        </table>
    
        <!-- Modify Consultation Popup -->
        <div id="modify-popup" class="popup hidden">
            <div class="popup-content">
                <span class="close-popup">&times;</span>
                <h3>Modify Consultation</h3>
                <form id="modify-form">
                    <label for="consultation-date">Consultation Date</label>
                    <input type="date" id="consultation-date" name="consultation-date" required />
                    <button type="submit" class="save-btn">Save</button>
                </form>
            </div>
        </div>
    </section>
      
<script src="global.js"></script>
</body>
</html>