$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#restaurant-id').on('change', function () {
        var restaurantId = $(this).val();
        if (restaurantId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'restaurant_id=' + restaurantId,
                success: function (types) {
                    $select = $('#type-id');
                    $select.find('option').remove();
                    $.each(types, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#type-id').html('<option value="">Select restaurants first</option>');
        }
    });
});



