<?php
/**
 * Template Name: UI Kit
 *
 * @package WSK_Theme
 */

$accordion_items = array(
	array(
		'id'      => 'collapseOne',
		'title'   => 'Accordion Item #1',
		'content' => "<strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.",
	),
	array(
		'id'      => 'collapseTwo',
		'title'   => 'Accordion Item #1',
		'content' => "<strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.",
	),
);

$metrics = array(
	array(
		'value'       => '200',
		'description' => 'Hours saved',
	),
	array(
		'value'       => '40%',
		'description' => 'More efficient',
	),
	array(
		'value'       => '2MWH',
		'description' => 'Per second',
	),
	array(
		'value'       => '20 hours',
		'description' => 'Battery life',
	),
);

$tabs = array(
	array(
		'id'      => 'home-tab',
		'title'   => 'Home',
		'content' => "<strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.",
	),
	array(
		'id'      => 'profile-tab',
		'title'   => 'Profile',
		'content' => "<strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.",
	),
	array(
		'id'      => 'contact-tab',
		'title'   => 'Contact',
		'content' => "<strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.",
	),
);

function wskt_demo_form() {
	?>
	<form class="row g-3 mb-8">
		<div class="col-md-6">
			<label for="inputEmail4" class="form-label">Email</label>
			<input type="email" class="form-control" id="inputEmail4">
		</div>
		<div class="col-md-6">
			<label for="inputPassword4" class="form-label">Password</label>
			<input type="password" class="form-control" id="inputPassword4">
		</div>
		<div class="col-12">
			<label for="inputAddress" class="form-label">Address</label>
			<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
		</div>
		<div class="col-12">
			<label for="inputAddress2" class="form-label">Address 2</label>
			<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
		</div>
		<div class="col-md-6">
			<label for="inputCity" class="form-label">City</label>
			<input type="text" class="form-control" id="inputCity">
		</div>
		<div class="col-md-4">
			<label for="inputState" class="form-label">State</label>
			<select id="inputState" class="form-select">
				<option selected>Choose...</option>
				<option>...</option>
			</select>
		</div>
		<div class="col-md-2">
			<label for="inputZip" class="form-label">Zip</label>
			<input type="text" class="form-control" id="inputZip">
		</div>
		<div class="col-12">
			<label for="inputRange" class="form-label">How many months?</label>
			<input type="range" class="form-range" min="0" max="5" step="0.5" id="inputRange">
		</div>
		<div class="col-12">
			<div class="mb-3">
				<label class="form-check-label">Contact Preference:</label>
			</div>
			<div class="mb-3 form-check">
				<input type="radio" class="form-check-input" id="contactEmail" name="contactPreference" value="email">
				<label class="form-check-label" for="contactEmail">Email</label>
			</div>
			<div class="form-check">
				<input type="radio" class="form-check-input" id="contactPhone" name="contactPreference" value="phone">
				<label class="form-check-label" for="contactPhone">Phone</label>
			</div>
		</div>
		<div class="col-12">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="gridCheck">
				<label class="form-check-label" for="gridCheck">
				I agree to the terms and conditions
				</label>
			</div>
		</div>
		<div class="col-12">
			<button type="submit" class="btn btn-primary">Sign in</button>
		</div>
	</form>
	<?php
}

function wskt_demo_content( $metrics, $accordion_items, $tabs ) {
	?>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Proin libero nunc consequat interdum varius sit amet. Etiam sit amet nisl purus in mollis nunc. Odio euismod lacinia at quis risus sed vulputate. At varius vel pharetra vel. Ligula ullamcorper malesuada proin libero. Risus feugiat in ante metus dictum at tempor. Pretium aenean pharetra magna ac placerat vestibulum lectus. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie. Ante in nibh mauris cursus mattis molestie a. Blandit volutpat maecenas volutpat blandit aliquam etiam erat. Arcu risus quis varius quam. Vivamus at augue eget arcu dictum varius duis. Eu lobortis elementum nibh tellus molestie nunc. Cras adipiscing enim eu turpis egestas pretium aenean. Cursus sit amet dictum sit amet.</p>

	<hr />

	<?php wskt_demo_form(); ?>

	<hr />

	<?php wskt_metrics( $metrics ); ?>

	<hr />

	<button type="button" class="btn btn-outline-primary">Outline Primary</button>

	<button type="button" class="btn btn-primary">Primary</button>

	<button type="button" class="btn btn-outline-secondary">Outline Secondary</button>

	<button type="button" class="btn btn-secondary">Secondary</button>

	<hr />

	<?php wskt_accordion( $accordion_items ); ?>

	<hr />

	<?php wskt_tabs( $tabs ); ?>

	<?php
}

get_header();
?>

	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : ?>

			<?php the_post(); ?>

			<section class="layout colour-scheme colour-scheme--default layout--padding-y">
				<div class="container-fluid">

					<h6 class="mb-0">Content</h6>
					<h1 class="display-1">Headings</h1>

					<h1>Heading - 1</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Proin libero nunc consequat interdum varius sit amet. Etiam sit amet nisl purus in mollis nunc. Odio euismod lacinia at quis risus sed vulputate. At varius vel pharetra vel. Ligula ullamcorper malesuada proin libero. Risus feugiat in ante metus dictum at tempor. Pretium aenean pharetra magna ac placerat vestibulum lectus. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie. Ante in nibh mauris cursus mattis molestie a. Blandit volutpat maecenas volutpat blandit aliquam etiam erat. Arcu risus quis varius quam. Vivamus at augue eget arcu dictum varius duis. Eu lobortis elementum nibh tellus molestie nunc. Cras adipiscing enim eu turpis egestas pretium aenean. Cursus sit amet dictum sit amet.</p>

					<h2>Heading - 2</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Proin libero nunc consequat interdum varius sit amet. Etiam sit amet nisl purus in mollis nunc. Odio euismod lacinia at quis risus sed vulputate. At varius vel pharetra vel. Ligula ullamcorper malesuada proin libero. Risus feugiat in ante metus dictum at tempor. Pretium aenean pharetra magna ac placerat vestibulum lectus. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie. Ante in nibh mauris cursus mattis molestie a. Blandit volutpat maecenas volutpat blandit aliquam etiam erat. Arcu risus quis varius quam. Vivamus at augue eget arcu dictum varius duis. Eu lobortis elementum nibh tellus molestie nunc. Cras adipiscing enim eu turpis egestas pretium aenean. Cursus sit amet dictum sit amet.</p>

					<h3>Heading - 3</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Proin libero nunc consequat interdum varius sit amet. Etiam sit amet nisl purus in mollis nunc. Odio euismod lacinia at quis risus sed vulputate. At varius vel pharetra vel. Ligula ullamcorper malesuada proin libero. Risus feugiat in ante metus dictum at tempor. Pretium aenean pharetra magna ac placerat vestibulum lectus. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie. Ante in nibh mauris cursus mattis molestie a. Blandit volutpat maecenas volutpat blandit aliquam etiam erat. Arcu risus quis varius quam. Vivamus at augue eget arcu dictum varius duis. Eu lobortis elementum nibh tellus molestie nunc. Cras adipiscing enim eu turpis egestas pretium aenean. Cursus sit amet dictum sit amet.</p>

					<h4>Heading - 4</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Proin libero nunc consequat interdum varius sit amet. Etiam sit amet nisl purus in mollis nunc. Odio euismod lacinia at quis risus sed vulputate. At varius vel pharetra vel. Ligula ullamcorper malesuada proin libero. Risus feugiat in ante metus dictum at tempor. Pretium aenean pharetra magna ac placerat vestibulum lectus. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie. Ante in nibh mauris cursus mattis molestie a. Blandit volutpat maecenas volutpat blandit aliquam etiam erat. Arcu risus quis varius quam. Vivamus at augue eget arcu dictum varius duis. Eu lobortis elementum nibh tellus molestie nunc. Cras adipiscing enim eu turpis egestas pretium aenean. Cursus sit amet dictum sit amet.</p>

					<h5>Heading - 5</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Proin libero nunc consequat interdum varius sit amet. Etiam sit amet nisl purus in mollis nunc. Odio euismod lacinia at quis risus sed vulputate. At varius vel pharetra vel. Ligula ullamcorper malesuada proin libero. Risus feugiat in ante metus dictum at tempor. Pretium aenean pharetra magna ac placerat vestibulum lectus. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie. Ante in nibh mauris cursus mattis molestie a. Blandit volutpat maecenas volutpat blandit aliquam etiam erat. Arcu risus quis varius quam. Vivamus at augue eget arcu dictum varius duis. Eu lobortis elementum nibh tellus molestie nunc. Cras adipiscing enim eu turpis egestas pretium aenean. Cursus sit amet dictum sit amet.</p>

					<h6>Heading - 6</h6>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Proin libero nunc consequat interdum varius sit amet. Etiam sit amet nisl purus in mollis nunc. Odio euismod lacinia at quis risus sed vulputate. At varius vel pharetra vel. Ligula ullamcorper malesuada proin libero. Risus feugiat in ante metus dictum at tempor. Pretium aenean pharetra magna ac placerat vestibulum lectus. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie. Ante in nibh mauris cursus mattis molestie a. Blandit volutpat maecenas volutpat blandit aliquam etiam erat. Arcu risus quis varius quam. Vivamus at augue eget arcu dictum varius duis. Eu lobortis elementum nibh tellus molestie nunc. Cras adipiscing enim eu turpis egestas pretium aenean. Cursus sit amet dictum sit amet.</p>
					
					<hr />

					<h6 class="mb-0">Content</h6>
					<h1 class="display-1">Lead</h1>

					<p class="lead">This is a lead paragraph. It stands out from regular paragraphs. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Proin libero nunc consequat interdum varius sit amet. Etiam sit amet nisl purus in mollis nunc.</p>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Proin libero nunc consequat interdum varius sit amet. Etiam sit amet nisl purus in mollis nunc. Odio euismod lacinia at quis risus sed vulputate. At varius vel pharetra vel. Ligula ullamcorper malesuada proin libero. Risus feugiat in ante metus dictum at tempor. Pretium aenean pharetra magna ac placerat vestibulum lectus. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie. Ante in nibh mauris cursus mattis molestie a. Blandit volutpat maecenas volutpat blandit aliquam etiam erat. Arcu risus quis varius quam. Vivamus at augue eget arcu dictum varius duis. Eu lobortis elementum nibh tellus molestie nunc. Cras adipiscing enim eu turpis egestas pretium aenean. Cursus sit amet dictum sit amet.</p>

					<hr />

					<h6 class="mb-0">Content</h6>
					<h1 class="display-1">Inline text elements</h1>

					<p>You can use the mark tag to <mark>highlight</mark> text.</p>
					<p><del>This line of text is meant to be treated as deleted text.</del></p>
					<p><s>This line of text is meant to be treated as no longer accurate.</s></p>
					<p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
					<p><u>This line of text will render as underlined.</u></p>
					<p><small>This line of text is meant to be treated as fine print.</small></p>
					<p><strong>This line rendered as bold text.</strong></p>
					<p><em>This line rendered as italicized text.</em></p>

					<hr />

					<h6 class="mb-0">Content</h6>
					<h1 class="display-1">Tables</h1>

					<h5>Default</h5>

					<table class="table mb-8">
						<thead>
							<tr>
							<th scope="col">#</th>
							<th scope="col">First</th>
							<th scope="col">Last</th>
							<th scope="col">Handle</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<th scope="row">1</th>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
							</tr>
							<tr>
							<th scope="row">2</th>
							<td>Jacob</td>
							<td>Thornton</td>
							<td>@fat</td>
							</tr>
							<tr>
							<th scope="row">3</th>
							<td colspan="2">Larry the Bird</td>
							<td>@twitter</td>
							</tr>
						</tbody>
					</table>

					<h5>Striped</h5>

					<table class="table table-striped">
						<thead>
							<tr>
							<th scope="col">#</th>
							<th scope="col">First</th>
							<th scope="col">Last</th>
							<th scope="col">Handle</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<th scope="row">1</th>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
							</tr>
							<tr>
							<th scope="row">2</th>
							<td>Jacob</td>
							<td>Thornton</td>
							<td>@fat</td>
							</tr>
							<tr>
							<th scope="row">3</th>
							<td colspan="2">Larry the Bird</td>
							<td>@twitter</td>
							</tr>
						</tbody>
					</table>

					<hr />

					<h6 class="mb-0">Forms</h6>
					<h1 class="display-1">Inputs</h1>

					<h5>Text Input</h5>
					<div class="mb-8">
						<label for="inputName" class="form-label">Your Name</label>
						<input type="text" class="form-control" id="inputName" placeholder="Enter your name">
					</div>

					<h5>Select Input</h5>
					<div class="mb-8">
						<label for="selectDepartment" class="form-label">Department</label>
						<select class="form-select" id="selectDepartment">
						<option value="sales">Sales</option>
						<option value="support">Support</option>
						<option value="billing">Billing</option>
						</select>
					</div>

					<h5>Textarea Input</h5>
					<div class="mb-8">
						<label for="inputMessage" class="form-label">Message</label>
						<textarea class="form-control" id="inputMessage" rows="4" placeholder="Enter your message"></textarea>
					</div>

					<h5>Checkboxes</h5>
					<div class="mb-8 form-check">
						<input type="checkbox" class="form-check-input" id="subscribeToNewsletter">
						<label class="form-check-label" for="subscribeToNewsletter">Subscribe to Newsletter</label>
					</div>

					<h5>Radios</h5>
					<div class="mb-3">
						<label class="form-check-label">Contact Preference:</label>
					</div>
					<div class="mb-3 form-check">
						<input type="radio" class="form-check-input" id="contactEmail" name="contactPreference" value="email">
						<label class="form-check-label" for="contactEmail">Email</label>
					</div>
					<div class="mb-8 form-check">
						<input type="radio" class="form-check-input" id="contactPhone" name="contactPreference" value="phone">
						<label class="form-check-label" for="contactPhone">Phone</label>
					</div>

					<h5>Range</h5>
					<div class="mb-8">
						<label for="customRange" class="form-label">Example range</label>
						<input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange">
					</div>

					<h5>Form Text Below Inputs</h5>
					<div class="mb-8">
						<label for="inputEmail" class="form-label">Email Address</label>
						<input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter your email">
						<div id="emailHelp" class="form-text">We'll keep your email confidential.</div>
					</div>

					<hr />

					<h6 class="mb-0">Forms</h6>
					<h1 class="display-1">Input Groups</h1>

					<div class="input-group mb-5">
						<span class="input-group-text" id="basic-addon1">@</span>
						<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-5">
						<input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
						<span class="input-group-text" id="basic-addon2">@example.com</span>
					</div>

					<div class="mb-5">
						<label for="basic-url" class="form-label">Your vanity URL</label>
						<div class="input-group">
						<span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
						</div>
						<div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
					</div>

					<div class="input-group mb-5">
						<span class="input-group-text">$</span>
						<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
						<span class="input-group-text">.00</span>
					</div>

					<div class="input-group">
						<input type="text" class="form-control" placeholder="Username" aria-label="Username">
						<span class="input-group-text">@</span>
						<input type="text" class="form-control" placeholder="Server" aria-label="Server">
					</div>

					<hr />

					<h6 class="mb-0">Forms</h6>
					<h1 class="display-1">Layout</h1>

					<h5>Form grid</h5>

					<?php wskt_demo_form(); ?>

					<h5>Inline Form</h5>

					<form class="row row-cols-lg-auto g-3 align-items-center mb-8">
						<div class="col-12">
							<label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
							<div class="input-group">
								<div class="input-group-text">@</div>
								<input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
							</div>
						</div>

						<div class="col-12">
							<label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
							<select class="form-select" id="inlineFormSelectPref">
								<option selected>Choose...</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
						</div>

						<div class="col-12">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="inlineFormCheck">
								<label class="form-check-label" for="inlineFormCheck">
								Remember me
								</label>
							</div>
						</div>

						<div class="col-12">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>

					<hr />

					<h6 class="mb-0">Components</h6>
					<h1 class="display-1">Buttons</h1>

					<h5>Button Variants</h5>

					<div class="mb-3">
						<button type="button" class="btn btn-primary">Primary</button>
						<button type="button" class="btn btn-secondary">Secondary</button>
						<button type="button" class="btn btn-link">Link</button>
					</div>

					<div class="mb-8">
						<button type="button" class="btn btn-outline-primary">Outline Primary</button>
						<button type="button" class="btn btn-outline-secondary">Outline Secondary</button>
					</div>

					<h5>Button Sizes</h5>

					<div class="mb-3">
						<button type="button" class="btn btn-primary btn-lg">Large Button</button>
						<button type="button" class="btn btn-secondary btn-lg">Large Button</button>
					</div>

					<div class="mb-3">
						<button type="button" class="btn btn-primary">Default Button</button>
						<button type="button" class="btn btn-secondary">Default Button</button>
					</div>
						
					<div class="mb-8">
						<button type="button" class="btn btn-primary btn-sm">Small Button</button>
						<button type="button" class="btn btn-secondary btn-sm">Small Button</button>
					</div>

					<hr />

					<h6 class="mb-0">Components</h6>
					<h1 class="display-1">Accordion</h1>

					<?php wskt_accordion( $accordion_items ); ?>

					<hr />

					<h6 class="mb-0">Components</h6>
					<h1 class="display-1">Metrics</h1>
				
					<?php wskt_metrics( $metrics ); ?>

					<hr />

					<h6 class="mb-0">Components</h6>
					<h1 class="display-1">Breadcrumbs</h1>

					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active" aria-current="page">Home</li>
						</ol>
					</nav>

					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Library</li>
						</ol>
					</nav>

					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item"><a href="#">Library</a></li>
							<li class="breadcrumb-item active" aria-current="page">Data</li>
						</ol>
					</nav>

					<hr />

					<h6 class="mb-0">Components</h6>
					<h1 class="display-1">Tabs</h1>

					<?php wskt_tabs( $tabs ); ?>

					<hr />

					<h6 class="mb-0">Components</h6>
					<h1 class="display-1">Tooltip</h1>

					<?php
					wskt_icon_button(
						array(
							'icon'       => wskt_get_icon(
								'question-line',
								'remix/system',
								array(
									'height' => 48,
									'width'  => 48,
								)
							),
							'attributes' => array(
								'data-popover-content' => '#demo-popover-content',
								'data-bs-placement'    => 'top',
								'data-bs-toggle'       => 'popover',
								'data-bs-html'         => 'true',
							),
						)
					);
					?>

					<div id="demo-popover-content" class="hide">
						<strong>Have a question?</strong>
						<br/>
						<small>Get in touch to discuss more</small>
					</div>
					
				</div>
			</section>

			<section class="layout colour-scheme colour-scheme--primary layout--padding-y">
				<div class="container-fluid">

					<div class="row">
						<div class="col-lg-8">
							<h2>Primary Colour Scheme</h2>

							<?php wskt_demo_content( $metrics, $accordion_items, $tabs ); ?>
						</div>
					</div>

				</div>
			</section>

			<section class="layout colour-scheme colour-scheme--secondary layout--padding-y">
				<div class="container-fluid">

					<div class="row">
						<div class="col-lg-8">
							<h2>Secondary Colour Scheme</h2>

							<?php wskt_demo_content( $metrics, $accordion_items, $tabs ); ?>
						</div>
					</div>

				</div>
			</section>

			<section class="layout colour-scheme colour-scheme--dark layout--padding-y">
				<div class="container-fluid">

					<div class="row">
						<div class="col-lg-8">
							<h2>Dark Colour Scheme</h2>

							<?php wskt_demo_content( $metrics, $accordion_items, $tabs ); ?>
						</div>
					</div>

				</div>
			</section>

			<section class="layout colour-scheme colour-scheme--default layout--padding-y">
				<div class="container-fluid">

					<div class="row">
						<div class="col-lg-8">
							<h2>Default Colour Scheme</h2>

							<?php wskt_demo_content( $metrics, $accordion_items, $tabs ); ?>
						</div>
					</div>

				</div>
			</section>

			<?php
			wskt_layout_nothing_found(
				array(
					'title'   => esc_attr__( '404', 'wsk-theme' ),
					'content' => esc_attr__( 'Sorry, we couldn\'t find that page.', 'wsk-theme' ),
					'button'  => array(
						'type' => 'primary',
						'text' => esc_attr__( 'Return home', 'wsk-theme' ),
						'url'  => get_site_url(),
					),
				)
			);
			?>

		<?php endwhile; ?>

	</main>

<?php
get_footer();
