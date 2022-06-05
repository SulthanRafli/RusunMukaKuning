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
					url: baseUrl + "admin/C_jenis_tagihan/save",
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
								window.location = baseUrl + "admin/C_jenis_tagihan";
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
					url: baseUrl + "admin/C_jenis_tagihan/update/" + id,
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
								window.location = baseUrl + "admin/C_jenis_tagihan";
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
				url: baseUrl + "admin/C_jenis_tagihan/delete/" + id,
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
							window.location = baseUrl + "admin/C_jenis_tagihan";
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
