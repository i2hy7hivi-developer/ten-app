
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="address-container">
        <input type="text" name="address" class="address">
    </div>
    <button type="button" onclick="addInputField();">Click me!</button>
</body>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=us"></script>
<script>
    function initializeAutocompleteForInput(input) {
    var autocomplete = new google.maps.places.Autocomplete(input[0], {
        types: ['geocode']
    });
    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        // Optional: use place
    });
}

function initializeAllAutocompletes() {
    $('.address').each(function() {
        // Check to avoid re-initializing
        if (!$(this).data('autocomplete-initialized')) {
            initializeAutocompleteForInput($(this));
            $(this).data('autocomplete-initialized', true);
        }
    });
}

function waitForGoogleMaps() {
    if (typeof google !== 'undefined' && google.maps && google.maps.places) {
        initializeAllAutocompletes();
    } else {
        setTimeout(waitForGoogleMaps, 100);
    }
}
waitForGoogleMaps();

function addInputField() {
    var newInput = $('<input type="text" name="dynamic_input[]" class="address">');
    $('#address-container').append(newInput);
    // Initialize autocomplete for the new input
    if (typeof google !== 'undefined' && google.maps && google.maps.places) {
        initializeAutocompleteForInput(newInput);
        newInput.data('autocomplete-initialized', true);
    }
}
</script>
</html>