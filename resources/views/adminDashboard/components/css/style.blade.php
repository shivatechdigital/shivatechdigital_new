<!-- Remix Icon -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/remixicon.css') }}">

<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/bootstrap.min.css') }}">

<!-- Apex Chart -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/apexcharts.css') }}">

<!-- Data Table -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/dataTables.min.css') }}">

<!-- Text Editor -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/editor-katex.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/editor.atom-one-dark.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/editor.quill.snow.css') }}">

<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/flatpickr.min.css') }}">

<!-- Calendar -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/full-calendar.css') }}">

<!-- Vector Map -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/jquery-jvectormap-2.0.5.css') }}">

<!-- Popup -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/magnific-popup.css') }}">

<!-- Slick Slider -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/slick.css') }}">

<!-- Prism -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/prism.css') }}">

<!-- File Upload -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/file-upload.css') }}">

<!-- Audio Player -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/lib/audioplayer.css') }}">

<!-- Main Style -->
<link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">

<style>
	/* Global dark mode fix for non-editable fields */
	[data-theme="dark"] .form-control[readonly],
	[data-theme="dark"] .form-control:disabled,
	[data-theme="dark"] .form-select:disabled,
	[data-theme="dark"] textarea:disabled,
	[data-theme="dark"] textarea[readonly],
	[data-theme="dark"] input[readonly],
	[data-theme="dark"] input:disabled,
	[data-theme="dark"] select:disabled {
		background-color: var(--input-bg) !important;
		border-color: var(--input-form-light) !important;
		color: var(--text-primary-light) !important;
		opacity: 1 !important;
		-webkit-text-fill-color: var(--text-primary-light) !important;
	}

	[data-theme="dark"] .form-control[readonly]::placeholder,
	[data-theme="dark"] .form-control:disabled::placeholder,
	[data-theme="dark"] textarea[readonly]::placeholder,
	[data-theme="dark"] textarea:disabled::placeholder,
	[data-theme="dark"] input[readonly]::placeholder,
	[data-theme="dark"] input:disabled::placeholder {
		color: var(--text-secondary-light) !important;
		opacity: 1;
	}

	/* Keep Bootstrap tables and their white utility containers aligned with the dashboard dark theme. */
	[data-theme="dark"] .dashboard-main .table-responsive.bg-white {
		background-color: var(--input-bg) !important;
		border-color: var(--border-color) !important;
	}

	[data-theme="dark"] .dashboard-main .table {
		--bs-table-bg: transparent;
		--bs-table-color: var(--text-primary-light);
		--bs-table-border-color: var(--border-color);
		--bs-table-striped-bg: rgba(255, 255, 255, 0.04);
		--bs-table-hover-bg: rgba(255, 255, 255, 0.07);
		--bs-table-hover-color: var(--text-primary-light);
	}
</style>
