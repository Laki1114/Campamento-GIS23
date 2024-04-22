let currentStep = 1;

  function nextStep() {
    document.getElementById(`step${currentStep}`).classList.remove('active');
    currentStep++;
    document.getElementById(`step${currentStep}`).classList.add('active');
  }

  function submitForm() {
    const name = document.getElementById('nameInput').value;
    const address = document.getElementById('addressInput').value;
    const postalcode = document.getElementById('postalcode').value;
    const city = document.getElementById('city').value;
    const image = document.getElementById('imageInput').files[0]; // Get the uploaded image file
    // Displaying the entered data
    document.getElementById('displayName').textContent = name;
    document.getElementById('displayAddress').textContent = address;
    document.getElementById('displaypostalcode').textContent = postalcode;
    document.getElementById('displaycity').textContent = city;
    // Displaying the uploaded image
    if (image) {
      const uploadedImage = document.getElementById('uploadedImage');
      uploadedImage.style.display = 'block';
      uploadedImage.src = URL.createObjectURL(image);
    }
    // You can handle the image file as needed here (e.g., upload to server)
    alert('Form submitted successfully!');
  }