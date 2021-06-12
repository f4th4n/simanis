<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?= config('Simanis')->app_name ?></title>

    <!-- Bootstrap -->
    <link href="/lib/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/lib/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/lib/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/lib/vendors/animate.css/animate.min.css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom Theme Style -->
    <link href="/lib/build/css/custom.min.css" rel="stylesheet">

    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="/lib/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/lib/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/lib/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/lib/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/lib/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
   	<?= $this->renderSection('css') ?>
  </head>

  <body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<?= $this->include('menus') ?>
				<?= $this->renderSection('content') ?>
			</div>
		</div>

    <script src="/lib/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/lib/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/lib/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/lib/vendors/nprogress/nprogress.js"></script>
    <script src="/lib/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/lib/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/lib/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/lib/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/lib/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/lib/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/lib/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/lib/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/lib/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/lib/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/lib/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/lib/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/lib/build/js/custom.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js" integrity="sha512-zHDWtKP91CHnvBDpPpfLo9UsuMa02/WgXDYcnFp5DFs8lQvhCe2tx56h2l7SqKs/+yQCx4W++hZ/ABg8t3KH/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="/lib2/html5-qrcode.min.js"></script>

    	<?= $this->renderSection('js') ?>

		<script>
			$('.form-date').datepicker({
				format: "dd-mm-yyyy",
				language: "id"
			});

            const formatRupiah = function() {
                const val = $(this).val();
                const rp = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(val).replace(/\D00(?=\D*$)/, '');
                $('.helper-rupiah', $(this).parent()).text(rp)
            }

            $('.wrapper-rupiah input').each(function() {
                formatRupiah.bind(this).apply()
            })

            $(document).on("keyup", ".wrapper-rupiah input", formatRupiah)
		</script>
	</body>
</html>
