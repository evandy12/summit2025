<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Function to replace quotes and apostrophes
    function replaceQuotesAndApostrophes() {
      let bodyText = document.body.innerHTML;

      // Replace straight quotes and apostrophes with curly quotes
      bodyText = bodyText.replace(/(["'])/g, function(match) {
        if (match === '"') {
          return '“'; // Start double quote
        } else if (match === "'") {
          return '‘'; // Start single quote (apostrophe)
        }
      });
      
      bodyText = bodyText.replace(/“([^”]*)”/g, '“$1”'); // Handle closing double quotes
      bodyText = bodyText.replace(/‘([^’]*)’/g, '‘$1’'); // Handle closing single quotes

      // Update the body content
      document.body.innerHTML = bodyText;
    }

    replaceQuotesAndApostrophes();
  });
</script>
