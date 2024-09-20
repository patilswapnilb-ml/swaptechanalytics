(function() {
    emailjs.init("Zv4fJwlClaTVrkUVi");
  })();
  
  document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();
    document.querySelector('.loading').style.display = 'block';
    document.querySelector('.error-message').style.display = 'none';
    document.querySelector('.sent-message').style.display = 'none';
  
    const formData = {
      name: document.getElementById('name-field').value,
      email: document.getElementById('email-field').value,
      subject: document.getElementById('subject-field').value,
      message: document.getElementById('message-field').value
    };
  
    emailjs.send("service_rjtfe41", "template_qezlynd", formData)
      .then(function(response) {
        document.querySelector('.loading').style.display = 'none';
        document.querySelector('.sent-message').style.display = 'block';
      }, function(error) {
        document.querySelector('.loading').style.display = 'none';
        document.querySelector('.error-message').innerHTML = 'Failed to send message. Please try again later.';
        document.querySelector('.error-message').style.display = 'block';
      });
  });
  