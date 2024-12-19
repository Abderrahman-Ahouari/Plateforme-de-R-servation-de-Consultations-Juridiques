const editBtn = document.getElementById('edit-btn');
const popup = document.getElementById('popup');
const closePopup = document.getElementById('close-popup');
const saveBtn = document.getElementById('save-btn');

editBtn.addEventListener('click', () => {
  popup.style.display = 'flex';
});

closePopup.addEventListener('click', () => {
  popup.style.display = 'none';
});

saveBtn.addEventListener('click', () => {
  const firstName = document.getElementById('first-name').value;
  const lastName = document.getElementById('last-name').value;
  const email = document.getElementById('email').value;
  const phone = document.getElementById('phone').value;

  document.querySelector('.user-info').innerHTML = `
    <h2>User Information</h2>
    <p><strong>First Name:</strong> ${firstName}</p>
    <p><strong>Last Name:</strong> ${lastName}</p>
    <p><strong>Email:</strong> ${email}</p>
    <p><strong>Phone:</strong> ${phone}</p>
    <button class="btn" id="edit-btn">Edit Info</button>
  `;

  popup.style.display = 'none';
});





// JavaScript Functionality
const consultationsList = document.getElementById('consultations-list');
const modifyPopup = document.getElementById('modify-popup');
const closePopup2 = document.querySelector('.close-popup');
const modifyForm = document.getElementById('modify-form');

// Handle Cancel Button
consultationsList.addEventListener('click', (e) => {
    if (e.target.classList.contains('cancel-btn')) {
        const row = e.target.closest('tr');
        consultationsList.removeChild(row);
    }

    if (e.target.classList.contains('modify-btn')) {
        modifyPopup.classList.remove('hidden');
    }
});

// Close Popup
closePopup2.addEventListener('click', () => {
    modifyPopup.classList.add('hidden');
});

// Save Modify Form
modifyForm.addEventListener('submit', (e) => {
    e.preventDefault();
    modifyPopup.classList.add('hidden');
});