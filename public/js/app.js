document.addEventListener("DOMContentLoaded", () => {
    const isLoggedIn = localStorage.getItem("isLoggedIn");
    console.log("isLoggedIn =", isLoggedIn);
  
    const loginNav = document.getElementById("loginNav");
    const logoutNav = document.getElementById("logoutNav");
  
    if (isLoggedIn === "true") {
      console.log("Showing logout button");
      loginNav.classList.add("d-none");
      logoutNav.classList.remove("d-none");
    } else {
      console.log("Showing login button");
      loginNav.classList.remove("d-none");
      logoutNav.classList.add("d-none");
    }
  });

  function login() {
    localStorage.setItem("isLoggedIn", "true");
    location.reload();
  }
  
  function logout() {
    localStorage.removeItem("isLoggedIn");
    location.reload();
  }

  const eventImageInput = document.getElementById("eventImage");
    const previewImage = document.getElementById("previewImage");
    const imageDropText = document.getElementById("imageDropText");

    eventImageInput.addEventListener("change", function () {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.classList.remove("d-none");
                imageDropText.classList.add("d-none");
            };
            reader.readAsDataURL(file);
        } else {
            previewImage.classList.add("d-none");
            imageDropText.classList.remove("d-none");
        }

        function handleImageUpload(event, input) {
            const file = input.files[0];
            if (!file) return;
        
            const reader = new FileReader();
            reader.onload = function (e) {
              const img = input.nextElementSibling;
              const placeholder = img.nextElementSibling;
              img.src = e.target.result;
              img.classList.remove("d-none");
              placeholder.classList.add("d-none");
            };
            reader.readAsDataURL(file);
          }
    });

    document.getElementById('eventForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = e.target;
        const eventMessage = document.getElementById('eventMessage');
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            eventMessage.className = 'alert alert-danger';
            eventMessage.textContent = 'Please fix the errors in the form.';
            eventMessage.classList.remove('d-none');
            return;
        }
    
        // Normally, you would handle actual submission logic here.
        // Simulating success for now:
        eventMessage.className = 'alert alert-success';
        eventMessage.textContent = 'Event created successfully!';
        eventMessage.classList.remove('d-none');
    
        form.reset();
        form.classList.remove('was-validated');
    });