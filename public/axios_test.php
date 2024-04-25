<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  axios.get('cityata')
    .then(({ data }) => {
      this.cities = data; // Assuming 'this' is contextually correct here; otherwise, use a different way to store data
      console.log('Cities loaded:', this.cities);
    })
    .catch(error => {
      console.error('Error fetching cities:', error);
      // Handle errors, such as showing a message to the user
    });
});
</script>