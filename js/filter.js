$(document).ready(function () {
    // Initially show all cards
    $('.card').addClass('active');

    // Handle category filter click
    $('.popular ul a').on('click', function (e) {
        e.preventDefault();

        // Remove 'selected' class from all filter links
        $('.popular ul a').removeClass('selected');

        // Add 'selected' class to the clicked filter link
        $(this).addClass('selected');

        // Get the category class to filter
        var categoryClass = $(this).data('filter');

        // Show/hide cards based on the selected category
        if (categoryClass === '*') {
            $('.card').addClass('active');
        } else {
            $('.card').removeClass('active');
            $('.' + categoryClass).addClass('active');
        }
    });
});

