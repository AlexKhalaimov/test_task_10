<div class="header-search">
	<form action="<?php echo home_url('/'); ?>" role="search" method="get" class="header-search__form header-search-form col-12">
		<div class="header-search-form__label-wrapper">
			<input type="text" id="header-search-input" name="s" class="header-search-form__input" placeholder="Що ви хочете вивчити?">
			<label for="header-search-input" class="header-search-form__label">
			</label>
		</div>
		<button type="submit" class="header-search-form__submit btn" aria-label="submit search">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
				<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
			</svg>
		</button>
	</form>
</div>