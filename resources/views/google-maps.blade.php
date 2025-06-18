
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <input type="text" name="address">
    <button type="button" onclick="hello();">Click me!</button>
</body>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=us"></script>
<script>
    function initializeAutocomplete() {
        var input = document.querySelector('input[name="address"]');
        if (!input) return;
        var autocomplete = new google.maps.places.Autocomplete(input, {
            types: ['geocode'] // or just [] for all types
        });

        // Optional: Listen for place selection
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            // You can use place here if needed
            // Example: console.log(place.formatted_address);
        });
    }

    // Initialize autocomplete when Google Maps script is loaded
    function gm_authFailure() {
        alert('Google Maps authentication failed. Please check your API key.');
    }

    // Wait for the Google Maps API to load
    function waitForGoogleMaps() {
        if (typeof google !== 'undefined' && google.maps && google.maps.places) {
            initializeAutocomplete();
        } else {
            setTimeout(waitForGoogleMaps, 100);
        }
    }
    waitForGoogleMaps();
</script>
</html>