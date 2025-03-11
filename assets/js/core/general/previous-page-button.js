function navigateToPreviousPage(e) {
  e.preventDefault();

  const clickedElement = $(this);

  const defaultUrl = clickedElement.attr('href');

  const referrer = document.referrer;

  // Check if the referrer is empty (possible direct access or first page in history)
  if (!referrer || referrer.indexOf(window.location.host) === -1) {
    window.location.href = defaultUrl;
  } else {
    window.history.back();
  }
}

function previousPageButton() {
  $('[data-wsk-toggle="previous-page"]').on('click', navigateToPreviousPage);
}

jQuery(previousPageButton);
