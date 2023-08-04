
jQuery('.category_caption').on('click', function() {
    jQuery('.category_caption').removeClass('category_caption--open');
    jQuery('.category_content').removeClass('category_content--open');

    jQuery(this).addClass('category_caption--open');
    jQuery('.category_content[name='+jQuery(this).attr('name')).addClass('category_content--open');
});