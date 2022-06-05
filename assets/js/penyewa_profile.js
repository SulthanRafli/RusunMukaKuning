let checkOldPassword = false;

function makeDelay(ms) {
	var timer = 0;
	return function (callback) {
		clearTimeout(timer);
		timer = setTimeout(callback, ms);
	};
}

$("#old_password").on("keyup", function () {
	$(".icon-container").show();
	makeDelay(500)(check);
});

function check() {
	let password = $("#old_password").val();
	$.ajax({
		type: "POST",
		url: baseUrl + "penyewa/C_profile/check_password",
		data: { password: password },
		dataType: "JSON",
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(arguments);
			console.log(errorThrown);
			console.log(textStatus);
		},
		success: function (data) {
			if (data.status == true) {
				$(".icon-container").hide();
				$("#old_password").removeClass("is-invalid");
				$("#old_password").addClass("is-valid");
				checkOldPassword = true;
			} else {
				$(".icon-container").hide();
				$("#old_password").removeClass("is-valid");
				$("#old_password").addClass("is-invalid");
				checkOldPassword = false;
			}
		},
	});
}

$("#basic")
	.submit(function (e) {
		e.preventDefault();
	})
	.validate({
		rules: {
			old_password: {
				required: true,
			},
			new_password: {},
			confirm_password: {
				equalTo: "#new_password",
			},
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass("is-invalid");
			$(element).removeClass("is-valid");
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).addClass("is-valid");
			$(element).removeClass("is-invalid");
		},
		submitHandler: function () {
			if (checkOldPassword) {
				swal({
					title: "Anda sudah yakin melakukan perubahan data ?",
					text: "Pastikan data yang diinput benar!",
					icon: "warning",
					buttons: ["Tidak", "Iya"],
					dangerMode: true,
				}).then(function (isConfirm) {
					if (isConfirm) {
						let confirm_password = $("#confirm_password").val();
						$.ajax({
							type: "POST",
							url: baseUrl + "penyewa/C_profile/update/" + idLogin,
							data: { confirm_password: confirm_password },
							dataType: "json",
							error: function (jqXHR, textStatus, errorThrown) {
								console.log(arguments);
								console.log(errorThrown);
								console.log(textStatus);
							},
							success: function (data) {
								if (data.status === true) {
									swal({
										title: "Berhasil",
										text: "Data Berhasil Diperbarui",
										icon: "success",
										button: "OK",
									}).then(function (isConfirm) {
										window.location = baseUrl + "penyewa/C_profile";
									});
								} else {
									swal({
										title: "Error",
										text: "Data Gagal Diperbarui",
										icon: "error",
										button: "OK",
									});
								}
							},
						});
					} else {
						swal("Cancelled", "", "error");
					}
				});
			}
			return false;
		},
	});

function edit() {
	$("#basic-one").submit(function (e) {
		swal({
			title: "Anda sudah yakin melakukan perubahan data ?",
			text: "Pastikan data yang diinput benar!",
			icon: "warning",
			buttons: ["Tidak", "Iya"],
			dangerMode: true,
		}).then(function (isConfirm) {
			if (isConfirm) {
				var file_data = $("#file_name").prop("files")[0];
				var form_data = new FormData();
				form_data.append("file", file_data);
				$.ajax({
					type: "POST",
					url: baseUrl + "penyewa/C_profile/update_profile/",
					cache: false,
					contentType: false,
					processData: false,
					dataType: 'json',
					data: form_data,
					error: function (jqXHR, textStatus, errorThrown) {
						console.log(arguments);
						console.log(errorThrown);
						console.log(textStatus);
					},
					success: function (data) {
						if (data.status === true) {
							swal({
								title: "Berhasil",
								text: "Data Berhasil Diperbarui",
								icon: "success",
								button: "OK",
							}).then(function (isConfirm) {
								window.location = baseUrl + "penyewa/C_profile";
							});
						} else {
							swal({
								title: "Error",
								text: "Data Gagal Diperbarui",
								icon: "error",
								button: "OK",
							});
						}
					},
				});
			} else {
				swal("Cancelled", "", "error");
			}
		});
		return false;
	});
}
