var aux;
jQuery(document).ready(function() {
    // Standard
    jQuery('.tabs.standard .tab-links-classic a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });

    // Animated Fade
    jQuery('.tabs.animated-fade .tab-links-classic a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();

        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');        

        e.preventDefault();
    });

    // Animated Slide 1
    jQuery('.tabs.animated-slide-1 .tab-links-classic a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).siblings().slideUp(400);
        jQuery('.tabs ' + currentAttrValue).delay(400).slideDown(400);

        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });

    // Animated Slide 2
    jQuery('.tabs.animated-slide-2 .tab-links-classic a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).slideDown(400).siblings().slideUp(400);

        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });
});

/* ========================== LINKS EFFECTS TABS =============================== */

jQuery(document).ready(function() {
    // Standard
    jQuery('.tabs.standard .cl-effect-21 a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

        // Change/remove current tab to active        
        jQuery(this).addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });

    // Animated Fade
    jQuery('.tabs.animated-fade .cl-effect-21 a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();

        // Change/remove current tab to active

        // quitar el subrayado del link activo anterior y dejarselo al nuevo link activo
        aux = $(".cl-effect-21 > li a.active");
        aux[0].className = "";
        jQuery(this).addClass('active');        

        e.preventDefault();
    });

    // Animated Slide 1
    jQuery('.tabs.animated-slide-1 .cl-effect-21 a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).siblings().slideUp(400);
        jQuery('.tabs ' + currentAttrValue).delay(400).slideDown(400);

        // Change/remove current tab to active
        jQuery(this).addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });

    // Animated Slide 2
    jQuery('.tabs.animated-slide-2 .cl-effect-21 a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).slideDown(400).siblings().slideUp(400);

        // Change/remove current tab to active
        jQuery(this).addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });
});