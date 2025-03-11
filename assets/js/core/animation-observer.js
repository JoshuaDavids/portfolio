const selectors = ['.animation'];

const elements = document.querySelectorAll(`${selectors.join(', ')}`);

const observer = new IntersectionObserver((entries) => {
  for (const entry of entries) {
    if (entry.intersectionRatio > 0) {
      entry.target.classList.add('animate');
    }
  }
});

function startObserver() {
  for (const element of elements) {
    observer.observe(element);
  }
}

function init() {
  startObserver();
}

jQuery(init);
