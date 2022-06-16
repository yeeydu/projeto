<div class="container bt-5 pt-5">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<nav class="nav nav-mastfoot justify-content-center">
				<a class="nav-link" target="_blank" href="https://www.facebook.com/diogopintoweddings">
					<i class="fab fa-facebook"></i>
				</a>
				<a class="nav-link" target="_blank" href="https://www.instagram.com/diogopintophoto.video/">
					<i class="fab fa-instagram"></i>
				</a>
				<a class="nav-link" target="_blank" href="https://www.youtube.com/channel/UC-xSYYun9UPBDbMgf9_z_0w">
					<i class="fab fa-youtube"></i>
				</a>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-12 d-flex align-items-center">

		</div>
		<div class="col-lg-4 col-md-12 d-flex align-items-center">
			<p class="mx-auto text-center mb-0">&copy; {{now()->format('Y')}} Design by Cesae Team Y.</p>
		</div>
	</div>
</div>
<!-- Main JS -->
<script src="//localhost:35729/livereload.js"></script>


<script>
	tinymce.init({
		selector: 'textarea',
		hidden_input: false,
		plugins: '  fontselect autolink',
		toolbar: ' undo  redo bold italic underline  h1 h2 h3 align indent bullist numlist fontselect fontsizeselect forecolor backcolor blockquote formatpainter casechange',
		toolbar_mode: 'floating',
		skin: 'bootstrap',
		menubar: true,
		tinycomments_mode: 'embedded',
		tinycomments_author: 'Author name',
	});

	$('input[type="submit"]').click(function(e) {
		//prevent chrome bug
		$("input:hidden").val(null);
	});
</script>