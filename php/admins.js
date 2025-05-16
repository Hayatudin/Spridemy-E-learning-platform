
const feedback = document.getElementById('feedback');
const userDashboard = document.getElementById('userDashboard');
const courseManagement = document.getElementById('courseManagement');
const userLink = document.getElementById('userLink');
const feedbackLink = document.getElementById('feedbackLink');
const courseLink = document.getElementById('courseLink');

userLink.addEventListener('click', () => {
    feedback.classList.add('hidden');
    courseManagement.classList.add('hidden');
    userDashboard.classList.remove('hidden');
});

feedbackLink.addEventListener('click', () => {
    userDashboard.classList.add('hidden');
    courseManagement.classList.add('hidden');
    feedback.classList.remove('hidden');
});

courseLink.addEventListener('click', () => {
    userDashboard.classList.add('hidden');
    feedback.classList.add('hidden');
    courseManagement.classList.remove('hidden');
});

