function verifikasi(id) {
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
					url: baseUrl + "maintenance/C_maintenance/update/" + id,
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
								window.location = baseUrl + "maintenance/C_maintenance";
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
