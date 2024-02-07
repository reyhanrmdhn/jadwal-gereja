$(document).ready(function () {
	var pathArray = window.location.pathname.split("/");
	var base_url = window.location.protocol + "//" + window.location.host + "/";
	var lastPathArray = pathArray[pathArray.length - 1];

	$(".multipleSelect").select2();
	$(".select2bs").select2();
	// initialize colorpicker
	$(".colorPicker").colorpicker();

	tinymce.init({
		selector: ".description",
		image_dimensions: false,
		force_br_newlines: false,
		force_p_newlines: false,
		forced_root_block: "",
		relative_urls: false,
		image_class_list: [
			{
				title: "Responsive",
				value: "img-responsive",
			},
		],
		plugins: [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
			"table contextmenu directionality emoticons paste textcolor responsivefilemanager code",
		],
		toolbar1:
			"undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
		toolbar2:
			"| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
		image_advtab: true,

		external_filemanager_path:
			base_url + "assets/admin/assets/vendors/custom/filemanager/",
		filemanager_title: "Responsive Filemanager",
		filemanager_access_key: "AcC3s5KeyUpl0ad1254281783Abd1ra",
		external_plugins: {
			filemanager: "plugins/responsivefilemanager/plugin.min.js",
		},
	});

	$(".iframe-btn").fancybox({
		width: 900,
		height: 600,
		type: "iframe",
		autoScale: false,
	});

	$(".iframe-btn").on("focus", function () {
		var filename = [];
		for (let i = 0; i < 16; i++) {
			if (i == 0) {
				i = "";
			}
			filename[i] = $("#imageinput" + i).val();
			$("#imageBanner" + i).attr("src", filename[i]);
		}
		console.log(filename);
	});

	$(".hourpicker").timepicker({
		minuteStep: 10,
		showMeridian: false,
		defaultTime: "00",
	});

	$(".year").datepicker({
		format: "yyyy",
		viewMode: "years",
		minViewMode: "years",
		autoclose: true,
	});

	$("#table_sortable").dataTable({
		order: [],
		columnDefs: [
			{
				targets: "no-sort",
				orderable: false,
			},
		],
		lengthMenu: [[-1], ["All"]],
		language: {
			paginate: {
				next: '<i class="la la-angle-right">',
				previous: '<i class="la la-angle-left">',
			},
		},
		scrollX: true,
	});

	$(".datatable").dataTable({
		order: [],
		columnDefs: [
			{
				targets: "no-sort",
				orderable: false,
			},
		],
		lengthMenu: [[-1], ["All"]],
		language: {
			paginate: {
				next: '<i class="la la-angle-right">',
				previous: '<i class="la la-angle-left">',
			},
		},
		scrollX: true,
	});


	for (let i = 0; i < 16; i++) {
		$('#table-'+i).DataTable({
			"initComplete": function(settings, json) {
			  $('.no-sort').each(function() {
				var columnIdx = $(this).index();
				$(this).on('click', function() {
				  $('#table-'+i).DataTable().order([columnIdx, 'asc']).draw();
				});
			  });
			},
			lengthMenu: [
				[-1],
				["All"],
			],
			language: {
				paginate: {
					next: '<i class="la la-angle-right">',
					previous: '<i class="la la-angle-left">',
				},
			},
		});

		$("#table_sortable_"+i).dataTable({
			order: [],
			columnDefs: [
				{
					targets: "no-sort",
					orderable: false,
				},
			],
			lengthMenu: [[-1], ["All"]],
			language: {
				paginate: {
					next: '<i class="la la-angle-right">',
					previous: '<i class="la la-angle-left">',
				},
			},
			scrollX: true,
		});
	}


	$("#select-all").click(function (event) {
		if (this.checked) {
			// Iterate each checkbox
			$(":checkbox").each(function () {
				this.checked = true;
			});
		} else {
			$(":checkbox").each(function () {
				this.checked = false;
			});
		}
	});

	$(".sortable").sortable({
		axis: "y",
		stop: function (event, ui) {
			var result = $(this).sortable("toArray");
			var table_name = pathArray[2];
			$("#hasil").text(result);
			$.ajax({
				url: base_url + "admin-page/sort-" + table_name,
				type: "post",
				data: {
					sortOrder: result,
				},
				success: function (str) {
					$("#hasil2").text(str);
					$(".sortable").sortable("refresh");
				},
			})
				.done(function () {
					console.log("success");
					$(".sortable").sortable("refresh");
				})
				.fail(function (xhr, status, error) {
					console.log(xhr);
				});
			$(".sortable").sortable("refresh");
		},
	});

	$(".sortable_gallery").sortable({
		axis: "y",
		stop: function (event, ui) {
			var result = $(this).sortable("toArray");
			var table_name = pathArray[2];
			var id = lastPathArray;
			$("#hasil").text(result);
			$.ajax({
				url: base_url + "admin-page/sort-" + table_name + "/" + id,
				type: "post",
				data: {
					sortOrder: result,
				},
				success: function (str) {
					$("#hasil2").text(str);
					$(".sortable_gallery").sortable("refresh");
				},
			})
				.done(function () {
					console.log("success");
					$(".sortable_gallery").sortable("refresh");
				})
				.fail(function (xhr, status, error) {
					console.log(xhr);
				});
			$(".sortable_gallery").sortable("refresh");
		},
	});

	$("#del_all").on("click", function (e) {
		console.log('ada');
		e.preventDefault();
		var checkValues = [];
		var table_name = pathArray[2];
		$.each($(".checkbox1:checked"), function () {
			checkValues.push($(this).val());
		});
		swal({
			title: "Are you sure?",
			text: "You won't be able to revert this!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: base_url + "admin-page/delete-" + table_name,
					type: "POST",
					data: {
						ids: checkValues,
					},
					//   dataType: 'JSON',
					success: function (response) {
						swal("Reloaading!", "Item Deleted", "success");
						location.reload();
						return false;
					},
					error: function (jqXHR, textStatus, errorThrown) {
						const response = jqXHR.responseJSON;
						Swal.fire({
							type: "error",
							title: textStatus,
							text: errorThrown,
						});
					},
				});
			}
		});
		return false;
	});

	$("#del_dates").on("click", function (e) {
		console.log('ada');
		e.preventDefault();
		var checkValues = [];
		var table_name = 'available_dates';
		$.each($(".checkbox1:checked"), function () {
			checkValues.push($(this).val());
		});
		swal({
			title: "Are you sure?",
			text: "You won't be able to revert this!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: base_url + "admin-page/delete-" + table_name,
					type: "POST",
					data: {
						ids: checkValues,
					},
					//   dataType: 'JSON',
					success: function (response) {
						swal("Reloaading!", "Item Deleted", "success");
						location.reload();
						return false;
					},
					error: function (jqXHR, textStatus, errorThrown) {
						const response = jqXHR.responseJSON;
						Swal.fire({
							type: "error",
							title: textStatus,
							text: errorThrown,
						});
					},
				});
			}
		});
		return false;
	});


	$("#del_calendar").on("click", function (e) {
		console.log('ada');
		e.preventDefault();
		var checkValues = [];
		var table_name = 'calendar';
		$.each($(".checkbox1:checked"), function () {
			checkValues.push($(this).val());
		});
		swal({
			title: "Are you sure?",
			text: "You won't be able to revert this!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: base_url + "admin-page/delete-" + table_name,
					type: "POST",
					data: {
						ids: checkValues,
					},
					//   dataType: 'JSON',
					success: function (response) {
						swal("Reloaading!", "Item Deleted", "success");
						location.reload();
						return false;
					},
					error: function (jqXHR, textStatus, errorThrown) {
						const response = jqXHR.responseJSON;
						Swal.fire({
							type: "error",
							title: textStatus,
							text: errorThrown,
						});
					},
				});
			}
		});
		return false;
	});



	$("#del_gallery").on("click", function (e) {
		e.preventDefault();
		var checkValues = [];
		var table_name = pathArray[2];
		var id = lastPathArray;
		$.each($(".checkbox1:checked"), function () {
			checkValues.push($(this).val());
		});
		swal({
			title: "Are you sure?",
			text: "You won't be able to revert this!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: base_url + "admin-page/delete-" + table_name + "/" + id,
					type: "POST",
					data: {
						ids: checkValues,
					},
					//   dataType: 'JSON',
					success: function (response) {
						swal("Reloaading!", "Item Deleted", "success");
						location.reload();
						return false;
					},
					error: function (jqXHR, textStatus, errorThrown) {
						const response = jqXHR.responseJSON;
						Swal.fire({
							type: "error",
							title: textStatus,
							text: errorThrown,
						});
					},
				});
			}
		});
		return false;
	});


	$(".excel").click(function () {
		$(".excelTable").table2excel({
			// exclude CSS class
			exclude: ".noExl",
			name: "Worksheet Name",
			filename: "ExcelForm", //do not include extension
		});
	});

	function formatState(state) {
		if (!state.id) {
			return state.text;
		}
		var $state = $(
			'<span><img src="' +
				$(state.element).attr("data-src") +
				'" style="width:50px;height:auto" /> ' +
				state.text +
				"</span>"
		);
		return $state;
	}
	$(".selectImage").select2({
		minimumResultsForSearch: Infinity,
		templateResult: formatState,
		templateSelection: formatState,
		multiple: true,
	});

	// auto generate url in footer menu
	$("#footer_menu").change(function () {
		var url = base_url + $(this).val().toLowerCase().replace(/\s+/g, "-");
		$("#footer_url").val(url);
	});

	$(".new-footer-menu").click(function () {
		var count = $(this).data("count");
		if (count == 2) {
			$(this).prop('disabled', true);
			swal("This Data is Max!", "Can't Add More Data", "error");
			return false;
		}
	});

	$(".colorPicker").change(function(){
		$(this).css("background-color",$(this).val());
		$(this).css("color","black");
	});

	var type = $(".resources-type").data('resources_type');
	var link = $(".resources-type").data('resources_link');
	$('.add-resources').attr('href', base_url + 'admin-page/add-' + link + '/' + type);
	$(".resources-type").click(function(){
		var type = $(this).data('resources_type');
		$('.add-resources').attr('href', base_url + 'admin-page/add-' + link + '/' + type);

		// maintain current tab
		var id = $(this).attr("href").substr(1);
		window.location.hash = id;
	});

	  // on load of the page: switch to the currently selected tab
	  var hash = window.location.hash;
	  $('#myTab a[href="' + hash + '"]').tab('show');


});
