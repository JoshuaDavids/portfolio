import Popover from 'bootstrap/js/dist/popover';

function init() {
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');

  const popoverList = [...popoverTriggerList].map((popoverTriggerEl) => {
    return new Popover(popoverTriggerEl, {
      container: 'body',
      html: true,
      sanitize: false,
      content: function () {
        const contentElementSelector = popoverTriggerEl.getAttribute('data-popover-content');
        const contentElement = document.querySelector(contentElementSelector);
        if (contentElement) {
          const clone = contentElement.cloneNode(true);
          clone.classList.remove('hide');
          return clone.outerHTML;
        }
        return '';
      },
    });
  });

  // To prevent the default action on clicking popover triggers:
  popoverTriggerList.forEach((el) => {
    el.addEventListener('click', (e) => {
      e.preventDefault();
    });
  });
}

document.addEventListener('DOMContentLoaded', init);
