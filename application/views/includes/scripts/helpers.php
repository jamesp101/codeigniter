<script>
// Reusable form validation function
function validateInput(selector, rule, errorMsg) {
    var inputVal = $(selector).val().trim();
    var isValid = true;

    // Define common rules for validation
    var rules = {
        required: function(value) {
            return value !== '';
        },
        regex: function(value, regex) {
            return regex.test(value);
        },
        minLength: function(value, length) {
            return value.length >= length;
        },
        maxLength: function(value, length) {
            return value.length <= length;
        }
    };

    // Clear any previous error message
    $(selector + '_error').html('');

    // Apply validation based on the rule passed
    if (rule.required && !rules.required(inputVal)) {
        isValid = false;
        $(selector + '_error').html('<div class="alert alert-danger">' + errorMsg.required + '</div>');
    }

    if (rule.regex && !rules.regex(inputVal, rule.regex)) {
        isValid = false;
        $(selector + '_error').html('<div class="alert alert-danger">' + errorMsg.regex + '</div>');
    }

    if (rule.minLength && !rules.minLength(inputVal, rule.minLength)) {
        isValid = false;
        $(selector + '_error').html('<div class="alert alert-danger">' + errorMsg.minLength + '</div>');
    }

    if (rule.maxLength && !rules.maxLength(inputVal, rule.maxLength)) {
        isValid = false;
        $(selector + '_error').html('<div class="alert alert-danger">' + errorMsg.maxLength + '</div>');
    }

    return isValid;
}

</script>