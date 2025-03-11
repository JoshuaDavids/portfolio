function handleAccordionClick() {
   const $layout = $(this).closest('.layout--accordion-media');
 
   const target = $(this).data('bs-target');
   const lastCharacter = target.charAt(target.length - 1);
 
   $layout.find('.layout__media--active').removeClass('layout__media--active');
   $layout.find(`.layout__media--${lastCharacter}`).addClass('layout__media--active');
 }
 
 function initLayouts(layouts) {
   layouts.forEach((layout) => {
     $(layout).find('.accordion-button').on('click', handleAccordionClick);
   });
 }
 
 function init() {
   const layouts = document.querySelectorAll('.layout--accordion-media');
 
   if (layouts.length > 0) {
     initLayouts(layouts);
   }
 }
 
 jQuery(init);
 