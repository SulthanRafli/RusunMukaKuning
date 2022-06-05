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
					url: baseUrl + "admin/C_tagihan/save",
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
								window.location = baseUrl + "admin/C_tagihan";
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
					url: baseUrl + "admin/C_tagihan/update/" + id,
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
								window.location = baseUrl + "admin/C_tagihan";
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
				url: baseUrl + "admin/C_tagihan/delete/" + id,
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
							window.location = baseUrl + "admin/C_tagihan";
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

function tolak(id) {
	swal({
		title: "Apakah anda yakin menolak verifikasi ini?",
		text: "Data yang sudah ditolak tidak dapat dikembalikan",
		icon: "warning",
		buttons: ["Tidak", "Iya"],
		dangerMode: true,
	}).then(function (isConfirm) {
		if (isConfirm) {
			$.ajax({
				url: baseUrl + "admin/C_tagihan/deny/" + id,
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
							text: "Data Berhasil Ditolak",
							icon: "success",
							button: "OK",
						}).then(function (isConfirm) {
							window.location = baseUrl + "admin/C_tagihan";
						});
					} else {
						swal({
							title: "Error",
							text: "Data Gagal Ditolak",
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

function verifikasi(id) {
	swal({
		title: "Anda sudah yakin melakukan verifikasi data?",
		text: "Data yang sudah diverifikasi tidak dapat dikembalikan",
		icon: "warning",
		buttons: ["Tidak", "Iya"],
		dangerMode: true,
	}).then(function (isConfirm) {
		if (isConfirm) {
			$.ajax({
				url: baseUrl + "admin/C_tagihan/verify/" + id,
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
							text: "Data Berhasil Diverifikasi",
							icon: "success",
							button: "OK",
						}).then(function (isConfirm) {
							window.location = baseUrl + "admin/C_tagihan";
						});
					} else {
						swal({
							title: "Error",
							text: "Data Gagal Diverifikasi",
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

function changeJenisTagihan() {
	let idJenisTagihan = $("#jenis_tagihan").val();
	$("#jumlah_tagihan").val(0).trigger("change");
	$.ajax({
		type: "POST",
		url: baseUrl + "admin/C_tagihan/get_jenis_tagihan",
		data: { id_jenis_tagihan: idJenisTagihan },
		dataType: "JSON",
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(arguments);
			console.log(errorThrown);
			console.log(textStatus);
		},
		success: function (data) {
			let totalHarga = 0;
			$.each(data, function (i, val) {
				totalHarga += parseInt(val.harga);
			});
			$("#jumlah_tagihan").val(totalHarga).trigger("change");
		},
	});
}

window.onload = function () {
	if (idPenyewa !== undefined && jenisTagihan !== undefined) {
		$("#penyewa").val(idPenyewa).trigger("change");
		$("#jenis_tagihan").val(jenisTagihan.split(",")).trigger("change");
	}
};
