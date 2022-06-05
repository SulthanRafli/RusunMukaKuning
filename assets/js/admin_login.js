function save() {
	$("#basic").submit(function (e) {
		swal({
			title: "Apa anda yakin ingin menyimpan data ?",
			text: "Pastikan data yang diinput benar!",
			icon: "warning",
			buttons: ["Tidak", "Iya"],
			dangerMode: true,
		}).then(function (isConfirm) {
			if (isConfirm) {
				$.ajax({
					type: "POST",
					url: baseUrl + "admin/C_login/save",
					data: $(e.target).serialize(),
					dataType: "json",
					beforeSend: function () {
						console.log($(e.target).serialize());
					},
					error: function (jqXHR, textStatus, errorThrown) {
						console.log(arguments);
						console.log(errorThrown);
						console.log(textStatus);
					},
					success: function (data) {
						if (data.status === true) {
							swal({
								title: "Berhasil",
								text: "Data Berhasil Tersimpan",
								icon: "success",
								button: "OK",
							}).then(function (isConfirm) {
								window.location = baseUrl + "admin/C_login";
							});
						} else if (data.status === 203) {
							swal({
								title: "Error",
								text: "User sudah terdaftar",
								icon: "error",
								button: "OK",
							});
						} else if (data.status === 204) {
							swal({
								title: "Error",
								text: "Username sudah terdaftar",
								icon: "error",
								button: "OK",
							});
						} else {
							$(".load").modal("hide");
							swal({
								title: "Error",
								text: "Data Gagal Disimpan",
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

function edit(id) {
	$("#basic").submit(function (e) {
		swal({
			title: "Anda sudah yakin melakukan perubahan data ?",
			text: "Pastikan data yang diinput benar!",
			icon: "warning",
			buttons: ["Tidak", "Iya"],
			dangerMode: true,
		}).then(function (isConfirm) {
			if (isConfirm) {
				$.ajax({
					type: "POST",
					url: baseUrl + "admin/C_login/update/" + id,
					data: $(e.target).serialize(),
					dataType: "json",
					beforeSend: function () {
						console.log($(e.target).serialize());
					},
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
								window.location = baseUrl + "admin/C_login";
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

function deleteData(id) {
	swal({
		title: "Anda sudah yakin melakukan penghapusan data?",
		text: "Data yang sudah dihapus tidak dapat dikembalikan",
		icon: "warning",
		buttons: ["Tidak", "Iya"],
		dangerMode: true,
	}).then(function (isConfirm) {
		if (isConfirm) {
			$.ajax({
				url: baseUrl + "admin/C_login/delete/" + id,
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
							text: "Data Berhasil Terhapus",
							icon: "success",
							button: "OK",
						}).then(function (isConfirm) {
							window.location = baseUrl + "admin/C_login";
						});
					} else {
						swal({
							title: "Error",
							text: "Data Gagal Dihapus",
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
}

function changeKategori() {
	$("#user").html("<option value>Pilih..</option>");
	$("#user").prop("disabled", false);
	let kategori = $("#kategori").val();
	if (kategori == "2") {
		getPenyewa();
	} else {
		getTeknisi();
	}
}

async function getPenyewa() {
	$.ajax({
		type: "GET",
		url: baseUrl + "admin/C_login/get_penyewa",
		dataType: "JSON",
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(arguments);
			console.log(errorThrown);
			console.log(textStatus);
		},
		success: function (data) {
			if (data !== undefined) {
				$.each(data, function (i, val) {
					$("#user").append(
						`<option value='${val.idPenyewa},${val.nama}'>${val.nama}</option>`
					);
				});
			}
		},
	});
}

async function getTeknisi() {
	$.ajax({
		type: "GET",
		url: baseUrl + "admin/C_login/get_teknisi",
		dataType: "JSON",
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(arguments);
			console.log(errorThrown);
			console.log(textStatus);
		},
		success: function (data) {
			if (data !== undefined) {
				$.each(data, function (i, val) {
					$("#user").append(
						`<option value='${val.idTeknisi},${val.nama}'>${val.nama}</option>`
					);
				});
			}
		},
	});
}
