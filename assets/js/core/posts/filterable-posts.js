function updateContent(html) {
  const updatedBody = $(html).find('.layout__body');
  if (updatedBody !== '') {
    $('.layout--filterable-posts .layout__body').replaceWith(updatedBody);
  }

  const updatedResultsTitle = $(html).find('.posts-results-title');
  if (updatedResultsTitle !== '') {
    $('.layout--filterable-posts .posts-results-title').replaceWith(updatedResultsTitle);
  }
}

function scrollToLayoutTop() {
  const layoutTop = $('.layout--filterable-posts').offset().top;

  window.scrollTo(0, layoutTop);
}

function postsListing() {
  function getRequestData() {
    const nonce = $('#filter-posts-security').val();

    const postType = $('.layout--filterable-posts').data('post-type');

    const order = $('.posts-sorting__input').val();
    const searchTerm = $('.search-filter__input').val();
    const selectedTerms = $('.terms-filter__input').val();

    const postsTemplate = $('.layout--filterable-posts').data('posts-template');

    return {
      action: 'wskt_ajax_filter_posts',
      security: nonce,
      post_type: postType,

      ...(order && { order }),

      ...(searchTerm && { search_term: searchTerm }),

      ...(selectedTerms && { terms: selectedTerms }),

      posts_template: postsTemplate,
    };
  }

  function handleFilters(e) {
    e.preventDefault();

    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: wskt.ajaxURL,
      data: getRequestData(),
      success(response) {
        if (response.success) {
          updateContent(response.data.html);
        }
      },
    });

    return false;
  }

  function handlePagination(e) {
    e.preventDefault();

    const data = {
      ...getRequestData(),
      page: $(this).data('page'),
    };

    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: wskt.ajaxURL,
      data,
      success(response) {
        if (response.success) {
          scrollToLayoutTop();
          updateContent(response.data.html);
        }
      },
    });

    return false;
  }

  function init() {
    if ($('.layout--filterable-posts').length === 0) {
      return;
    }

    $(document).on('click', '[data-wsk-toggle="apply-filters"]', handleFilters);

    $(document).on('change', '.posts-sorting__input', handleFilters);

    $(document).on('click', '.posts-pagination .btn', handlePagination);
  }

  init();
}

jQuery(postsListing);
